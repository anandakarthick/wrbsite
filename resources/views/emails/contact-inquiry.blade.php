<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project Inquiry - KA Software</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1a1a35;
        }
        .container {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .header {
            background: linear-gradient(135deg, #f97316 0%, #ef4444 50%, #dc2626 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .logo {
            margin-bottom: 15px;
        }
        .logo img {
            width: 60px;
            height: 60px;
        }
        .logo-text {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .content {
            padding: 30px;
        }
        .badge {
            display: inline-block;
            background: linear-gradient(135deg, #f97316 0%, #ef4444 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .priority-box {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.1) 0%, rgba(239, 68, 68, 0.1) 100%);
            border: 1px solid #fdba74;
            border-left: 4px solid #f97316;
            color: #c2410c;
            padding: 15px 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 25px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        .priority-box span {
            font-size: 20px;
            margin-right: 10px;
        }
        .info-section {
            margin-bottom: 25px;
        }
        .info-section h3 {
            color: #ea580c;
            margin: 0 0 15px;
            font-size: 16px;
            border-bottom: 2px solid #fed7aa;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .info-section h3 span {
            margin-right: 8px;
        }
        .info-row {
            display: flex;
            margin-bottom: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .info-label {
            font-weight: 600;
            color: #6b7280;
            width: 120px;
            flex-shrink: 0;
        }
        .info-value {
            color: #1f2937;
            font-weight: 500;
        }
        .info-value a {
            color: #ea580c;
            text-decoration: none;
        }
        .info-value a:hover {
            text-decoration: underline;
        }
        .message-box {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(239, 68, 68, 0.05) 100%);
            border-left: 4px solid #f97316;
            padding: 20px;
            margin-top: 10px;
            border-radius: 0 8px 8px 0;
            color: #374151;
            line-height: 1.8;
        }
        .cta-section {
            text-align: center;
            margin: 30px 0 10px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #f97316 0%, #ef4444 100%);
            color: white;
            padding: 14px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.4);
        }
        .cta-button:hover {
            box-shadow: 0 6px 20px rgba(249, 115, 22, 0.5);
        }
        .quick-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
            flex-wrap: wrap;
        }
        .quick-action {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid #f97316;
            color: #ea580c;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            background: white;
        }
        .footer {
            background: #1a1a35;
            color: #a8a29e;
            padding: 25px 30px;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
            font-size: 13px;
        }
        .footer strong {
            color: #fb923c;
        }
        .footer a {
            color: #fb923c;
            text-decoration: none;
        }
        .footer-logo {
            margin-bottom: 10px;
        }
        .footer-logo img {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="https://kasoftware.in/images/logo.png" alt="KA Software Logo">
            </div>
            <div class="logo-text">KA Software</div>
            <h1>🚀 New Project Inquiry</h1>
            <p>A potential client has submitted a project inquiry</p>
        </div>
        
        <div class="content">
            <span class="badge">{{ $contactData['service'] }}</span>
            
            <div class="priority-box">
                <span>⚡</span>
                <div>New lead requires follow-up within <strong>24 hours</strong></div>
            </div>
            
            <div class="info-section">
                <h3><span>👤</span> Contact Information</h3>
                <div class="info-row">
                    <span class="info-label">Name:</span>
                    <span class="info-value">{{ $contactData['name'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value"><a href="mailto:{{ $contactData['email'] }}">{{ $contactData['email'] }}</a></span>
                </div>
                @if($contactData['phone'])
                <div class="info-row">
                    <span class="info-label">Phone:</span>
                    <span class="info-value"><a href="tel:{{ $contactData['phone'] }}">{{ $contactData['phone'] }}</a></span>
                </div>
                @endif
                @if($contactData['company'])
                <div class="info-row">
                    <span class="info-label">Company:</span>
                    <span class="info-value">{{ $contactData['company'] }}</span>
                </div>
                @endif
            </div>
            
            <div class="info-section">
                <h3><span>📋</span> Project Details</h3>
                <div class="info-row">
                    <span class="info-label">Service:</span>
                    <span class="info-value">{{ $contactData['service'] }}</span>
                </div>
                @if($contactData['budget'])
                <div class="info-row">
                    <span class="info-label">Budget:</span>
                    <span class="info-value">{{ $contactData['budget'] }}</span>
                </div>
                @endif
            </div>
            
            <div class="info-section">
                <h3><span>💬</span> Client Message</h3>
                <div class="message-box">
                    {{ $contactData['message'] }}
                </div>
            </div>
            
            <div class="info-section">
                <h3><span>🔍</span> Additional Information</h3>
                <div class="info-row">
                    <span class="info-label">IP Address:</span>
                    <span class="info-value">{{ $contactData['ip_address'] ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Submitted:</span>
                    <span class="info-value">{{ $contactData['created_at'] }}</span>
                </div>
            </div>
            
            <div class="cta-section">
                <a href="mailto:{{ $contactData['email'] }}" class="cta-button">
                    ✉️ Reply to {{ $contactData['name'] }}
                </a>
                
                <div class="quick-actions">
                    @if($contactData['phone'])
                    <a href="tel:{{ $contactData['phone'] }}" class="quick-action">📞 Call Now</a>
                    @endif
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactData['phone'] ?? '') }}" class="quick-action">💬 WhatsApp</a>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <div class="footer-logo">
                <img src="https://kasoftware.in/images/logo.png" alt="KA Software">
            </div>
            <p><strong>KA Software</strong></p>
            <p>This inquiry was received from your website contact form</p>
            <p><a href="https://kasoftware.in">www.kasoftware.in</a></p>
            <p style="margin-top: 15px; color: #78716c; font-size: 11px;">
                © {{ date('Y') }} KA Software. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
