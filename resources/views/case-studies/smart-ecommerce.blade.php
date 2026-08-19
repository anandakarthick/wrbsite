<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart E-commerce Platform - Case Study | KA Software</title>
    <meta name="description" content="How KA Software built an AI-powered e-commerce platform that increased sales by 40% through personalized recommendations.">
    
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
        <section class="case-study-hero" style="background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #6d28d9 100%);">
            <div class="case-study-hero-bg">
                <div class="hero-pattern"></div>
            </div>
            
            <div class="section-container">
                <div class="case-study-hero-content">
                    <span class="case-study-category"><i class="fa-solid fa-cart-shopping"></i> E-commerce</span>
                    <h1 class="case-study-title">Smart E-commerce Platform with AI Recommendations</h1>
                    <p class="case-study-excerpt">
                        Building an intelligent shopping experience with personalized recommendations 
                        that drove 40% increase in sales and transformed customer engagement.
                    </p>
                    <div class="case-study-meta">
                        <div class="meta-item">
                            <span class="meta-label">Client</span>
                            <span class="meta-value">ShopEase India</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Industry</span>
                            <span class="meta-value">E-commerce</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Duration</span>
                            <span class="meta-value">6 Months</span>
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
                        <div class="content-section">
                            <h2>Project Overview</h2>
                            <p>
                                ShopEase India, a rapidly growing online marketplace, was struggling to compete with larger 
                                e-commerce giants. They needed a platform that could provide personalized shopping experiences 
                                to increase customer engagement and sales conversion rates.
                            </p>
                            <p>
                                Our challenge was to build a complete e-commerce solution with AI-powered recommendations, 
                                dynamic pricing, and intelligent search capabilities that could handle 2+ million products 
                                and thousands of concurrent users.
                            </p>
                        </div>

                        <div class="content-section">
                            <h2>The Challenge</h2>
                            <ul>
                                <li>Low conversion rates (1.2%) compared to industry average of 2.5%</li>
                                <li>High cart abandonment rate of 78%</li>
                                <li>Generic product recommendations not driving engagement</li>
                                <li>Slow search performance affecting user experience</li>
                                <li>No personalization leading to poor customer retention</li>
                                <li>Manual inventory management causing stock issues</li>
                            </ul>
                        </div>

                        <div class="content-section">
                            <h2>Our Solution</h2>
                            <p>
                                We developed a comprehensive e-commerce platform with AI at its core, transforming every 
                                touchpoint of the customer journey.
                            </p>
                            
                            <h3>AI-Powered Features</h3>
                            <ul>
                                <li><strong>Personalized Recommendations:</strong> Collaborative filtering and content-based algorithms analyzing browsing history, purchase patterns, and user preferences</li>
                                <li><strong>Smart Search:</strong> Elasticsearch with NLP for typo tolerance, synonyms, and intent understanding</li>
                                <li><strong>Dynamic Pricing:</strong> Real-time price optimization based on demand, competition, and inventory</li>
                                <li><strong>Cart Recovery:</strong> AI-driven email campaigns with personalized incentives</li>
                                <li><strong>Visual Search:</strong> Upload image to find similar products</li>
                                <li><strong>Chatbot Assistant:</strong> 24/7 AI support for customer queries</li>
                            </ul>

                            <h3>Technical Implementation</h3>
                            <ul>
                                <li>React.js frontend with Next.js for SEO optimization</li>
                                <li>Node.js microservices architecture</li>
                                <li>TensorFlow recommendation engine</li>
                                <li>Elasticsearch for lightning-fast search</li>
                                <li>Redis caching for performance</li>
                                <li>AWS infrastructure with auto-scaling</li>
                            </ul>
                        </div>

                        <div class="content-section">
                            <h2>Results & Impact</h2>
                            <div class="results-grid">
                                <div class="result-card">
                                    <span class="result-number">40%</span>
                                    <span class="result-label">Sales Increase</span>
                                </div>
                                <div class="result-card">
                                    <span class="result-number">65%</span>
                                    <span class="result-label">Better Retention</span>
                                </div>
                                <div class="result-card">
                                    <span class="result-number">2M+</span>
                                    <span class="result-label">Products Listed</span>
                                </div>
                                <div class="result-card">
                                    <span class="result-number">3.5%</span>
                                    <span class="result-label">Conversion Rate</span>
                                </div>
                            </div>

                            <h3>Additional Achievements</h3>
                            <ul>
                                <li>Cart abandonment reduced from 78% to 52%</li>
                                <li>Average order value increased by 25%</li>
                                <li>Search-to-purchase conversion up by 60%</li>
                                <li>Customer support tickets reduced by 40%</li>
                                <li>Page load time under 2 seconds</li>
                            </ul>
                        </div>

                        <div class="content-section">
                            <h2>Client Testimonial</h2>
                            <div class="testimonial-card" style="background: rgba(99, 102, 241, 0.1); border-color: rgba(99, 102, 241, 0.3);">
                                <div class="testimonial-content">
                                    <div class="testimonial-stars">★★★★★</div>
                                    <p class="testimonial-text">
                                        "The e-commerce platform KA Software built exceeded all our expectations. The AI 
                                        recommendations alone drove a 40% increase in sales within the first quarter. 
                                        Our customers love the personalized experience, and we've seen incredible growth 
                                        in repeat purchases. This was a game-changer for our business."
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="author-avatar">PS</div>
                                    <div class="author-info">
                                        <h4>Priya Sharma</h4>
                                        <p>Founder & CEO, ShopEase India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="case-study-sidebar">
                        <div class="sidebar-card">
                            <h4>Technologies Used</h4>
                            <div class="tech-list">
                                <span class="tech-item">React.js</span>
                                <span class="tech-item">Next.js</span>
                                <span class="tech-item">Node.js</span>
                                <span class="tech-item">TensorFlow</span>
                                <span class="tech-item">Elasticsearch</span>
                                <span class="tech-item">Redis</span>
                                <span class="tech-item">MongoDB</span>
                                <span class="tech-item">AWS</span>
                            </div>
                        </div>

                        <div class="sidebar-card">
                            <h4>Project Timeline</h4>
                            <div class="timeline-list">
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Requirements & Design</strong>
                                        <span>Month 1</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Core Platform Development</strong>
                                        <span>Month 2-3</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>AI Engine Development</strong>
                                        <span>Month 3-4</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Integration & Testing</strong>
                                        <span>Month 5</span>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <strong>Launch & Optimization</strong>
                                        <span>Month 6</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-card" style="background: var(--gradient-primary); border: none;">
                            <h4 style="color: white; border-color: rgba(255,255,255,0.2);">Start Your Project</h4>
                            <p style="color: rgba(255,255,255,0.8); font-size: 0.875rem; margin-bottom: 1rem;">
                                Ready to boost your e-commerce sales with AI?
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
                        <div class="story-image healthcare-bg">
                            <div class="story-overlay"><span class="story-category">Healthcare</span></div>
                            <div class="story-icon"><i class="fa-solid fa-hospital"></i></div>
                        </div>
                        <div class="story-content">
                            <h3 class="story-title">AI-Powered Healthcare Platform</h3>
                            <p class="story-excerpt">95% accuracy in disease detection.</p>
                            <a href="{{ route('case-study.healthcare') }}" class="story-link">Read Case Study →</a>
                        </div>
                    </article>

                    <article class="story-card">
                        <div class="story-image crm-bg">
                            <div class="story-overlay"><span class="story-category">CRM</span></div>
                            <div class="story-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        </div>
                        <div class="story-content">
                            <h3 class="story-title">Intelligent CRM System</h3>
                            <p class="story-excerpt">60% improvement in lead conversion.</p>
                            <a href="{{ route('case-study.crm') }}" class="story-link">Read Case Study →</a>
                        </div>
                    </article>

                    <article class="story-card">
                        <div class="story-image hrms-bg">
                            <div class="story-overlay"><span class="story-category">HRMS</span></div>
                            <div class="story-icon"><i class="fa-solid fa-users"></i></div>
                        </div>
                        <div class="story-content">
                            <h3 class="story-title">Enterprise HRMS Solution</h3>
                            <p class="story-excerpt">70% faster hiring process.</p>
                            <a href="{{ route('case-study.hrms') }}" class="story-link">Read Case Study →</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="cta-container">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Transform Your E-commerce?</h2>
                    <p class="cta-description">Let's discuss how AI can boost your online sales.</p>
                    <div class="cta-buttons">
                        <a href="{{ url('/#contact') }}" class="btn btn-white btn-lg">Start Your Project</a>
                        <a href="{{ route('success-stories') }}" class="btn btn-outline-white btn-lg">View All Case Studies</a>
                    </div>
                </div>
            </div>
            <div class="cta-bg"><div class="cta-shape cta-shape-1"></div><div class="cta-shape cta-shape-2"></div></div>
        </section>
    </main>

    @include('sections.footer')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
</body>
</html>
