/**
 * KA Software - Main JavaScript
 * Theme: Orange & Red
 */

document.addEventListener('DOMContentLoaded', function() {
    initHeader();
    initMobileMenu();
    initSmoothScroll();
    initNavHighlight();
    initAutoReveal();
    initAnimations();
    initStatsCounter();
    initContactForm();
    initScrollProgress();
    initBackToTop();
    initTilt();
    initInsightsSlider();
    initHeroSlideshow();
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
    
}

/**
 * Nav link highlighting - works with full URLs (e.g. "/#services")
 * and marks the current page's link active on sub-pages too.
 */
function initNavHighlight() {
    var navLinks = Array.prototype.slice.call(document.querySelectorAll('.nav-link'));
    if (!navLinks.length) return;

    function normalize(path) {
        path = path.replace(/\/+$/, '');
        return path === '' ? '/' : path;
    }

    var currentPath = normalize(window.location.pathname);

    function linkInfo(link) {
        var url = new URL(link.getAttribute('href'), window.location.href);
        return { path: normalize(url.pathname), hash: url.hash };
    }

    // Smooth-scroll nav links that point to a section on the current page
    navLinks.forEach(function(link) {
        var li = linkInfo(link);
        if (li.path === currentPath && li.hash) {
            link.addEventListener('click', function(e) {
                var target = document.querySelector(li.hash);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    history.replaceState(null, '', li.hash);
                }
            });
        }
    });

    // Map section ids to their nav links (scroll-spy candidates)
    var sectionLinks = {};
    navLinks.forEach(function(link) {
        var li = linkInfo(link);
        if (li.path === currentPath && li.hash) {
            sectionLinks[li.hash.slice(1)] = link;
        }
    });

    var sections = Array.prototype.slice.call(document.querySelectorAll('section[id]'));

    function update() {
        var pos = window.scrollY + 130;
        var active = null;

        // Last section above the scroll position that has a nav link
        sections.forEach(function(section) {
            if (section.offsetTop <= pos && sectionLinks[section.id]) {
                active = sectionLinks[section.id];
            }
        });

        // Fallback: hash-less link matching the current path (e.g. Home, Profile)
        if (!active) {
            navLinks.forEach(function(link) {
                var li = linkInfo(link);
                if (!active && !li.hash && li.path === currentPath) active = link;
            });
        }

        // Fallback: parent path match (e.g. /success-stories/xyz -> Success Stories)
        if (!active) {
            navLinks.forEach(function(link) {
                var li = linkInfo(link);
                if (!active && li.path !== '/' && currentPath.indexOf(li.path + '/') === 0) active = link;
            });
        }

        navLinks.forEach(function(link) {
            link.classList.toggle('active', link === active);
        });
    }

    window.addEventListener('scroll', update, { passive: true });
    update();
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
    
    function hasRecaptcha() {
        return window.grecaptcha && form.querySelector('.g-recaptcha');
    }

    function resetRecaptcha() {
        if (hasRecaptcha()) {
            try { grecaptcha.reset(); } catch (err) { /* widget not rendered yet */ }
        }
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        var submitBtn = form.querySelector('button[type="submit"]');
        var originalHTML = submitBtn.innerHTML;
        var recaptchaKey = form.getAttribute('data-recaptcha-key');
        var recaptchaType = form.getAttribute('data-recaptcha-type');

        // v2 checkbox: must be ticked before sending
        if (recaptchaType === 'v2' && hasRecaptcha() && !grecaptcha.getResponse()) {
            showFeedbackModal(false, 'One more step',
                'Please tick the "I\'m not a robot" checkbox before sending.');
            return;
        }

        // Show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Sending...';

        var formData = new FormData(form);

        // v3 (invisible): fetch a fresh token from Google, then send
        if (recaptchaKey && recaptchaType !== 'v2' && window.grecaptcha) {
            grecaptcha.ready(function() {
                grecaptcha.execute(recaptchaKey, { action: 'contact' }).then(function(token) {
                    formData.set('g-recaptcha-response', token);
                    sendForm();
                }).catch(function() {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalHTML;
                    showFeedbackModal(false, 'Verification failed',
                        'Could not run the security check. Please reload the page and try again.');
                });
            });
        } else {
            sendForm();
        }

        function sendForm() {
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            if (response.status === 429) {
                var err = new Error('rate-limited');
                err.rateLimited = true;
                throw err;
            }
            return response.json();
        })
        .then(function(data) {
            // Reset button
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
            
            resetRecaptcha();

            if (data.success) {
                // Reset form
                form.reset();

                showFeedbackModal(true, 'Thank You!',
                    'Your inquiry has been received successfully. Our sales team will contact you within 24 hours. A confirmation email has been sent to your inbox.');
            } else {
                showFeedbackModal(false, 'Something went wrong',
                    data.message || 'Something went wrong. Please try again.');
            }
        })
        .catch(function(error) {
            // Reset button
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
            resetRecaptcha();

            if (error && error.rateLimited) {
                showFeedbackModal(false, 'Too many attempts',
                    'You are sending messages too quickly. Please wait a minute and try again.');
            } else {
                showFeedbackModal(false, 'Message not sent',
                    'Failed to send message. Please try again or call us directly at +91 8056653499.');
            }
            console.error('Error:', error);
        });
        }
    });
}

/**
 * Styled feedback modal (replaces browser alert)
 */
function showFeedbackModal(success, title, message) {
    var existing = document.querySelector('.success-modal');
    if (existing) existing.remove();

    var modal = document.createElement('div');
    modal.className = 'success-modal';
    modal.innerHTML =
        '<div class="success-modal-content">' +
            '<div class="success-icon' + (success ? '' : ' error') + '">' +
                '<i class="fa-solid ' + (success ? 'fa-check' : 'fa-xmark') + '"></i>' +
            '</div>' +
            '<h3>' + title + '</h3>' +
            '<p></p>' +
            '<button type="button" class="btn btn-primary modal-close-btn">Close</button>' +
        '</div>';
    modal.querySelector('p').textContent = message;
    document.body.appendChild(modal);

    function close() {
        modal.classList.remove('active');
        setTimeout(function() { modal.remove(); }, 300);
    }

    modal.querySelector('.modal-close-btn').addEventListener('click', close);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) close();
    });

    requestAnimationFrame(function() { modal.classList.add('active'); });
}

/**
 * Auto-apply scroll reveal animations to cards and sections
 * on pages that don't declare data-aos attributes themselves.
 */
function initAutoReveal() {
    var selectors = [
        '.about-card', '.info-card', '.service-detail-card', '.tech-category',
        '.why-us-card', '.contact-detail-item', '.story-card', '.industry-card',
        '.testimonial-card', '.result-card', '.sidebar-card', '.content-section',
        '.section-header', '.gallery-item'
    ];

    selectors.forEach(function(selector) {
        var items = document.querySelectorAll(selector);
        items.forEach(function(el, index) {
            if (el.hasAttribute('data-aos')) return;
            el.setAttribute('data-aos', 'fade-up');
            el.setAttribute('data-aos-delay', String((index % 6) * 90));
        });
    });
}

/**
 * Scroll progress bar (top of viewport)
 */
function initScrollProgress() {
    var bar = document.createElement('div');
    bar.className = 'scroll-progress';
    document.body.appendChild(bar);

    function update() {
        var doc = document.documentElement;
        var max = doc.scrollHeight - doc.clientHeight;
        bar.style.width = (max > 0 ? (doc.scrollTop / max) * 100 : 0) + '%';
    }

    window.addEventListener('scroll', update, { passive: true });
    update();
}

/**
 * Back-to-top floating button
 */
function initBackToTop() {
    var btn = document.createElement('button');
    btn.className = 'back-to-top';
    btn.setAttribute('aria-label', 'Back to top');
    btn.innerHTML = '<i class="fa-solid fa-arrow-up"></i>';
    document.body.appendChild(btn);

    btn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    window.addEventListener('scroll', function() {
        btn.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });
}

/**
 * Subtle 3D tilt on cards (pointer devices only)
 */
function initTilt() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (window.matchMedia('(hover: none)').matches) return;

    var cards = document.querySelectorAll(
        '.service-card, .portfolio-card, .ai-card, .story-card, ' +
        '.info-card, .why-us-card, .testimonial-card, .about-card'
    );

    cards.forEach(function(card) {
        card.addEventListener('mousemove', function(e) {
            var rect = card.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width - 0.5;
            var y = (e.clientY - rect.top) / rect.height - 0.5;
            card.style.transform =
                'perspective(900px) rotateX(' + (-y * 5).toFixed(2) + 'deg)' +
                ' rotateY(' + (x * 5).toFixed(2) + 'deg) translateY(-6px)';
        });
        card.addEventListener('mouseleave', function() {
            card.style.transform = '';
        });
    });
}

/**
 * Tech Insights slider - autoplay, arrows, dots, swipe
 */
function initInsightsSlider() {
    var slider = document.getElementById('insightsSlider');
    if (!slider) return;

    var slides = slider.querySelectorAll('.insight-slide');
    var dots = slider.querySelectorAll('.insight-dot');
    if (slides.length < 2) return;

    var current = 0;
    var timer = null;
    var INTERVAL = 6000;

    function goTo(index) {
        current = (index + slides.length) % slides.length;
        slides.forEach(function (slide, i) { slide.classList.toggle('active', i === current); });
        dots.forEach(function (dot, i) { dot.classList.toggle('active', i === current); });
    }

    function play() { stop(); timer = setInterval(function () { goTo(current + 1); }, INTERVAL); }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }

    slider.querySelector('.insight-arrow.next').addEventListener('click', function () { goTo(current + 1); play(); });
    slider.querySelector('.insight-arrow.prev').addEventListener('click', function () { goTo(current - 1); play(); });
    dots.forEach(function (dot, i) {
        dot.addEventListener('click', function () { goTo(i); play(); });
    });

    slider.addEventListener('mouseenter', stop);
    slider.addEventListener('mouseleave', play);

    // Touch swipe
    var startX = null;
    slider.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; stop(); }, { passive: true });
    slider.addEventListener('touchend', function (e) {
        if (startX === null) return;
        var dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 50) { goTo(current + (dx < 0 ? 1 : -1)); }
        startX = null;
        play();
    }, { passive: true });

    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        play();
    }
}

/**
 * Hero background slideshow - slow crossfade rotation
 */
function initHeroSlideshow() {
    var box = document.getElementById('heroSlideshow');
    if (!box) return;
    var slides = box.querySelectorAll('.hero-slide');
    if (slides.length < 2) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var current = 0;
    setInterval(function () {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
    }, 5500);
}
