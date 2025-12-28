<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile - KA Software | AI-Powered Software Development</title>
    <meta name="description" content="Learn about KA Software - A leading AI-powered software development company based in Chennai, India. We specialize in mobile apps, web applications, e-commerce, HRMS, CRM and AI/ML solutions.">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <!-- Header -->
    <header id="header">
        <nav class="nav-container">
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-icon">
                    <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="8" fill="url(#logo-gradient)"/>
                        <path d="M12 28V12H16L20 20L24 12H28V28H24V18L20 26H20L16 18V28H12Z" fill="white"/>
                        <defs>
                            <linearGradient id="logo-gradient" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#6366F1"/>
                                <stop offset="1" stop-color="#8B5CF6"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <span class="logo-text">KA Software</span>
            </a>
            
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li><a href="{{ url('/#services') }}" class="nav-link">Services</a></li>
                <li><a href="{{ url('/#portfolio') }}" class="nav-link">Portfolio</a></li>
                <li><a href="{{ url('/#contact') }}" class="nav-link">Contact</a></li>
                <li><a href="{{ route('profile') }}" class="nav-link active">Profile</a></li>
            </ul>
            
            <a href="{{ url('/#contact') }}" class="btn btn-primary nav-cta">Get Started</a>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <main>
        <!-- Profile Hero -->
        <section class="profile-hero">
            <div class="profile-hero-bg">
                <div class="hero-gradient"></div>
                <div class="hero-pattern"></div>
                <div class="hero-glow hero-glow-1"></div>
                <div class="hero-glow hero-glow-2"></div>
            </div>
            
            <div class="section-container">
                <div class="profile-hero-content">
                    <span class="section-badge">Company Profile</span>
                    <h1 class="profile-hero-title">
                        Transforming Ideas into
                        <span class="gradient-text">Intelligent Solutions</span>
                    </h1>
                    <p class="profile-hero-desc">
                        We are a passionate team of developers, designers, and AI specialists 
                        dedicated to building cutting-edge software solutions that drive business growth.
                    </p>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="profile-section about-section">
            <div class="section-container">
                <div class="about-grid">
                    <div class="about-content">
                        <span class="section-badge">About Us</span>
                        <h2 class="section-title">Who We Are</h2>
                        <p class="about-text">
                            <strong>KA Software</strong> is a leading software development company based in Chennai, India. 
                            Founded in 2024, we specialize in creating innovative, AI-powered solutions that help businesses 
                            thrive in the digital age.
                        </p>
                        <p class="about-text">
                            Our team comprises experienced developers, creative designers, and AI/ML experts who are 
                            passionate about leveraging technology to solve complex business challenges. We believe 
                            in delivering not just software, but intelligent solutions that drive real results.
                        </p>
                        <p class="about-text">
                            From startups to enterprises, we partner with businesses across industries to build 
                            scalable, secure, and user-friendly applications that stand out in the market.
                        </p>
                    </div>
                    <div class="about-image">
                        <div class="about-card">
                            <div class="about-card-icon">🚀</div>
                            <h3>Our Mission</h3>
                            <p>To empower businesses with intelligent software solutions that drive innovation, efficiency, and growth.</p>
                        </div>
                        <div class="about-card">
                            <div class="about-card-icon">🎯</div>
                            <h3>Our Vision</h3>
                            <p>To be the leading AI-powered software development company, transforming how businesses operate globally.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Company Info Section -->
        <section class="profile-section company-info-section">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">Company Information</span>
                    <h2 class="section-title">At a Glance</h2>
                </div>
                
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <h3 class="info-title">Company Name</h3>
                        <p class="info-value">KA Software</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <h3 class="info-title">Founded</h3>
                        <p class="info-value">2024</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="info-title">Headquarters</h3>
                        <p class="info-value">Chennai, India</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </div>
                        <h3 class="info-title">Industry</h3>
                        <p class="info-value">Software Development</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3 class="info-title">Team Size</h3>
                        <p class="info-value">25+ Professionals</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <h3 class="info-title">Projects Delivered</h3>
                        <p class="info-value">500+</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="profile-section services-detail-section">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">What We Do</span>
                    <h2 class="section-title">Our Services</h2>
                    <p class="section-description">
                        Comprehensive software solutions powered by cutting-edge AI technology
                    </p>
                </div>
                
                <div class="services-detail-grid">
                    <div class="service-detail-card">
                        <div class="service-detail-number">01</div>
                        <div class="service-detail-content">
                            <h3>Mobile App Development</h3>
                            <p>Native and cross-platform mobile applications for iOS and Android with AI-powered features, intuitive UX, and seamless performance.</p>
                            <ul class="service-features">
                                <li>Native iOS & Android Apps</li>
                                <li>Cross-platform (Flutter, React Native)</li>
                                <li>AI-powered Features</li>
                                <li>App Store Optimization</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="service-detail-card">
                        <div class="service-detail-number">02</div>
                        <div class="service-detail-content">
                            <h3>Web Application Development</h3>
                            <p>Responsive, scalable web applications with modern frameworks, cloud integration, and intelligent automation capabilities.</p>
                            <ul class="service-features">
                                <li>React, Vue.js, Angular</li>
                                <li>Node.js, Python, Laravel</li>
                                <li>Cloud Deployment (AWS, GCP)</li>
                                <li>Progressive Web Apps</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="service-detail-card">
                        <div class="service-detail-number">03</div>
                        <div class="service-detail-content">
                            <h3>E-commerce Solutions</h3>
                            <p>Complete e-commerce platforms with AI-driven recommendations, dynamic pricing, and seamless payment integration.</p>
                            <ul class="service-features">
                                <li>Custom E-commerce Platforms</li>
                                <li>Shopify, WooCommerce, Magento</li>
                                <li>AI Product Recommendations</li>
                                <li>Payment Gateway Integration</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="service-detail-card">
                        <div class="service-detail-number">04</div>
                        <div class="service-detail-content">
                            <h3>HRMS Solutions</h3>
                            <p>Comprehensive HR management systems with AI-powered recruitment, performance analytics, and employee engagement tools.</p>
                            <ul class="service-features">
                                <li>Employee Management</li>
                                <li>AI-powered Recruitment</li>
                                <li>Payroll & Attendance</li>
                                <li>Performance Analytics</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="service-detail-card">
                        <div class="service-detail-number">05</div>
                        <div class="service-detail-content">
                            <h3>CRM Systems</h3>
                            <p>Intelligent customer relationship management with predictive analytics, automated workflows, and sales forecasting.</p>
                            <ul class="service-features">
                                <li>Lead Management</li>
                                <li>Sales Automation</li>
                                <li>Predictive Analytics</li>
                                <li>Customer Insights</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="service-detail-card featured">
                        <div class="service-detail-number">06</div>
                        <div class="service-detail-content">
                            <h3>AI/ML Solutions</h3>
                            <p>Custom artificial intelligence and machine learning solutions including computer vision, NLP, and predictive modeling.</p>
                            <ul class="service-features">
                                <li>Machine Learning Models</li>
                                <li>Natural Language Processing</li>
                                <li>Computer Vision</li>
                                <li>Predictive Analytics</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technologies Section -->
        <section class="profile-section tech-section">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">Technology Stack</span>
                    <h2 class="section-title">Technologies We Use</h2>
                </div>
                
                <div class="tech-categories">
                    <div class="tech-category">
                        <h3 class="tech-category-title">Frontend</h3>
                        <div class="tech-tags">
                            <span class="tech-tag">React</span>
                            <span class="tech-tag">Vue.js</span>
                            <span class="tech-tag">Angular</span>
                            <span class="tech-tag">Next.js</span>
                            <span class="tech-tag">TypeScript</span>
                            <span class="tech-tag">Tailwind CSS</span>
                        </div>
                    </div>
                    
                    <div class="tech-category">
                        <h3 class="tech-category-title">Backend</h3>
                        <div class="tech-tags">
                            <span class="tech-tag">Node.js</span>
                            <span class="tech-tag">Python</span>
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">Django</span>
                            <span class="tech-tag">Express.js</span>
                            <span class="tech-tag">FastAPI</span>
                        </div>
                    </div>
                    
                    <div class="tech-category">
                        <h3 class="tech-category-title">Mobile</h3>
                        <div class="tech-tags">
                            <span class="tech-tag">Flutter</span>
                            <span class="tech-tag">React Native</span>
                            <span class="tech-tag">Swift</span>
                            <span class="tech-tag">Kotlin</span>
                            <span class="tech-tag">iOS</span>
                            <span class="tech-tag">Android</span>
                        </div>
                    </div>
                    
                    <div class="tech-category">
                        <h3 class="tech-category-title">AI/ML</h3>
                        <div class="tech-tags">
                            <span class="tech-tag">TensorFlow</span>
                            <span class="tech-tag">PyTorch</span>
                            <span class="tech-tag">OpenAI</span>
                            <span class="tech-tag">Scikit-learn</span>
                            <span class="tech-tag">AWS ML</span>
                            <span class="tech-tag">Google AI</span>
                        </div>
                    </div>
                    
                    <div class="tech-category">
                        <h3 class="tech-category-title">Database</h3>
                        <div class="tech-tags">
                            <span class="tech-tag">PostgreSQL</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">MongoDB</span>
                            <span class="tech-tag">Redis</span>
                            <span class="tech-tag">Firebase</span>
                            <span class="tech-tag">Elasticsearch</span>
                        </div>
                    </div>
                    
                    <div class="tech-category">
                        <h3 class="tech-category-title">Cloud & DevOps</h3>
                        <div class="tech-tags">
                            <span class="tech-tag">AWS</span>
                            <span class="tech-tag">Google Cloud</span>
                            <span class="tech-tag">Azure</span>
                            <span class="tech-tag">Docker</span>
                            <span class="tech-tag">Kubernetes</span>
                            <span class="tech-tag">CI/CD</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="profile-section why-us-section">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">Why Choose Us</span>
                    <h2 class="section-title">Our Competitive Edge</h2>
                </div>
                
                <div class="why-us-grid">
                    <div class="why-us-card">
                        <div class="why-us-icon">💡</div>
                        <h3>Innovation First</h3>
                        <p>We stay ahead of technology trends, integrating AI and cutting-edge solutions into every project.</p>
                    </div>
                    
                    <div class="why-us-card">
                        <div class="why-us-icon">🎯</div>
                        <h3>Result-Oriented</h3>
                        <p>Our focus is on delivering measurable business outcomes, not just technical deliverables.</p>
                    </div>
                    
                    <div class="why-us-card">
                        <div class="why-us-icon">🤝</div>
                        <h3>Client Partnership</h3>
                        <p>We work as an extension of your team, ensuring transparent communication and collaboration.</p>
                    </div>
                    
                    <div class="why-us-card">
                        <div class="why-us-icon">⚡</div>
                        <h3>Agile Delivery</h3>
                        <p>Our agile methodology ensures faster time-to-market with iterative development and feedback.</p>
                    </div>
                    
                    <div class="why-us-card">
                        <div class="why-us-icon">🔒</div>
                        <h3>Security First</h3>
                        <p>Enterprise-grade security practices integrated into every stage of development.</p>
                    </div>
                    
                    <div class="why-us-card">
                        <div class="why-us-icon">📞</div>
                        <h3>24/7 Support</h3>
                        <p>Round-the-clock support and maintenance to ensure your systems run smoothly.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="profile-section contact-section">
            <div class="section-container">
                <div class="contact-profile-grid">
                    <div class="contact-profile-info">
                        <span class="section-badge">Get In Touch</span>
                        <h2 class="section-title">Contact Information</h2>
                        <p class="section-description">
                            Ready to start your project? Reach out to us through any of the following channels.
                        </p>
                        
                        <div class="contact-details-list">
                            <div class="contact-detail-item">
                                <div class="contact-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <div class="contact-detail-content">
                                    <h4>Email</h4>
                                    <p><a href="mailto:info@kasoftware.in">info@kasoftware.in</a></p>
                                    <p><a href="mailto:helpdesk@kasoftware.in">helpdesk@kasoftware.in</a></p>
                                </div>
                            </div>
                            
                            <div class="contact-detail-item">
                                <div class="contact-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                                <div class="contact-detail-content">
                                    <h4>Phone</h4>
                                    <p><a href="tel:+918056653499">+91 8056653499</a></p>
                                </div>
                            </div>
                            
                            <div class="contact-detail-item">
                                <div class="contact-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="contact-detail-content">
                                    <h4>Address</h4>
                                    <p>18/15, Subramaniam Street, Rajaji Nagar</p>
                                    <p>Villivakkam Road, Anna Nagar</p>
                                    <p>Chennai - 600049, India</p>
                                </div>
                            </div>
                            
                            <div class="contact-detail-item">
                                <div class="contact-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <div class="contact-detail-content">
                                    <h4>Business Hours</h4>
                                    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                                    <p>Saturday: 10:00 AM - 4:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-profile-map">
                        <div class="map-placeholder">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0089669498407!2d80.20940897507692!3d13.098115287235065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5264379c25823d%3A0x6a35a6e5b9f42f36!2sAnna%20Nagar%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1703755200000!5m2!1sen!2sin" 
                                width="100%" 
                                height="100%" 
                                style="border:0; border-radius: 16px;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="cta-container">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Start Your Project?</h2>
                    <p class="cta-description">
                        Let's discuss how we can help transform your ideas into powerful, AI-driven solutions.
                    </p>
                    <div class="cta-buttons">
                        <a href="{{ url('/#contact') }}" class="btn btn-white btn-lg">
                            <span>Get Free Consultation</span>
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
