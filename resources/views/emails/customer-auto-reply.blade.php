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
            background: linear-gradient(135deg, #fff 0%, #ffd4a8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.1) 0%, rgba(239, 68, 68, 0.1) 100%);
            border: 1px solid rgba(249, 115, 22, 0.3);
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
        }
        .highlight-box h3 {
            color: #ea580c;
            margin: 0 0 10px;
            font-size: 18px;
        }
        .highlight-box p {
            color: #4b5563;
            margin: 0;
        }
        .what-next {
            background: #fafaf9;
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
            background: linear-gradient(135deg, #f97316 0%, #ef4444 100%);
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
            background: #1a1a35;
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
            color: #fb923c;
            text-decoration: none;
        }
        .cta-section {
            text-align: center;
            margin: 30px 0;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #f97316 0%, #ef4444 100%);
            color: white;
            padding: 14px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.4);
        }
        .services-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 25px 0;
        }
        .service-item {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.05) 0%, rgba(239, 68, 68, 0.05) 100%);
            border: 1px solid rgba(249, 115, 22, 0.1);
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
            font-weight: 600;
        }
        .footer {
            background: #1a1a35;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .footer p {
            color: #a8a29e;
            margin: 5px 0;
        }
        .footer strong {
            color: #fb923c;
        }
        .social-links {
            margin: 15px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 8px;
            color: #fb923c;
            text-decoration: none;
        }
        .footer-text {
            color: #78716c;
            font-size: 12px;
            margin-top: 15px;
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
                <a href="https://www.linkedin.com/company/kasoftware">LinkedIn</a> |
                <a href="https://twitter.com/kasoftware">Twitter</a> |
                <a href="https://github.com/kasoftware">GitHub</a>
            </div>
            
            <p class="footer-text">
                18/15, Subramaniam Street, Rajaji Nagar, Anna Nagar, Chennai - 600049<br>
                © {{ date('Y') }} KA Software. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
