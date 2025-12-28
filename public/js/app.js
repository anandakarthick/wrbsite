/**
 * KA Software - Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initHeader();
    initMobileMenu();
    initSmoothScroll();
    initAnimations();
    initStatsCounter();
    initContactForm();
});

/**
 * Header scroll effect
 */
function initHeader() {
    const header = document.getElementById('header');
    
    function updateHeader() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', updateHeader);
    updateHeader();
}

/**
 * Mobile menu toggle
 */
function initMobileMenu() {
    const menuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');
    
    if (!menuBtn || !navLinks) return;
    
    menuBtn.addEventListener('click', function() {
        menuBtn.classList.toggle('active');
        navLinks.classList.toggle('active');
        document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
    });
    
    // Close menu when clicking on a link
    navLinks.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            menuBtn.classList.remove('active');
            navLinks.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!menuBtn.contains(e.target) && !navLinks.contains(e.target)) {
            menuBtn.classList.remove('active');
            navLinks.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
}

/**
 * Smooth scroll for anchor links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Update active nav link on scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    
    function updateActiveLink() {
        const scrollY = window.scrollY;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }
    
    window.addEventListener('scroll', updateActiveLink);
}

/**
 * Scroll animations (AOS-like)
 */
function initAnimations() {
    const animatedElements = document.querySelectorAll('[data-aos]');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.getAttribute('data-aos-delay') || 0;
                setTimeout(() => {
                    entry.target.classList.add('aos-animate');
                }, parseInt(delay));
            }
        });
    }, observerOptions);
    
    animatedElements.forEach(el => observer.observe(el));
}

/**
 * Stats counter animation
 */
function initStatsCounter() {
    const stats = document.querySelectorAll('.stat-number[data-target]');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const targetValue = parseInt(target.getAttribute('data-target'));
                animateCounter(target, targetValue);
                observer.unobserve(target);
            }
        });
    }, observerOptions);
    
    stats.forEach(stat => observer.observe(stat));
}

/**
 * Animate counter from 0 to target
 */
function animateCounter(element, target) {
    const duration = 2000;
    const increment = target / (duration / 16);
    let current = 0;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

/**
 * Contact form handling
 */
function initContactForm() {
    const form = document.getElementById('contactForm');
    
    if (!form) return;
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                <path d="M12 2a10 10 0 0 1 10 10" stroke-opacity="1"></path>
            </svg>
            <span>Sending...</span>
        `;
        
        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
            
            const data = await response.json();
            
            if (response.ok && data.success) {
                // Show success modal
                showSuccessModal();
                form.reset();
            } else {
                throw new Error(data.message || 'Something went wrong');
            }
        } catch (error) {
            showNotification('error', error.message || 'Failed to send message. Please try again or call us directly at +91 8056653499');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });
}

/**
 * Show success modal after form submission
 */
function showSuccessModal() {
    // Remove existing modal
    const existing = document.querySelector('.success-modal-overlay');
    if (existing) existing.remove();
    
    const modal = document.createElement('div');
    modal.className = 'success-modal-overlay';
    modal.innerHTML = `
        <div class="success-modal">
            <div class="success-modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <h2 class="success-modal-title">Thank You!</h2>
            <p class="success-modal-message">
                Your inquiry has been received successfully.
            </p>
            <div class="success-modal-info">
                <div class="info-icon">📞</div>
                <p><strong>Our sales team will contact you shortly!</strong></p>
                <p>Expect a call or email within 24 hours (typically much sooner during business hours).</p>
            </div>
            <div class="success-modal-details">
                <p>📧 A confirmation email has been sent to your inbox.</p>
                <p>🕐 Business Hours: Mon-Fri, 9:00 AM - 6:00 PM IST</p>
            </div>
            <button class="success-modal-btn" onclick="closeSuccessModal()">
                Got it, Thanks!
            </button>
        </div>
    `;
    
    // Add styles
    if (!document.querySelector('#success-modal-styles')) {
        const styles = document.createElement('style');
        styles.id = 'success-modal-styles';
        styles.textContent = `
            .success-modal-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(5px);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10001;
                animation: fadeIn 0.3s ease;
                padding: 1rem;
            }
            .success-modal {
                background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
                border: 1px solid rgba(99, 102, 241, 0.3);
                border-radius: 20px;
                padding: 2.5rem;
                max-width: 450px;
                width: 100%;
                text-align: center;
                animation: scaleIn 0.3s ease;
            }
            .success-modal-icon {
                width: 100px;
                height: 100px;
                background: rgba(16, 185, 129, 0.1);
                border: 2px solid rgba(16, 185, 129, 0.3);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: #10b981;
            }
            .success-modal-title {
                font-size: 1.75rem;
                color: white;
                margin-bottom: 0.5rem;
            }
            .success-modal-message {
                color: #9ca3af;
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }
            .success-modal-info {
                background: rgba(99, 102, 241, 0.1);
                border: 1px solid rgba(99, 102, 241, 0.2);
                border-radius: 12px;
                padding: 1.25rem;
                margin-bottom: 1.5rem;
            }
            .success-modal-info .info-icon {
                font-size: 2rem;
                margin-bottom: 0.5rem;
            }
            .success-modal-info p {
                color: #e5e7eb;
                margin: 0.25rem 0;
                font-size: 0.9375rem;
            }
            .success-modal-info p strong {
                color: #8b5cf6;
                font-size: 1.125rem;
            }
            .success-modal-details {
                margin-bottom: 1.5rem;
            }
            .success-modal-details p {
                color: #6b7280;
                font-size: 0.875rem;
                margin: 0.5rem 0;
            }
            .success-modal-btn {
                background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
                color: white;
                border: none;
                padding: 1rem 2rem;
                border-radius: 10px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                width: 100%;
            }
            .success-modal-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
            }
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            @keyframes scaleIn {
                from { transform: scale(0.9); opacity: 0; }
                to { transform: scale(1); opacity: 1; }
            }
            @keyframes fadeOut {
                from { opacity: 1; }
                to { opacity: 0; }
            }
        `;
        document.head.appendChild(styles);
    }
    
    document.body.appendChild(modal);
    document.body.style.overflow = 'hidden';
    
    // Close on overlay click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeSuccessModal();
        }
    });
}

/**
 * Close success modal
 */
function closeSuccessModal() {
    const modal = document.querySelector('.success-modal-overlay');
    if (modal) {
        modal.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            modal.remove();
            document.body.style.overflow = '';
        }, 300);
    }
}

/**
 * Show notification toast
 */
function showNotification(type, message) {
    // Remove existing notification
    const existing = document.querySelector('.notification-toast');
    if (existing) existing.remove();
    
    const notification = document.createElement('div');
    notification.className = `notification-toast notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-icon">
                ${type === 'success' 
                    ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>'
                    : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>'
                }
            </span>
            <span class="notification-message">${message}</span>
        </div>
        <button class="notification-close">&times;</button>
    `;
    
    // Add styles if not exists
    if (!document.querySelector('#notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'notification-styles';
        styles.textContent = `
            .notification-toast {
                position: fixed;
                top: 100px;
                right: 20px;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                display: flex;
                align-items: center;
                gap: 1rem;
                z-index: 10000;
                animation: slideIn 0.3s ease;
                max-width: 400px;
                background: #1f2937;
            }
            .notification-success {
                background: rgba(16, 185, 129, 0.1);
                border: 1px solid rgba(16, 185, 129, 0.3);
                color: #10b981;
            }
            .notification-error {
                background: rgba(239, 68, 68, 0.1);
                border: 1px solid rgba(239, 68, 68, 0.3);
                color: #ef4444;
            }
            .notification-content {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }
            .notification-message {
                font-size: 0.9375rem;
            }
            .notification-close {
                background: none;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
                color: inherit;
                opacity: 0.7;
                padding: 0;
                line-height: 1;
            }
            .notification-close:hover {
                opacity: 1;
            }
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
            .animate-spin {
                animation: spin 1s linear infinite;
            }
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(styles);
    }
    
    document.body.appendChild(notification);
    
    // Close button
    notification.querySelector('.notification-close').addEventListener('click', () => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
}

/**
 * Parallax effect for hero section
 */
window.addEventListener('scroll', function() {
    const hero = document.querySelector('.hero');
    if (!hero) return;
    
    const scrolled = window.scrollY;
    const heroHeight = hero.offsetHeight;
    
    if (scrolled < heroHeight) {
        const glows = hero.querySelectorAll('.hero-glow');
        glows.forEach((glow, index) => {
            const speed = (index + 1) * 0.1;
            glow.style.transform = `translateY(${scrolled * speed}px)`;
        });
    }
});
