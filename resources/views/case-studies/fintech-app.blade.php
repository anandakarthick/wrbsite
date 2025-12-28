<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTech Mobile App - Case Study | KA Software</title>
    <meta name="description" content="How KA Software built a FinTech app with AI fraud detection preventing $2M+ in losses.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/success-stories.css') }}">
</head>
<body>
    @include('sections.header')
    <main>
        <section class="case-study-hero" style="background: linear-gradient(135deg, #ca8a04 0%, #eab308 50%, #a16207 100%);">
            <div class="section-container">
                <div class="case-study-hero-content">
                    <span class="case-study-category">💳 FinTech</span>
                    <h1 class="case-study-title">FinTech Mobile App with AI Fraud Detection</h1>
                    <p class="case-study-excerpt">Securing financial transactions with real-time AI fraud detection, preventing $2M+ in fraudulent transactions.</p>
                    <div class="case-study-meta">
                        <div class="meta-item"><span class="meta-label">Client</span><span class="meta-value">PaySecure India</span></div>
                        <div class="meta-item"><span class="meta-label">Industry</span><span class="meta-value">Financial Services</span></div>
                        <div class="meta-item"><span class="meta-label">Duration</span><span class="meta-value">7 Months</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="case-study-content">
            <div class="section-container">
                <div class="case-study-grid">
                    <div class="case-study-main">
                        <div class="content-section">
                            <h2>Project Overview</h2>
                            <p>PaySecure India, a growing digital payments company, needed a mobile app that could handle high-volume transactions while detecting and preventing fraud in real-time. With increasing cyber threats, they required military-grade security without compromising user experience.</p>
                        </div>
                        <div class="content-section">
                            <h2>The Challenge</h2>
                            <ul>
                                <li>Rising fraud losses of $200K+ monthly</li>
                                <li>High false positive rate blocking legitimate transactions</li>
                                <li>Need for sub-second fraud detection</li>
                                <li>PCI-DSS compliance requirements</li>
                                <li>Support for 50K+ concurrent users</li>
                                <li>Integration with multiple banking APIs</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Our Solution</h2>
                            <ul>
                                <li><strong>Real-time Fraud Detection:</strong> ML model analyzing 100+ transaction signals in under 50ms</li>
                                <li><strong>Behavioral Biometrics:</strong> User behavior patterns for continuous authentication</li>
                                <li><strong>Device Fingerprinting:</strong> Advanced device identification and trust scoring</li>
                                <li><strong>Secure Architecture:</strong> End-to-end encryption with HSM integration</li>
                                <li><strong>Smart Notifications:</strong> AI-prioritized alerts for suspicious activity</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Results</h2>
                            <div class="results-grid">
                                <div class="result-card"><span class="result-number">$2M+</span><span class="result-label">Fraud Prevented</span></div>
                                <div class="result-card"><span class="result-number">99.9%</span><span class="result-label">Uptime</span></div>
                                <div class="result-card"><span class="result-number">50K+</span><span class="result-label">Active Users</span></div>
                                <div class="result-card"><span class="result-number">50ms</span><span class="result-label">Detection Time</span></div>
                            </div>
                            <ul>
                                <li>Fraud losses reduced by 95%</li>
                                <li>False positive rate reduced from 8% to 0.5%</li>
                                <li>User satisfaction score of 4.8/5</li>
                                <li>PCI-DSS Level 1 compliance achieved</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Client Testimonial</h2>
                            <div class="testimonial-card" style="background: rgba(99, 102, 241, 0.1); border-color: rgba(99, 102, 241, 0.3);">
                                <div class="testimonial-content">
                                    <div class="testimonial-stars">★★★★★</div>
                                    <p class="testimonial-text">"The fraud detection system has been phenomenal. We've prevented millions in potential losses while maintaining a seamless user experience. Our customers trust us more than ever."</p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-avatar">RG</div>
                                    <div class="author-info">
                                        <h4>Rahul Gupta</h4>
                                        <p>CTO, PaySecure India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="case-study-sidebar">
                        <div class="sidebar-card">
                            <h4>Technologies Used</h4>
                            <div class="tech-list">
                                <span class="tech-item">Flutter</span><span class="tech-item">Python</span><span class="tech-item">TensorFlow</span><span class="tech-item">Kafka</span><span class="tech-item">Redis</span><span class="tech-item">PostgreSQL</span><span class="tech-item">AWS</span><span class="tech-item">HSM</span>
                            </div>
                        </div>
                        <div class="sidebar-card" style="background: var(--gradient-primary); border: none;">
                            <h4 style="color: white;">Start Your Project</h4>
                            <a href="{{ url('/#contact') }}" class="btn btn-white btn-block">Get Free Consultation</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="cta-container">
                <div class="cta-content">
                    <h2 class="cta-title">Secure Your Financial Platform</h2>
                    <div class="cta-buttons">
                        <a href="{{ url('/#contact') }}" class="btn btn-white btn-lg">Start Your Project</a>
                        <a href="{{ route('success-stories') }}" class="btn btn-outline-white btn-lg">View All Case Studies</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('sections.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
