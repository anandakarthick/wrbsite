<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project Inquiry</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 10px 0 0;
            opacity: 0.9;
        }
        .content {
            padding: 30px;
        }
        .badge {
            display: inline-block;
            background: #6366f1;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .info-section {
            margin-bottom: 25px;
        }
        .info-section h3 {
            color: #6366f1;
            margin: 0 0 15px;
            font-size: 16px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 10px;
        }
        .info-row {
            display: flex;
            margin-bottom: 12px;
            padding: 8px 0;
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
        }
        .message-box {
            background: #f9fafb;
            border-left: 4px solid #6366f1;
            padding: 15px;
            margin-top: 10px;
            border-radius: 0 8px 8px 0;
        }
        .priority-high {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .footer {
            background: #1f2937;
            color: #9ca3af;
            padding: 20px 30px;
            text-align: center;
            font-size: 13px;
        }
        .footer a {
            color: #8b5cf6;
            text-decoration: none;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 New Project Inquiry</h1>
            <p>A potential client has submitted a project inquiry</p>
        </div>
        
        <div class="content">
            <span class="badge">{{ $contactData['service'] }}</span>
            
            <div class="priority-high">
                ⚡ New lead requires follow-up within 24 hours
            </div>
            
            <div class="info-section">
                <h3>👤 Contact Information</h3>
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
                <h3>📋 Project Details</h3>
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
                <h3>💬 Message</h3>
                <div class="message-box">
                    {{ $contactData['message'] }}
                </div>
            </div>
            
            <div class="info-section">
                <h3>🔍 Additional Info</h3>
                <div class="info-row">
                    <span class="info-label">IP Address:</span>
                    <span class="info-value">{{ $contactData['ip_address'] ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Submitted:</span>
                    <span class="info-value">{{ $contactData['created_at'] }}</span>
                </div>
            </div>
            
            <center>
                <a href="mailto:{{ $contactData['email'] }}" class="cta-button">
                    Reply to {{ $contactData['name'] }}
                </a>
            </center>
        </div>
        
        <div class="footer">
            <p>This email was sent from the KA Software website contact form.</p>
            <p><a href="https://kasoftware.in">www.kasoftware.in</a></p>
        </div>
    </div>
</body>
</html>
