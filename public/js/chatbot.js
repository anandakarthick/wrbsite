/**
 * KA Software - Site Chatbot Widget
 * Rule-based assistant. Unmatched questions fall back to contact-support links.
 */
(function () {
    'use strict';

    var CONTACT = {
        phone: '+918056653499',
        phoneDisplay: '+91 80566 53499',
        email: 'info@kasoftware.in',
        whatsapp: 'https://wa.me/918056653499',
        contactUrl: '/#contact'
    };

    var CONTACT_LINKS =
        '<div class="kabot-actions">' +
        '<a href="' + CONTACT.contactUrl + '"><i class="fa-solid fa-envelope-open-text"></i> Contact Form</a>' +
        '<a href="tel:' + CONTACT.phone + '"><i class="fa-solid fa-phone"></i> Call Us</a>' +
        '<a href="' + CONTACT.whatsapp + '" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>' +
        '<a href="mailto:' + CONTACT.email + '"><i class="fa-solid fa-at"></i> Email</a>' +
        '</div>';

    // ---- Knowledge base: keywords -> answer (HTML allowed in answers) ----
    var INTENTS = [
        {
            keywords: ['hi', 'hello', 'hey', 'vanakkam', 'good morning', 'good afternoon', 'good evening', 'namaste'],
            exact: true,
            answer: 'Hello! 👋 I\'m the KA Software assistant. Ask me about our <b>services</b>, <b>products</b>, <b>pricing</b>, or how to <b>contact us</b>.'
        },
        {
            keywords: ['service', 'services', 'what do you do', 'offerings', 'what can you build', 'development services'],
            answer: 'We offer 6 core services:<br>• <a href="/services/mobile-app-development">Mobile App Development</a><br>• <a href="/services/web-applications">Web Applications</a><br>• <a href="/services/ecommerce-platforms">E-commerce Platforms</a><br>• <a href="/services/hrms-solutions">HRMS Solutions</a><br>• <a href="/services/crm-systems">CRM Systems</a><br>• <a href="/services/ai-ml-solutions">AI/ML Solutions</a>'
        },
        {
            keywords: ['mobile', 'android', 'ios', 'flutter', 'react native', 'app development', 'mobile app'],
            answer: 'We build native Android & iOS apps with Flutter, React Native, Swift and Kotlin — with AI features built in. Typical launch is 6–10 weeks. See <a href="/services/mobile-app-development">Mobile App Development</a> for details, process and FAQ.'
        },
        {
            keywords: ['website', 'web app', 'web application', 'portal', 'saas', 'web development', 'laravel', 'react'],
            answer: 'We build scalable web applications, portals and SaaS platforms with Laravel, Node.js, React and Vue — including dashboards, workflow automation and AI integration. Details: <a href="/services/web-applications">Web Applications</a>.'
        },
        {
            keywords: ['ecommerce', 'e-commerce', 'online store', 'shop', 'sell online', 'shopify', 'woocommerce', 'marketplace'],
            answer: 'We build online stores with UPI payments, GST invoicing, courier integration and AI recommendations. Check the <a href="/services/ecommerce-platforms">E-commerce service</a>, or our ready products <a href="/products/shopnest">ShopNest</a> and <a href="/products/kartpos">KartPOS</a>.'
        },
        {
            keywords: ['hrms', 'hr software', 'payroll', 'attendance', 'leave management', 'employee management'],
            answer: 'Our HRMS covers attendance (geo-fenced mobile + biometric), payroll with PF/ESI/TDS compliance, and AI recruitment. See the <a href="/services/hrms-solutions">HRMS service</a> or our <a href="/products/peoplecore">PeopleCore</a> product.'
        },
        {
            keywords: ['crm', 'lead', 'leads', 'sales pipeline', 'sales software', 'follow up'],
            answer: 'Our CRM captures every lead from website, ads and WhatsApp, scores them with AI, and automates follow-ups. See the <a href="/services/crm-systems">CRM service</a> or the <a href="/products/ka-crm">KA CRM</a> product.'
        },
        {
            keywords: ['ai', 'artificial intelligence', 'machine learning', 'ml', 'computer vision', 'nlp', 'automation', 'chatgpt', 'llm', 'agent'],
            answer: 'AI is our specialty! We build custom AI: computer vision, document AI, voice agents, chatbots and predictive models. Explore <a href="/services/ai-ml-solutions">AI/ML Solutions</a> or products like <a href="/products/convodesk">ConvoDesk</a>, <a href="/products/visionkit">VisionKit</a> and <a href="/products/agentforge">AgentForge</a>.'
        },
        {
            keywords: ['product', 'products', 'vaha', 'shopnest', 'kartpos', 'pipeforge', 'convodesk', 'documind', 'voxa', 'insightiq', 'agentforge', 'peoplecore'],
            answer: 'We have 12 products of our own — including <a href="/products/vahaai">VAHA AI</a> (AI tutor), <a href="/products/ka-crm">KA CRM</a>, <a href="/products/shopnest">ShopNest</a> (e-commerce), <a href="/products/pipeforge">PipeForge</a> (CI/CD) and more. Browse them all on the <a href="/products">Products page</a>.'
        },
        {
            keywords: ['price', 'pricing', 'cost', 'how much', 'quote', 'budget', 'charges', 'rate', 'fees'],
            answer: 'Pricing depends on scope — every quote is <b>fixed-price with a written scope</b>, no hourly surprises. A focused MVP starts small; complex platforms are phased. Tell us your idea via the <a href="/#contact">contact form</a> and you\'ll get a quote within 48 hours.'
        },
        {
            keywords: ['contact', 'phone', 'call', 'email', 'reach', 'talk', 'get in touch', 'number'],
            answer: 'You can reach us anytime:<br>📞 <a href="tel:' + CONTACT.phone + '">' + CONTACT.phoneDisplay + '</a><br>📧 <a href="mailto:' + CONTACT.email + '">' + CONTACT.email + '</a><br>Or use the <a href="/#contact">contact form</a> — we reply within 24 hours.'
        },
        {
            keywords: ['address', 'location', 'where', 'office', 'chennai', 'located', 'visit'],
            answer: 'Our office:<br>📍 18/15, Subramaniam Street, Rajaji Nagar, Villivakkam Road, Anna Nagar, <b>Chennai - 600049</b>, Tamil Nadu, India.<br>Mon–Fri, 9 AM to 6 PM. Full details on the <a href="/profile">company profile</a>.'
        },
        {
            keywords: ['how long', 'timeline', 'duration', 'delivery time', 'when can', 'turnaround', 'weeks', 'months'],
            answer: 'Typical timelines: mobile apps <b>6–10 weeks</b>, web platforms <b>8–14 weeks</b>, e-commerce stores <b>3–6 weeks</b>, AI pilots <b>4–6 weeks</b>. You see a working prototype in the first two weeks and weekly demo builds after that.'
        },
        {
            keywords: ['job', 'career', 'hiring', 'vacancy', 'internship', 'work with you', 'join'],
            answer: 'We\'re always happy to hear from good engineers and designers! Send your resume to <a href="mailto:' + CONTACT.email + '?subject=Career%20Enquiry">' + CONTACT.email + '</a> with the subject "Career Enquiry".'
        },
        {
            keywords: ['support', 'issue', 'problem', 'bug', 'not working', 'error', 'complaint', 'help me'],
            answer: 'Sorry you\'re facing an issue! Our support team will help you quickly:' + CONTACT_LINKS
        },
        {
            keywords: ['about', 'company', 'who are you', 'team', 'kasoftware', 'ka software', 'profile'],
            answer: 'KA Software is an AI-powered software development company in Chennai — 500+ projects delivered, 98% client satisfaction, 25+ experts. Read our story on the <a href="/profile">company profile</a> page.'
        },
        {
            keywords: ['demo', 'meeting', 'consultation', 'schedule', 'appointment', 'discuss'],
            answer: 'We\'d love to show you around! Request a free consultation via the <a href="/#contact">contact form</a> or call <a href="tel:' + CONTACT.phone + '">' + CONTACT.phoneDisplay + '</a> — we\'ll set up a demo within a couple of days.'
        },
        {
            keywords: ['success', 'case study', 'case studies', 'portfolio', 'past work', 'clients', 'projects done'],
            answer: 'We\'ve delivered 500+ projects across healthcare, e-commerce, fintech, manufacturing and more. See detailed case studies on our <a href="/success-stories">Success Stories</a> page.'
        },
        {
            keywords: ['thank', 'thanks', 'thankyou', 'nandri'],
            exact: false,
            answer: 'You\'re most welcome! 😊 Anything else I can help you with?'
        },
        {
            keywords: ['bye', 'goodbye', 'see you', 'exit'],
            exact: true,
            answer: 'Goodbye! 👋 Feel free to come back anytime — or reach us via the <a href="/#contact">contact form</a>.'
        }
    ];

    var FALLBACK =
        'Hmm, I\'m not sure about that one. 🤔 Our team can definitely help though — reach out and we\'ll reply within 24 hours:' + CONTACT_LINKS;

    var QUICK_REPLIES = ['Our Services', 'Our Products', 'Pricing', 'Contact Support'];

    // ---- Matching ----
    function matchIntent(text) {
        var query = ' ' + text.toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim() + ' ';
        var best = null;
        var bestScore = 0;

        INTENTS.forEach(function (intent) {
            var score = 0;
            intent.keywords.forEach(function (kw) {
                if (intent.exact) {
                    if (query.trim() === kw || query.indexOf(' ' + kw + ' ') !== -1) score += kw.length;
                } else if (query.indexOf(kw) !== -1) {
                    score += kw.length;
                }
            });
            if (score > bestScore) { bestScore = score; best = intent; }
        });

        return best ? best.answer : FALLBACK;
    }

    // ---- Widget UI ----
    function buildWidget() {
        var root = document.createElement('div');
        root.id = 'kabot';
        root.innerHTML =
            '<button type="button" class="kabot-toggle" aria-label="Chat with us">' +
                '<i class="fa-solid fa-comment-dots kabot-icon-open"></i>' +
                '<i class="fa-solid fa-xmark kabot-icon-close"></i>' +
                '<span class="kabot-pulse"></span>' +
            '</button>' +
            '<div class="kabot-panel" role="dialog" aria-label="KA Software chat assistant">' +
                '<div class="kabot-header">' +
                    '<div class="kabot-avatar"><i class="fa-solid fa-robot"></i></div>' +
                    '<div>' +
                        '<strong>KA Assistant</strong>' +
                        '<span class="kabot-status"><i class="fa-solid fa-circle"></i> Online</span>' +
                    '</div>' +
                '</div>' +
                '<div class="kabot-messages"></div>' +
                '<div class="kabot-quick"></div>' +
                '<form class="kabot-input">' +
                    '<input type="text" placeholder="Type your question..." maxlength="300" aria-label="Your message">' +
                    '<button type="submit" aria-label="Send"><i class="fa-solid fa-paper-plane"></i></button>' +
                '</form>' +
            '</div>';
        document.body.appendChild(root);
        return root;
    }

    function init() {
        var root = buildWidget();
        var toggle = root.querySelector('.kabot-toggle');
        var panel = root.querySelector('.kabot-panel');
        var messages = root.querySelector('.kabot-messages');
        var quick = root.querySelector('.kabot-quick');
        var form = root.querySelector('.kabot-input');
        var input = form.querySelector('input');
        var greeted = false;

        function scrollDown() { messages.scrollTop = messages.scrollHeight; }

        function addMessage(html, who) {
            var el = document.createElement('div');
            el.className = 'kabot-msg ' + who;
            if (who === 'user') { el.textContent = html; } else { el.innerHTML = html; }
            messages.appendChild(el);
            scrollDown();
        }

        function botReply(text) {
            var typing = document.createElement('div');
            typing.className = 'kabot-msg bot kabot-typing';
            typing.innerHTML = '<span></span><span></span><span></span>';
            messages.appendChild(typing);
            scrollDown();
            setTimeout(function () {
                typing.remove();
                addMessage(matchIntent(text), 'bot');
            }, 600 + Math.random() * 500);
        }

        function renderQuickReplies() {
            quick.innerHTML = '';
            QUICK_REPLIES.forEach(function (label) {
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = label;
                btn.addEventListener('click', function () {
                    addMessage(label, 'user');
                    botReply(label === 'Contact Support' ? 'support' : label);
                });
                quick.appendChild(btn);
            });
        }

        toggle.addEventListener('click', function () {
            var open = root.classList.toggle('open');
            if (open && !greeted) {
                greeted = true;
                setTimeout(function () {
                    addMessage('Hi there! 👋 I\'m the <b>KA Assistant</b>. Ask me anything about our services, products, or pricing — or tap a quick question below.', 'bot');
                    renderQuickReplies();
                }, 350);
            }
            if (open) { input.focus(); }
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var text = input.value.trim();
            if (!text) return;
            addMessage(text, 'user');
            input.value = '';
            botReply(text);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
