<!-- Contact Section -->
<section id="contact" class="contact">
    <div class="section-container">
        <div class="contact-grid">
            <!-- Contact Info -->
            <div class="contact-info" data-aos="fade-right">
                <span class="section-badge">Get In Touch</span>
                <h2 class="section-title">Let's Build Something Amazing Together</h2>
                <p class="section-description">
                    Ready to transform your business with AI-powered software solutions? 
                    Get in touch with our expert team today.
                </p>
                
                <div class="contact-items">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="contact-details">
                            <h4>Email Us</h4>
                            <p>info@kasoftware.in</p>
                            <p>helpdesk@kasoftware.in</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="contact-details">
                            <h4>Call Us</h4>
                            <p>+91 8056653499</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="contact-details">
                            <h4>Visit Us</h4>
                            <p>18/15, Subramaniam Street, Rajaji Nagar</p>
                            <p>Villivakkam Road, Anna Nagar, Chennai - 600049</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form-wrapper" data-aos="fade-left">
                @php
                    $recaptchaSiteKey = config('services.recaptcha.site_key');
                    $recaptchaType = config('services.recaptcha.type', 'v3');
                    session(['contact_form_time' => now()->timestamp]);
                    if (!$recaptchaSiteKey) {
                        $captchaA = random_int(2, 9);
                        $captchaB = random_int(1, 9);
                        session(['captcha_answer' => $captchaA + $captchaB]);
                    }
                @endphp
                <form class="contact-form" id="contactForm" action="{{ route('contact.submit') }}" method="POST"
                      @if($recaptchaSiteKey) data-recaptcha-key="{{ $recaptchaSiteKey }}" data-recaptcha-type="{{ $recaptchaType }}" @endif>
                    @csrf
                    <h3 class="form-title">Start Your Project</h3>

                    {{-- Honeypot: hidden from humans, bots tend to fill it --}}
                    <div class="hp-field" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="Your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="your.email@company.com" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" id="company" name="company" placeholder="Your company name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="+91 XXXXX XXXXX">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="service">Service Needed</label>
                            <select id="service" name="service" required>
                                <option value="">Select a service</option>
                                <option value="mobile-app">Mobile App Development</option>
                                <option value="web-app">Web Application</option>
                                <option value="ecommerce">E-commerce Platform</option>
                                <option value="hrms">HRMS Solution</option>
                                <option value="crm">CRM System</option>
                                <option value="ai-ml">AI/ML Solution</option>
                                <option value="custom">Custom Development</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="budget">Project Budget</label>
                            <select id="budget" name="budget">
                                <option value="">Select budget range</option>
                                <option value="10k-25k">$10k - $25k</option>
                                <option value="25k-50k">$25k - $50k</option>
                                <option value="50k-100k">$50k - $100k</option>
                                <option value="100k+">$100k+</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Project Description</label>
                        <textarea id="message" name="message" rows="4" placeholder="Tell us about your project requirements, goals, and any specific features you need..." required></textarea>
                    </div>

                    @if($recaptchaSiteKey && $recaptchaType === 'v2')
                        <div class="form-group recaptcha-group">
                            <div class="g-recaptcha" data-sitekey="{{ $recaptchaSiteKey }}"></div>
                        </div>
                    @elseif($recaptchaSiteKey)
                        <p class="recaptcha-note">
                            <i class="fa-solid fa-shield-halved"></i>
                            Protected by reCAPTCHA &middot;
                            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Privacy</a> &middot;
                            <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Terms</a>
                        </p>
                    @else
                        <div class="form-group captcha-group">
                            <label for="captcha">
                                <i class="fa-solid fa-shield-halved"></i>
                                Security Check: What is {{ $captchaA }} + {{ $captchaB }}?
                            </label>
                            <input type="number" id="captcha" name="captcha" placeholder="Enter your answer" required autocomplete="off" inputmode="numeric">
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <span>Send Message</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@if(config('services.recaptcha.site_key'))
    @if(config('services.recaptcha.type', 'v3') === 'v2')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @else
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script>
    @endif
@endif
