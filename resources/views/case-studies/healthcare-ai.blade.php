<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare AI Platform - Case Study | KA Software</title>
    <meta name="description" content="Discover how KA Software built an AI-powered diagnostic platform that achieved 95% accuracy in disease detection and reduced diagnosis time by 60%.">
    
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
        <!-- Hero Section -->
        <section class="case-study-hero" style="background: linear-gradient(135deg, #059669 0%, #10b981 50%, #047857 100%);">
            <div class="case-study-hero-bg">
                <div class="hero-pattern"></div>
            </div>
            
            <div class="section-container">
                <div class="case-study-hero-content">
                    <span class="case-study-category"><i class="fa-solid fa-hospital"></i> Healthcare</span>
                    <h1 class="case-study-title">AI-Powered Diagnostic Platform for Healthcare</h1>
                    <p class="case-study-excerpt">
                        Revolutionizing medical diagnosis with computer vision and machine learning, 
                        achieving 95% accuracy in early disease detection.
                    </p>
                    <div class="case-study-meta">
                        <div class="meta-item">
                            <span class="meta-label">Client</span>
                            <span class="meta-value">MedTech Solutions Pvt Ltd</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Industry</span>
                            <span class="meta-value">Healthcare</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Duration</span>
                            <span class="meta-value">8 Months</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Year</span>
                            <span class="meta-value">2024</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Case Study Content -->
        <section class="case-study-content">
            <div class="section-container">
                <div class="case-study-grid">
                    <div class="case-study-main">
                        <!-- Overview -->
                        <div class="content-section">
                            <h2>Project Overview</h2>
                            <p>
                                MedTech Solutions, a leading healthcare provider in South India, approached us with a challenge: 
                                their radiologists were overwhelmed with the volume of medical images requiring analysis, leading 
                                to longer wait times for patients and potential for human error due to fatigue.
                            </p>
                            <p>
                                They needed an AI-powered solution that could assist their medical professionals in analyzing 
                                X-rays, CT scans, and MRI images to detect early signs of diseases including cancer, tuberculosis, 
                                and cardiovascular conditions.
                            </p>
                        </div>

                        <!-- Challenge -->
                        <div class="content-section">
                            <h2>The Challenge</h2>
                            <p>The healthcare facility faced several critical challenges:</p>
                            <ul>
                                <li>Processing over 500 medical images daily with limited radiologist availability</li>
                                <li>Average diagnosis turnaround time of 72 hours causing patient anxiety</li>
                                <li>Inconsistent analysis quality during high-volume periods</li>
                                <li>Need for early detection of diseases to improve patient outcomes</li>
                                <li>Compliance with healthcare data regulations (HIPAA equivalent)</li>
                            </ul>
                        </div>

                        <!-- Solution -->
                        <div class="content-section">
                            <h2>Our Solution</h2>
                            <p>
                                We developed a comprehensive AI diagnostic platform that integrates seamlessly with existing 
                                hospital systems while maintaining the highest standards of accuracy and security.
                            </p>
                            
                            <h3>Key Features Implemented</h3>
                            <ul>
                                <li><strong>Deep Learning Image Analysis:</strong> Custom CNN models trained on 100,000+ anonymized medical images</li>
                                <li><strong>Multi-Disease Detection:</strong> Capable of identifying 15+ conditions across different imaging modalities</li>
                                <li><strong>Confidence Scoring:</strong> Each analysis includes confidence levels and areas of concern highlighted</li>
                                <li><strong>PACS Integration:</strong> Seamless connection with existing Picture Archiving and Communication Systems</li>
                                <li><strong>Real-time Processing:</strong> Analysis completed in under 30 seconds per image</li>
                                <li><strong>Audit Trail:</strong> Complete logging for regulatory compliance and quality assurance</li>
                            </ul>

                            <h3>Technical Architecture</h3>
                            <p>
                                The platform was built using a microservices architecture deployed on AWS, ensuring scalability, 
                                high availability, and compliance with healthcare regulations. We implemented:
                            </p>
                            <ul>
                                <li>TensorFlow-based deep learning models for image classification</li>
                                <li>Python backend with FastAPI for high-performance API endpoints</li>
                                <li>React-based dashboard for radiologists with annotation tools</li>
                                <li>End-to-end encryption and secure data handling</li>
                                <li>Automated model retraining pipeline for continuous improvement</li>
                            </ul>
                        </div>

                        <!-- Results -->
                        <div class="content-section">
                            <h2>Results & Impact</h2>
                            <p>
                                The implementation of our AI diagnostic platform transformed MedTech Solutions' operations 
                                and patient care delivery:
                            </p>
                            
                            <div class="results-grid">
                                <div class="result-card">
                                    <span class="result-number">95%</span>
                                    <span class="result-label">Diagnostic Accuracy</span>
                                </div>
                                <div class="result-card">
                                    <span class="result-number">60%</span>
                                    <span class="result-label">Faster Diagnosis</span>
                                </div>
                                <div class="result-card">
                                    <span class="result-number">50K+</span>
                                    <span class="result-label">Patients Served</span>
                                </div>
                                <div class="result-card">
                                    <span class="result-number">40%</span>
                                    <span class="result-label">Cost Reduction</span>
                                </div>
                            </div>

                            <h3>Additional Outcomes</h3>
                            <ul>
                                <li>Diagnosis turnaround reduced from 72 hours to under 24 hours</li>
                                <li>30% increase in early-stage cancer detection</li>
                                <li>Radiologist productivity improved by 3x</li>
                                <li>Patient satisfaction scores increased by 45%</li>
                                <li>Zero data security incidents since deployment</li>
                            </ul>
                        </div>

                        <!-- Testimonial -->
                        <div class="content-section">
                            <h2>Client Testimonial</h2>
                            <div class="testimonial-card" style="background: rgba(99, 102, 241, 0.1); border-color: rgba(99, 102, 241, 0.3);">
                                <div class="testimonial-content">
                                    <div class="testimonial-stars">★★★★★</div>
                                    <p class="testimonial-text">
                                        "KA Software's AI platform has revolutionized how we deliver patient care. The accuracy 
                                        and speed of diagnosis have exceeded our expectations. Our radiologists now focus on 
                                        complex cases while the AI handles routine screenings with remarkable precision. This 
                                        partnership has truly transformed our healthcare delivery."
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-avatar">DR</div>
                                    <div class="author-info">
                                        <h4>Dr. Rajesh Kumar</h4>
                                        <p>Chief Medical Officer, MedTech Solutions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="case-study-sidebar">
                        <div class="sidebar-card">
                            <h4>Technologies Used</h4>
                            <div class="tech-list">
                                <span class="tech-item">TensorFlow</span>
                                <span class="tech-item">Python</span>
                                <span class="tech-item">FastAPI</span>
                                <span class="tech-item">React</span>
                                <span class="tech-item">AWS</span>
                                <span class="tech-item">Docker</span>
                                <span class="tech-item">PostgreSQL</span>
                                <span class="tech-item">Redis</span>
                            </div>
                        </div>

                        <div class="sidebar-card">
                            <h4>Project Timeline</h4>
                            <div class="timeline-list">
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Discovery & Planning</strong>
                                        <span>Month 1</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Data Collection & Preparation</strong>
                                        <span>Month 2-3</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Model Development</strong>
                                        <span>Month 3-5</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Platform Development</strong>
                                        <span>Month 4-6</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Testing & Validation</strong>
                                        <span>Month 6-7</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Deployment & Training</strong>
                                        <span>Month 8</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-card">
                            <h4>Services Provided</h4>
                            <ul class="footer-links">
                                <li>AI/ML Development</li>
                                <li>Computer Vision</li>
                                <li>Web Application</li>
                                <li>Cloud Deployment</li>
                                <li>System Integration</li>
                                <li>Training & Support</li>
                            </ul>
                        </div>

                        <div class="sidebar-card" style="background: var(--gradient-primary); border: none;">
                            <h4 style="color: white; border-color: rgba(255,255,255,0.2);">Start Your Project</h4>
                            <p style="color: rgba(255,255,255,0.8); font-size: 0.875rem; margin-bottom: 1rem;">
                                Ready to transform your healthcare operations with AI?
                            </p>
                            <a href="{{ url('/#contact') }}" class="btn btn-white btn-block">Get Free Consultation</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Related Stories -->
        <section class="related-stories">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">More Case Studies</span>
                    <h2 class="section-title">Related Success Stories</h2>
                </div>
                
                <div class="related-grid">
                    <article class="story-card">
                        <div class="story-image fintech-bg">
                            <div class="story-overlay">
                                <span class="story-category">FinTech</span>
                            </div>
                            <div class="story-icon"><i class="fa-solid fa-credit-card"></i></div>
                        </div>
                        <div class="story-content">
                            <h3 class="story-title">FinTech App with AI Fraud Detection</h3>
                            <p class="story-excerpt">Real-time fraud detection preventing $2M+ in losses.</p>
                            <a href="{{ route('case-study.fintech') }}" class="story-link">Read Case Study →</a>
                        </div>
                    </article>

                    <article class="story-card">
                        <div class="story-image manufacturing-bg">
                            <div class="story-overlay">
                                <span class="story-category">Manufacturing</span>
                            </div>
                            <div class="story-icon"><i class="fa-solid fa-industry"></i></div>
                        </div>
                        <div class="story-content">
                            <h3 class="story-title">Smart Manufacturing with IoT</h3>
                            <p class="story-excerpt">Predictive maintenance reducing downtime by 80%.</p>
                            <a href="{{ route('case-study.manufacturing') }}" class="story-link">Read Case Study →</a>
                        </div>
                    </article>

                    <article class="story-card">
                        <div class="story-image ecommerce-bg">
                            <div class="story-overlay">
                                <span class="story-category">E-commerce</span>
                            </div>
                            <div class="story-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                        </div>
                        <div class="story-content">
                            <h3 class="story-title">AI-Powered E-commerce Platform</h3>
                            <p class="story-excerpt">Personalized recommendations driving 40% sales increase.</p>
                            <a href="{{ route('case-study.ecommerce') }}" class="story-link">Read Case Study →</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta">
            <div class="cta-container">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Transform Your Business?</h2>
                    <p class="cta-description">Let's discuss how AI can revolutionize your operations.</p>
                    <div class="cta-buttons">
                        <a href="{{ url('/#contact') }}" class="btn btn-white btn-lg">Start Your Project</a>
                        <a href="{{ route('success-stories') }}" class="btn btn-outline-white btn-lg">View All Case Studies</a>
                    </div>
                </div>
            </div>
            <div class="cta-bg">
                <div class="cta-shape cta-shape-1"></div>
                <div class="cta-shape cta-shape-2"></div>
            </div>
        </section>
    </main>

    @include('sections.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
