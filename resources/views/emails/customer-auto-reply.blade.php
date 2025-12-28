<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting KA Software</title>
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
            padding: 40px 30px;
            text-align: center;
        }
        .logo {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 20px;
        }
        .message-text {
            color: #4b5563;
            margin-bottom: 25px;
        }
        .highlight-box {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
        }
        .highlight-box h3 {
            color: #6366f1;
            margin: 0 0 10px;
            font-size: 18px;
        }
        .highlight-box p {
            color: #4b5563;
            margin: 0;
        }
        .what-next {
            background: #f9fafb;
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
        }
        .what-next h3 {
            color: #1f2937;
            margin: 0 0 15px;
            font-size: 16px;
        }
        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        .step-number {
            background: #6366f1;
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
            margin-right: 12px;
            flex-shrink: 0;
        }
        .step-content {
            color: #4b5563;
        }
        .step-content strong {
            color: #1f2937;
        }
        .contact-info {
            background: #1f2937;
            color: #e5e7eb;
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
        }
        .contact-info h3 {
            color: white;
            margin: 0 0 15px;
            font-size: 16px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .contact-item span {
            margin-left: 10px;
        }
        .contact-item a {
            color: #8b5cf6;
            text-decoration: none;
        }
        .cta-section {
            text-align: center;
            margin: 30px 0;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            padding: 14px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .services-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 25px 0;
        }
        .service-item {
            background: #f9fafb;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .service-item span {
            font-size: 24px;
            display: block;
            margin-bottom: 5px;
        }
        .service-item p {
            margin: 0;
            color: #4b5563;
            font-size: 13px;
        }
        .footer {
            background: #f9fafb;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        .social-links {
            margin: 15px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 8px;
            color: #6b7280;
            text-decoration: none;
        }
        .footer-text {
            color: #9ca3af;
            font-size: 12px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">KA Software</div>
            <h1>Thank You for Reaching Out!</h1>
        </div>
        
        <div class="content">
            <p class="greeting">Hello {{ $contactData['name'] }},</p>
            
            <p class="message-text">
                Thank you for your interest in KA Software! We've received your inquiry about 
                <strong>{{ $contactData['service'] }}</strong> and our team is excited to learn more about your project.
            </p>
            
            <div class="highlight-box">
                <h3>🎉 Our Sales Team Will Contact You Shortly!</h3>
                <p>Expect a response within <strong>24 hours</strong> (typically much sooner during business hours).</p>
            </div>
            
            <div class="what-next">
                <h3>📋 What Happens Next?</h3>
                <div class="step">
                    <span class="step-number">1</span>
                    <div class="step-content">
                        <strong>Review</strong> - Our team will review your requirements carefully.
                    </div>
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    <div class="step-content">
                        <strong>Connect</strong> - A sales representative will reach out to discuss your needs.
                    </div>
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <div class="step-content">
                        <strong>Proposal</strong> - We'll prepare a customized proposal for your project.
                    </div>
                </div>
                <div class="step">
                    <span class="step-number">4</span>
                    <div class="step-content">
                        <strong>Kickoff</strong> - Once approved, we begin bringing your vision to life!
                    </div>
                </div>
            </div>
            
            <p class="message-text">
                While you wait, here's a quick overview of how we can help:
            </p>
            
            <div class="services-grid">
                <div class="service-item">
                    <span>📱</span>
                    <p>Mobile Apps</p>
                </div>
                <div class="service-item">
                    <span>🌐</span>
                    <p>Web Applications</p>
                </div>
                <div class="service-item">
                    <span>🤖</span>
                    <p>AI/ML Solutions</p>
                </div>
                <div class="service-item">
                    <span>🛒</span>
                    <p>E-commerce</p>
                </div>
            </div>
            
            <div class="contact-info">
                <h3>📞 Need Immediate Assistance?</h3>
                <div class="contact-item">
                    <span>📧</span>
                    <span><a href="mailto:info@kasoftware.in">info@kasoftware.in</a></span>
                </div>
                <div class="contact-item">
                    <span>📱</span>
                    <span><a href="tel:+918056653499">+91 8056653499</a></span>
                </div>
                <div class="contact-item">
                    <span>🕐</span>
                    <span>Mon-Fri: 9:00 AM - 6:00 PM IST</span>
                </div>
            </div>
            
            <div class="cta-section">
                <a href="https://kasoftware.in" class="cta-button">
                    Visit Our Website
                </a>
            </div>
        </div>
        
        <div class="footer">
            <p><strong>KA Software</strong></p>
            <p>Building the future with AI-powered software solutions</p>
            
            <div class="social-links">
                <a href="#">LinkedIn</a> |
                <a href="#">Twitter</a> |
                <a href="#">GitHub</a>
            </div>
            
            <p class="footer-text">
                18/15, Subramaniam Street, Rajaji Nagar, Anna Nagar, Chennai - 600049<br>
                © {{ date('Y') }} KA Software. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
