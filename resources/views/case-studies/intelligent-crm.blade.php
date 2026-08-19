<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intelligent CRM - Case Study | KA Software</title>
    <meta name="description" content="How KA Software built an AI-powered CRM that improved lead conversion by 60%.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{ asset('css/success-stories.css') }}">
</head>
<body>
    @include('sections.header')
    <main>
        <section class="case-study-hero" style="background: linear-gradient(135deg, #db2777 0%, #ec4899 50%, #be185d 100%);">
            <div class="section-container">
                <div class="case-study-hero-content">
                    <span class="case-study-category"><i class="fa-solid fa-chart-pie"></i> Sales & CRM</span>
                    <h1 class="case-study-title">Intelligent CRM with Predictive Lead Scoring</h1>
                    <p class="case-study-excerpt">Empowering sales teams with AI-driven insights, achieving 60% improvement in lead conversion rates.</p>
                    <div class="case-study-meta">
                        <div class="meta-item"><span class="meta-label">Client</span><span class="meta-value">SalesForce Pro</span></div>
                        <div class="meta-item"><span class="meta-label">Industry</span><span class="meta-value">B2B Sales</span></div>
                        <div class="meta-item"><span class="meta-label">Duration</span><span class="meta-value">5 Months</span></div>
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
                            <p>SalesForce Pro, a B2B services company with 500+ sales representatives, was struggling with low conversion rates and inefficient lead management. They needed an intelligent CRM system that could prioritize leads and automate follow-ups.</p>
                        </div>
                        <div class="content-section">
                            <h2>The Challenge</h2>
                            <ul>
                                <li>Low lead conversion rate of 8%</li>
                                <li>Sales reps spending 60% time on unqualified leads</li>
                                <li>No visibility into sales pipeline health</li>
                                <li>Manual data entry causing errors and delays</li>
                                <li>Inconsistent follow-up processes</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Our Solution</h2>
                            <ul>
                                <li><strong>Predictive Lead Scoring:</strong> ML model analyzing 50+ signals to score leads</li>
                                <li><strong>Smart Pipeline Management:</strong> AI-powered deal forecasting with 85% accuracy</li>
                                <li><strong>Automated Workflows:</strong> Trigger-based email sequences and task assignments</li>
                                <li><strong>Conversation Intelligence:</strong> Call recording analysis with action items</li>
                                <li><strong>Real-time Analytics:</strong> Interactive dashboards with predictive insights</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Results</h2>
                            <div class="results-grid">
                                <div class="result-card"><span class="result-number">60%</span><span class="result-label">Conversion Up</span></div>
                                <div class="result-card"><span class="result-number">35%</span><span class="result-label">Revenue Growth</span></div>
                                <div class="result-card"><span class="result-number">500+</span><span class="result-label">Sales Reps</span></div>
                                <div class="result-card"><span class="result-number">40%</span><span class="result-label">Time Saved</span></div>
                            </div>
                        </div>
                        <div class="content-section">
                            <h2>Client Testimonial</h2>
                            <div class="testimonial-card" style="background: rgba(99, 102, 241, 0.1); border-color: rgba(99, 102, 241, 0.3);">
                                <div class="testimonial-content">
                                    <div class="testimonial-stars">★★★★★</div>
                                    <p class="testimonial-text">"The predictive lead scoring has been a game-changer. Our sales team now focuses on high-potential leads, and our conversion rates have skyrocketed. The ROI was visible within the first month."</p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-avatar">VK</div>
                                    <div class="author-info">
                                        <h4>Vikram Krishnan</h4>
                                        <p>VP Sales, SalesForce Pro</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="case-study-sidebar">
                        <div class="sidebar-card">
                            <h4>Technologies Used</h4>
                            <div class="tech-list">
                                <span class="tech-item">Python</span><span class="tech-item">Scikit-learn</span><span class="tech-item">React</span><span class="tech-item">Node.js</span><span class="tech-item">PostgreSQL</span><span class="tech-item">Redis</span><span class="tech-item">AWS</span>
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
                    <h2 class="cta-title">Boost Your Sales Performance</h2>
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
    <script src="{{ asset('js/chatbot.js') }}"></script>
</body>
</html>
