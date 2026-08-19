<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise HRMS - Case Study | KA Software</title>
    <meta name="description" content="How KA Software built an AI-powered HRMS that reduced hiring time by 70%.">
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
        <section class="case-study-hero" style="background: linear-gradient(135deg, #2563eb 0%, #3b82f6 50%, #1d4ed8 100%);">
            <div class="section-container">
                <div class="case-study-hero-content">
                    <span class="case-study-category"><i class="fa-solid fa-users"></i> Enterprise</span>
                    <h1 class="case-study-title">Enterprise HRMS with AI-Powered Recruitment</h1>
                    <p class="case-study-excerpt">Transforming HR operations with intelligent automation, reducing hiring time by 70%.</p>
                    <div class="case-study-meta">
                        <div class="meta-item"><span class="meta-label">Client</span><span class="meta-value">TechCorp Ltd</span></div>
                        <div class="meta-item"><span class="meta-label">Industry</span><span class="meta-value">Technology</span></div>
                        <div class="meta-item"><span class="meta-label">Duration</span><span class="meta-value">10 Months</span></div>
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
                            <p>TechCorp Ltd, a multinational IT services company with 10,000+ employees, needed a unified HRMS platform with AI capabilities to streamline recruitment and automate routine tasks.</p>
                        </div>
                        <div class="content-section">
                            <h2>The Challenge</h2>
                            <ul>
                                <li>Average time-to-hire of 45 days</li>
                                <li>Manual resume screening of 5,000+ applications monthly</li>
                                <li>Disconnected systems for payroll, attendance, and performance</li>
                                <li>Low employee engagement scores</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Our Solution</h2>
                            <ul>
                                <li><strong>Smart Resume Parser:</strong> NLP-based extraction of skills and experience</li>
                                <li><strong>Candidate Matching:</strong> ML algorithm with 92% accuracy</li>
                                <li><strong>Performance Management:</strong> 360-degree feedback with AI insights</li>
                                <li><strong>Analytics Dashboard:</strong> Real-time HR metrics</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Results</h2>
                            <div class="results-grid">
                                <div class="result-card"><span class="result-number">70%</span><span class="result-label">Faster Hiring</span></div>
                                <div class="result-card"><span class="result-number">45%</span><span class="result-label">Engagement Up</span></div>
                                <div class="result-card"><span class="result-number">10K+</span><span class="result-label">Employees</span></div>
                                <div class="result-card"><span class="result-number">$800K</span><span class="result-label">Annual Savings</span></div>
                            </div>
                        </div>
                    </div>
                    <aside class="case-study-sidebar">
                        <div class="sidebar-card">
                            <h4>Technologies Used</h4>
                            <div class="tech-list">
                                <span class="tech-item">Python</span><span class="tech-item">Django</span><span class="tech-item">React</span><span class="tech-item">TensorFlow</span><span class="tech-item">PostgreSQL</span><span class="tech-item">AWS</span>
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
                    <h2 class="cta-title">Transform Your HR Operations</h2>
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
