<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project Inquiry - KA Software</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #1a1a35;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);">
        <!-- Header -->
        <tr>
            <td style="background: linear-gradient(135deg, #f97316 0%, #ef4444 50%, #dc2626 100%); color: white; padding: 40px 30px; text-align: center;">
                <img src="https://kasoftware.in/images/logo.png" alt="KA Software Logo" width="60" height="60" style="margin-bottom: 15px;">
                <div style="font-size: 28px; font-weight: 800; margin-bottom: 10px;">KA Software</div>
                <div style="font-size: 24px; font-weight: 600;">🚀 New Project Inquiry</div>
                <div style="font-size: 14px; opacity: 0.9; margin-top: 10px;">A potential client has submitted a project inquiry</div>
            </td>
        </tr>
        
        <!-- Content -->
        <tr>
            <td style="padding: 30px;">
                <!-- Service Badge -->
                <div style="margin-bottom: 20px;">
                    <span style="display: inline-block; background: linear-gradient(135deg, #f97316 0%, #ef4444 100%); color: white; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600;">{{ $contactData['service'] }}</span>
                </div>
                
                <!-- Priority Box -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background: linear-gradient(135deg, rgba(249, 115, 22, 0.1) 0%, rgba(239, 68, 68, 0.1) 100%); border: 1px solid #fdba74; border-left: 4px solid #f97316; border-radius: 0 8px 8px 0; margin-bottom: 25px;">
                    <tr>
                        <td style="padding: 15px 20px; color: #c2410c; font-weight: 500;">
                            ⚡ New lead requires follow-up within <strong>24 hours</strong>
                        </td>
                    </tr>
                </table>
                
                <!-- Contact Information Section -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 25px;">
                    <tr>
                        <td style="color: #ea580c; font-size: 16px; font-weight: 600; padding-bottom: 15px; border-bottom: 2px solid #fed7aa;">
                            👤 Contact Information
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 15px;">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">Name:</span>
                                        <span style="color: #1f2937; font-weight: 500;">{{ $contactData['name'] }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">Email:</span>
                                        <a href="mailto:{{ $contactData['email'] }}" style="color: #ea580c; text-decoration: none; font-weight: 500;">{{ $contactData['email'] }}</a>
                                    </td>
                                </tr>
                                @if($contactData['phone'])
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">Phone:</span>
                                        <a href="tel:{{ $contactData['phone'] }}" style="color: #ea580c; text-decoration: none; font-weight: 500;">{{ $contactData['phone'] }}</a>
                                    </td>
                                </tr>
                                @endif
                                @if($contactData['company'])
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">Company:</span>
                                        <span style="color: #1f2937; font-weight: 500;">{{ $contactData['company'] }}</span>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                </table>
                
                <!-- Project Details Section -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 25px;">
                    <tr>
                        <td style="color: #ea580c; font-size: 16px; font-weight: 600; padding-bottom: 15px; border-bottom: 2px solid #fed7aa;">
                            📋 Project Details
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 15px;">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">Service:</span>
                                        <span style="color: #1f2937; font-weight: 500;">{{ $contactData['service'] }}</span>
                                    </td>
                                </tr>
                                @if($contactData['budget'])
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">Budget:</span>
                                        <span style="color: #1f2937; font-weight: 500;">{{ $contactData['budget'] }}</span>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                </table>
                
                <!-- Message Section -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 25px;">
                    <tr>
                        <td style="color: #ea580c; font-size: 16px; font-weight: 600; padding-bottom: 15px; border-bottom: 2px solid #fed7aa;">
                            💬 Client Message
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 15px;">
                            <div style="background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(239, 68, 68, 0.05) 100%); border-left: 4px solid #f97316; padding: 20px; border-radius: 0 8px 8px 0; color: #374151; line-height: 1.8;">
                                {{ $contactData['message'] }}
                            </div>
                        </td>
                    </tr>
                </table>
                
                <!-- Additional Info Section -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 25px;">
                    <tr>
                        <td style="color: #ea580c; font-size: 16px; font-weight: 600; padding-bottom: 15px; border-bottom: 2px solid #fed7aa;">
                            🔍 Additional Information
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 15px;">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">IP Address:</span>
                                        <span style="color: #1f2937;">{{ $contactData['ip_address'] ?? 'N/A' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                                        <span style="font-weight: 600; color: #6b7280; display: inline-block; width: 100px;">Submitted:</span>
                                        <span style="color: #1f2937;">{{ $contactData['created_at'] }}</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                
                <!-- CTA Buttons -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin: 30px 0;">
                    <tr>
                        <td style="text-align: center;">
                            <a href="mailto:{{ $contactData['email'] }}" style="display: inline-block; background: linear-gradient(135deg, #f97316 0%, #ef4444 100%); color: white; padding: 14px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 15px; box-shadow: 0 4px 15px rgba(249, 115, 22, 0.4);">
                                ✉️ Reply to {{ $contactData['name'] }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding-top: 15px;">
                            @if($contactData['phone'])
                            <a href="tel:{{ $contactData['phone'] }}" style="display: inline-block; padding: 10px 20px; border: 2px solid #f97316; color: #ea580c; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px; margin: 0 5px;">📞 Call Now</a>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactData['phone']) }}" style="display: inline-block; padding: 10px 20px; border: 2px solid #f97316; color: #ea580c; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px; margin: 0 5px;">💬 WhatsApp</a>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <!-- Footer -->
        <tr>
            <td style="background: #1a1a35; padding: 25px 30px; text-align: center;">
                <img src="https://kasoftware.in/images/logo.png" alt="KA Software" width="40" height="40" style="margin-bottom: 10px;">
                <div style="color: #fb923c; font-weight: 600; margin-bottom: 5px;">KA Software</div>
                <div style="color: #a8a29e; font-size: 13px; margin-bottom: 10px;">This inquiry was received from your website contact form</div>
                <a href="https://kasoftware.in" style="color: #fb923c; text-decoration: none; font-size: 13px;">www.kasoftware.in</a>
                <div style="color: #78716c; font-size: 11px; margin-top: 15px;">
                    © {{ date('Y') }} KA Software. All rights reserved.
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
