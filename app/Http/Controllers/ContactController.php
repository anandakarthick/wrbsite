<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
            'budget' => 'nullable|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store the contact inquiry (you can create a model for this)
            $contactData = [
                'name' => $request->name,
                'email' => $request->email,
                'company' => $request->company,
                'phone' => $request->phone,
                'service' => $request->service,
                'budget' => $request->budget,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'created_at' => now(),
            ];

            // Log the inquiry
            Log::info('New contact inquiry received', $contactData);

            // Option 1: Store in database (uncomment if you have a Contact model)
            // \App\Models\Contact::create($contactData);

            // Option 2: Send email notification (uncomment and configure mail settings)
            // Mail::to('info@kasoftware.in')->send(new \App\Mail\ContactInquiry($contactData));

            // For now, just store in a file (simple approach)
            $this->storeInquiry($contactData);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your inquiry! We\'ll get back to you within 24 hours.'
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error processing your request. Please try again.'
            ], 500);
        }
    }

    /**
     * Store inquiry in a JSON file (simple storage)
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
