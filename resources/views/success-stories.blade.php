<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Stories - KA Software | Client Case Studies & Projects</title>
    <meta name="description" content="Explore our success stories and case studies. See how KA Software has helped businesses transform with AI-powered solutions, mobile apps, and web applications.">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/success-stories.css') }}">
</head>
<body>
    <!-- Header -->
    @include('sections.header')

    <main>
        <!-- Hero Section -->
        <section class="stories-hero">
            <div class="stories-hero-bg">
                <div class="hero-gradient"></div>
                <div class="hero-pattern"></div>
                <div class="hero-glow hero-glow-1"></div>
                <div class="hero-glow hero-glow-2"></div>
            </div>
            
            <div class="section-container">
                <div class="stories-hero-content">
                    <span class="section-badge">Case Studies</span>
                    <h1 class="stories-hero-title">
                        Our <span class="gradient-text">Success Stories</span>
                    </h1>
                    <p class="stories-hero-desc">
                        Discover how we've helped businesses across industries transform their operations 
                        with innovative AI-powered solutions and cutting-edge technology.
                    </p>
                    
                    <!-- Stats -->
                    <div class="stories-stats">
                        <div class="stories-stat">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Projects Delivered</span>
                        </div>
                        <div class="stories-stat">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Client Satisfaction</span>
                        </div>
                        <div class="stories-stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Industries Served</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Case Studies -->
        <section class="featured-stories">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">Featured Projects</span>
                    <h2 class="section-title">Transforming Businesses with Technology</h2>
                    <p class="section-description">
                        Explore our most impactful projects and see the real results we've delivered for our clients.
                    </p>
                </div>

                <div class="stories-grid">
                    <!-- Case Study 1: Healthcare AI -->
                    <article class="story-card featured">
                        <div class="story-image healthcare-bg">
                            <div class="story-overlay">
                                <span class="story-category">Healthcare</span>
                            </div>
                            <div class="story-icon">🏥</div>
                        </div>
                        <div class="story-content">
                            <div class="story-meta">
                                <span class="story-date">December 2024</span>
                                <span class="story-read-time">8 min read</span>
                            </div>
                            <h3 class="story-title">AI-Powered Diagnostic Platform for Healthcare</h3>
                            <p class="story-excerpt">
                                Revolutionizing medical diagnosis with computer vision and machine learning, 
                                achieving 95% accuracy in early disease detection and reducing diagnosis time by 60%.
                            </p>
                            <div class="story-results">
                                <div class="result-item">
                                    <span class="result-number">95%</span>
                                    <span class="result-label">Accuracy</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">60%</span>
                                    <span class="result-label">Faster Diagnosis</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">50K+</span>
                                    <span class="result-label">Patients Served</span>
                                </div>
                            </div>
                            <div class="story-tags">
                                <span class="tag">AI/ML</span>
                                <span class="tag">Computer Vision</span>
                                <span class="tag">Healthcare</span>
                            </div>
                            <a href="{{ route('case-study.healthcare') }}" class="story-link">
                                Read Full Case Study
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <!-- Case Study 2: E-commerce -->
                    <article class="story-card">
                        <div class="story-image ecommerce-bg">
                            <div class="story-overlay">
                                <span class="story-category">E-commerce</span>
                            </div>
                            <div class="story-icon">🛒</div>
                        </div>
                        <div class="story-content">
                            <div class="story-meta">
                                <span class="story-date">November 2024</span>
                                <span class="story-read-time">6 min read</span>
                            </div>
                            <h3 class="story-title">Smart E-commerce Platform with AI Recommendations</h3>
                            <p class="story-excerpt">
                                Building an intelligent shopping experience with personalized recommendations, 
                                resulting in 40% increase in sales and 65% improvement in customer retention.
                            </p>
                            <div class="story-results">
                                <div class="result-item">
                                    <span class="result-number">40%</span>
                                    <span class="result-label">Sales Increase</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">65%</span>
                                    <span class="result-label">Retention</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">2M+</span>
                                    <span class="result-label">Products</span>
                                </div>
                            </div>
                            <div class="story-tags">
                                <span class="tag">E-commerce</span>
                                <span class="tag">AI Recommendations</span>
                                <span class="tag">React</span>
                            </div>
                            <a href="{{ route('case-study.ecommerce') }}" class="story-link">
                                Read Full Case Study
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <!-- Case Study 3: HRMS -->
                    <article class="story-card">
                        <div class="story-image hrms-bg">
                            <div class="story-overlay">
                                <span class="story-category">Enterprise</span>
                            </div>
                            <div class="story-icon">👥</div>
                        </div>
                        <div class="story-content">
                            <div class="story-meta">
                                <span class="story-date">October 2024</span>
                                <span class="story-read-time">7 min read</span>
                            </div>
                            <h3 class="story-title">Enterprise HRMS with AI-Powered Recruitment</h3>
                            <p class="story-excerpt">
                                Transforming HR operations with intelligent automation, reducing hiring time 
                                by 70% and improving employee engagement scores by 45%.
                            </p>
                            <div class="story-results">
                                <div class="result-item">
                                    <span class="result-number">70%</span>
                                    <span class="result-label">Faster Hiring</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">45%</span>
                                    <span class="result-label">Engagement Up</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">10K+</span>
                                    <span class="result-label">Employees</span>
                                </div>
                            </div>
                            <div class="story-tags">
                                <span class="tag">HRMS</span>
                                <span class="tag">AI Recruitment</span>
                                <span class="tag">SaaS</span>
                            </div>
                            <a href="{{ route('case-study.hrms') }}" class="story-link">
                                Read Full Case Study
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <!-- Case Study 4: CRM -->
                    <article class="story-card">
                        <div class="story-image crm-bg">
                            <div class="story-overlay">
                                <span class="story-category">Sales & CRM</span>
                            </div>
                            <div class="story-icon">📊</div>
                        </div>
                        <div class="story-content">
                            <div class="story-meta">
                                <span class="story-date">September 2024</span>
                                <span class="story-read-time">5 min read</span>
                            </div>
                            <h3 class="story-title">Intelligent CRM with Predictive Lead Scoring</h3>
                            <p class="story-excerpt">
                                Empowering sales teams with AI-driven insights, achieving 60% improvement 
                                in lead conversion rates and 35% increase in revenue.
                            </p>
                            <div class="story-results">
                                <div class="result-item">
                                    <span class="result-number">60%</span>
                                    <span class="result-label">Conversion Up</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">35%</span>
                                    <span class="result-label">Revenue Growth</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">500+</span>
                                    <span class="result-label">Sales Reps</span>
                                </div>
                            </div>
                            <div class="story-tags">
                                <span class="tag">CRM</span>
                                <span class="tag">Predictive Analytics</span>
                                <span class="tag">Sales</span>
                            </div>
                            <a href="{{ route('case-study.crm') }}" class="story-link">
                                Read Full Case Study
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <!-- Case Study 5: FinTech -->
                    <article class="story-card">
                        <div class="story-image fintech-bg">
                            <div class="story-overlay">
                                <span class="story-category">FinTech</span>
                            </div>
                            <div class="story-icon">💳</div>
                        </div>
                        <div class="story-content">
                            <div class="story-meta">
                                <span class="story-date">August 2024</span>
                                <span class="story-read-time">6 min read</span>
                            </div>
                            <h3 class="story-title">FinTech Mobile App with AI Fraud Detection</h3>
                            <p class="story-excerpt">
                                Securing financial transactions with real-time AI fraud detection, 
                                preventing $2M+ in fraudulent transactions and serving 50K+ users.
                            </p>
                            <div class="story-results">
                                <div class="result-item">
                                    <span class="result-number">$2M+</span>
                                    <span class="result-label">Fraud Prevented</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">99.9%</span>
                                    <span class="result-label">Uptime</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">50K+</span>
                                    <span class="result-label">Users</span>
                                </div>
                            </div>
                            <div class="story-tags">
                                <span class="tag">FinTech</span>
                                <span class="tag">Mobile App</span>
                                <span class="tag">Security</span>
                            </div>
                            <a href="{{ route('case-study.fintech') }}" class="story-link">
                                Read Full Case Study
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <!-- Case Study 6: Manufacturing IoT -->
                    <article class="story-card">
                        <div class="story-image manufacturing-bg">
                            <div class="story-overlay">
                                <span class="story-category">Manufacturing</span>
                            </div>
                            <div class="story-icon">🏭</div>
                        </div>
                        <div class="story-content">
                            <div class="story-meta">
                                <span class="story-date">July 2024</span>
                                <span class="story-read-time">7 min read</span>
                            </div>
                            <h3 class="story-title">Smart Manufacturing with IoT & Predictive Maintenance</h3>
                            <p class="story-excerpt">
                                Implementing Industry 4.0 solutions with IoT sensors and AI-powered 
                                predictive maintenance, reducing downtime by 80% and saving $500K annually.
                            </p>
                            <div class="story-results">
                                <div class="result-item">
                                    <span class="result-number">80%</span>
                                    <span class="result-label">Less Downtime</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">$500K</span>
                                    <span class="result-label">Annual Savings</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">1000+</span>
                                    <span class="result-label">IoT Sensors</span>
                                </div>
                            </div>
                            <div class="story-tags">
                                <span class="tag">IoT</span>
                                <span class="tag">Industry 4.0</span>
                                <span class="tag">AI Analytics</span>
                            </div>
                            <a href="{{ route('case-study.manufacturing') }}" class="story-link">
                                Read Full Case Study
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Industries Section -->
        <section class="industries-section">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">Industries We Serve</span>
                    <h2 class="section-title">Cross-Industry Expertise</h2>
                </div>
                
                <div class="industries-grid">
                    <div class="industry-card">
                        <span class="industry-icon">🏥</span>
                        <h3>Healthcare</h3>
                        <p>AI diagnostics, patient management, telemedicine platforms</p>
                    </div>
                    <div class="industry-card">
                        <span class="industry-icon">🛒</span>
                        <h3>E-commerce</h3>
                        <p>Online stores, marketplaces, inventory management</p>
                    </div>
                    <div class="industry-card">
                        <span class="industry-icon">💰</span>
                        <h3>FinTech</h3>
                        <p>Banking apps, payment systems, fraud detection</p>
                    </div>
                    <div class="industry-card">
                        <span class="industry-icon">🏭</span>
                        <h3>Manufacturing</h3>
                        <p>IoT solutions, predictive maintenance, automation</p>
                    </div>
                    <div class="industry-card">
                        <span class="industry-icon">🎓</span>
                        <h3>Education</h3>
                        <p>E-learning platforms, LMS, virtual classrooms</p>
                    </div>
                    <div class="industry-card">
                        <span class="industry-icon">🚗</span>
                        <h3>Automotive</h3>
                        <p>Fleet management, connected vehicles, diagnostics</p>
                    </div>
                    <div class="industry-card">
                        <span class="industry-icon">🏨</span>
                        <h3>Hospitality</h3>
                        <p>Booking systems, guest experience, operations</p>
                    </div>
                    <div class="industry-card">
                        <span class="industry-icon">📦</span>
                        <h3>Logistics</h3>
                        <p>Supply chain, tracking, route optimization</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">Client Testimonials</span>
                    <h2 class="section-title">What Our Clients Say</h2>
                </div>
                
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-stars">★★★★★</div>
                            <p class="testimonial-text">
                                "KA Software transformed our healthcare operations with their AI diagnostic platform. 
                                The accuracy and speed improvements have been remarkable. Highly recommended!"
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">DR</div>
                            <div class="author-info">
                                <h4>Dr. Rajesh Kumar</h4>
                                <p>CEO, MedTech Solutions</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-stars">★★★★★</div>
                            <p class="testimonial-text">
                                "The e-commerce platform they built exceeded our expectations. Sales increased by 40% 
                                within the first quarter. Their AI recommendations are game-changing."
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">PS</div>
                            <div class="author-info">
                                <h4>Priya Sharma</h4>
                                <p>Founder, ShopEase India</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-stars">★★★★★</div>
                            <p class="testimonial-text">
                                "Implementing their HRMS solution streamlined our entire HR process. The AI-powered 
                                recruitment feature saved us countless hours and improved hire quality."
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">AM</div>
                            <div class="author-info">
                                <h4>Arun Menon</h4>
                                <p>HR Director, TechCorp Ltd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="cta-container">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Write Your Success Story?</h2>
                    <p class="cta-description">
                        Let's discuss how we can help transform your business with intelligent, AI-powered solutions.
                    </p>
                    <div class="cta-buttons">
                        <a href="{{ url('/#contact') }}" class="btn btn-white btn-lg">
                            <span>Start Your Project</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <a href="tel:+918056653499" class="btn btn-outline-white btn-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span>Call Us Now</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="cta-bg">
                <div class="cta-shape cta-shape-1"></div>
                <div class="cta-shape cta-shape-2"></div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('sections.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
