<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'company' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'service' => 'required|string|max:50',
            'budget' => 'nullable|string|max:50',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill in all required fields correctly.',
                'errors' => $validator->errors()
            ], 422);
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

            $adminEmailSent = false;
            $customerEmailSent = false;

            // Send email to admin
            try {
                Mail::to($adminEmail)->send(new ContactInquiry($contactData));
                $adminEmailSent = true;
                Log::info('Admin notification email sent successfully to: ' . $adminEmail);
            } catch (\Exception $e) {
                Log::error('Failed to send admin email: ' . $e->getMessage());
            }

            // Send auto-reply to customer
            try {
                Mail::to($request->email)->send(new CustomerAutoReply($contactData));
                $customerEmailSent = true;
                Log::info('Customer auto-reply email sent successfully to: ' . $request->email);
            } catch (\Exception $e) {
                Log::error('Failed to send customer auto-reply: ' . $e->getMessage());
            }

            // Return success even if emails fail (inquiry is stored)
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your inquiry! Our sales team will contact you within 24 hours.',
                'email_status' => [
                    'admin_notified' => $adminEmailSent,
                    'customer_notified' => $customerEmailSent
                ]
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
