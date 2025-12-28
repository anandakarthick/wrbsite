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
     * Admin email to receive inquiries
     */
    private $adminEmail = 'info@kasoftware.in';
    
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

            // Send email to admin
            try {
                Mail::to($this->adminEmail)->send(new ContactInquiry($contactData));
                Log::info('Admin notification email sent successfully');
            } catch (\Exception $e) {
                Log::error('Failed to send admin email: ' . $e->getMessage());
            }

            // Send auto-reply to customer
            try {
                Mail::to($request->email)->send(new CustomerAutoReply($contactData));
                Log::info('Customer auto-reply email sent successfully');
            } catch (\Exception $e) {
                Log::error('Failed to send customer auto-reply: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your inquiry! Our sales team will contact you shortly.'
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error processing your request. Please try again or call us directly.'
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
        $filePath = storage_path('app/contact_inquiries.json');
        
        $inquiries = [];
        if (file_exists($filePath)) {
            $inquiries = json_decode(file_get_contents($filePath), true) ?? [];
        }
        
        $inquiries[] = $data;
        
        file_put_contents($filePath, json_encode($inquiries, JSON_PRETTY_PRINT));
    }
}
