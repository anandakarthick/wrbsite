/**
 * KA Software - Main JavaScript
 * Theme: Orange & Red
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded');
    
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
    if (!header) return;
    
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
    
    navLinks.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            menuBtn.classList.remove('active');
            navLinks.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
    
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
 * Scroll animations
 */
function initAnimations() {
    const animatedElements = document.querySelectorAll('[data-aos]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.getAttribute('data-aos-delay') || 0;
                setTimeout(() => {
                    entry.target.classList.add('aos-animate');
                }, parseInt(delay));
            }
        });
    }, { threshold: 0.1 });
    
    animatedElements.forEach(el => observer.observe(el));
}

/**
 * Stats counter animation
 */
function initStatsCounter() {
    const stats = document.querySelectorAll('.stat-number[data-target]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const targetValue = parseInt(target.getAttribute('data-target'));
                animateCounter(target, targetValue);
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });
    
    stats.forEach(stat => observer.observe(stat));
}

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
    var form = document.getElementById('contactForm');
    
    if (!form) {
        console.log('No contact form found');
        return;
    }
    
    console.log('Contact form found');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        var submitBtn = form.querySelector('button[type="submit"]');
        var originalHTML = submitBtn.innerHTML;
        
        // Show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Sending...';
        
        var formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Reset button
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
            
            if (data.success) {
                // Reset form
                form.reset();
                
                // Show JavaScript alert
                alert('🎉 Thank You!\n\nYour inquiry has been received successfully.\n\nOur sales team will contact you within 24 hours.\n\nA confirmation email has been sent to your inbox.');
            } else {
                alert('Error: ' + (data.message || 'Something went wrong. Please try again.'));
            }
        })
        .catch(function(error) {
            // Reset button
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
            
            alert('Error: Failed to send message.\n\nPlease try again or call us directly at +91 8056653499');
            console.error('Error:', error);
        });
    });
}

/**
 * Parallax effect
 */
window.addEventListener('scroll', function() {
    var hero = document.querySelector('.hero');
    if (!hero) return;
    
    var scrolled = window.scrollY;
    var heroHeight = hero.offsetHeight;
    
    if (scrolled < heroHeight) {
        var glows = hero.querySelectorAll('.hero-glow');
        glows.forEach(function(glow, index) {
            var speed = (index + 1) * 0.1;
            glow.style.transform = 'translateY(' + (scrolled * speed) + 'px)';
        });
    }
});
