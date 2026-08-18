<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactInquiry;
use App\Mail\CustomerAutoReply;

class ContactController extends Controller
{
    /**
     * Handle contact form submission
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submit(Request $request)
    {
        // Honeypot: hidden field that only bots fill in.
        // Pretend success so bots don't learn they were caught.
        if ($request->filled('website')) {
            Log::warning('Contact form honeypot triggered', ['ip' => $request->ip()]);
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your inquiry! Our sales team will contact you within 24 hours.'
            ]);
        }

        $recaptchaSecret = config('services.recaptcha.secret_key');

        // Validate the request
        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'company' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'service' => 'required|string|max:50',
            'budget' => 'nullable|string|max:50',
            'message' => 'required|string|max:2000',
        ];
        if ($recaptchaSecret) {
            $rules['g-recaptcha-response'] = 'required|string';
        } else {
            $rules['captcha'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = $validator->errors()->has('g-recaptcha-response')
                ? 'Please confirm you are not a robot.'
                : 'Please fill in all required fields correctly.';
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors' => $validator->errors()
            ], 422);
        }

        if ($recaptchaSecret) {
            // Verify the reCAPTCHA token with Google
            if (!$this->verifyRecaptcha($recaptchaSecret, $request->input('g-recaptcha-response'), $request->ip())) {
                return response()->json([
                    'success' => false,
                    'message' => 'reCAPTCHA verification failed. Please try again.'
                ], 422);
            }
        } else {
            // Fallback math captcha: answer was stored in the session when the form rendered
            $expected = session('captcha_answer');
            if ($expected === null || (int) $request->captcha !== (int) $expected) {
                return response()->json([
                    'success' => false,
                    'message' => 'The security check answer is incorrect. Please try again.'
                ], 422);
            }
        }

        // Time trap: humans need more than a couple of seconds to fill the form
        $renderedAt = session('contact_form_time');
        if ($renderedAt !== null && (now()->timestamp - (int) $renderedAt) < 3) {
            Log::warning('Contact form submitted too fast (likely bot)', ['ip' => $request->ip()]);
            return response()->json([
                'success' => false,
                'message' => 'Form submitted too quickly. Please try again.'
            ], 429);
        }

        try {
            // Get admin email from .env
            $adminEmail = env('ADMIN_EMAIL', 'info@kasoftware.in');
            
            // Prepare contact data
            $contactData = [
                'name' => $request->name,
                'email' => $request->email,
                'company' => $request->company ?? 'Not provided',
                'phone' => $request->phone ?? 'Not provided',
                'service' => $request->service,
                'budget' => $request->budget ?? 'Not specified',
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'created_at' => now()->format('Y-m-d H:i:s'),
            ];

            // Log the inquiry
            Log::info('New contact inquiry received', $contactData);

            // Store inquiry in file (backup)
            $this->storeInquiry($contactData);

            // Queue email to admin (using queue)
            try {
                Mail::to($adminEmail)->queue(new ContactInquiry($contactData));
                Log::info('Admin notification email queued successfully to: ' . $adminEmail);
            } catch (\Exception $e) {
                Log::error('Failed to queue admin email: ' . $e->getMessage());
            }

            // Queue auto-reply to customer
            try {
                Mail::to($request->email)->queue(new CustomerAutoReply($contactData));
                Log::info('Customer auto-reply email queued successfully to: ' . $request->email);
            } catch (\Exception $e) {
                Log::error('Failed to queue customer auto-reply: ' . $e->getMessage());
            }

            // Return success immediately (emails will be sent in background)
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your inquiry! Our sales team will contact you within 24 hours.'
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error processing your request. Please try again or call us directly at +91 8056653499.'
            ], 500);
        }
    }

    /**
     * Verify a reCAPTCHA v2 token with Google's siteverify endpoint
     *
     * @param string $secret
     * @param string $token
     * @param string|null $ip
     * @return bool
     */
    private function verifyRecaptcha(string $secret, string $token, ?string $ip): bool
    {
        try {
            $response = Http::asForm()->timeout(10)->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secret,
                'response' => $token,
                'remoteip' => $ip,
            ]);

            $result = $response->json();

            if (!($result['success'] ?? false)) {
                Log::warning('reCAPTCHA verification failed', [
                    'ip' => $ip,
                    'error-codes' => $result['error-codes'] ?? [],
                ]);
                return false;
            }

            // v3 responses include a score (0 = bot, 1 = human) and the action name
            if (isset($result['score'])) {
                $minScore = (float) config('services.recaptcha.min_score', 0.5);
                if ($result['score'] < $minScore || ($result['action'] ?? 'contact') !== 'contact') {
                    Log::warning('reCAPTCHA v3 low score or wrong action', [
                        'ip' => $ip,
                        'score' => $result['score'],
                        'action' => $result['action'] ?? null,
                    ]);
                    return false;
                }
            }

            return true;
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Store inquiry in a JSON file (backup storage)
     *
     * @param array $data
     * @return void
     */
    private function storeInquiry(array $data)
    {
        try {
            $filePath = storage_path('app/contact_inquiries.json');
            
            $inquiries = [];
            if (file_exists($filePath)) {
                $inquiries = json_decode(file_get_contents($filePath), true) ?? [];
            }
            
            $inquiries[] = $data;
            
            file_put_contents($filePath, json_encode($inquiries, JSON_PRETTY_PRINT));
            
            Log::info('Inquiry stored in backup file');
        } catch (\Exception $e) {
            Log::error('Failed to store inquiry in backup file: ' . $e->getMessage());
        }
    }
}
