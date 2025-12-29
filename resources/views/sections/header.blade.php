<!-- Header -->
<header id="header">
    <nav class="nav-container">
        <a href="{{ url('/') }}" class="logo" aria-label="KA Software - Home">
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
            <li><a href="{{ url('/') }}#services" class="nav-link">Services</a></li>
            <li><a href="{{ route('success-stories') }}" class="nav-link">Success Stories</a></li>
            <li><a href="{{ url('/') }}#portfolio" class="nav-link">Portfolio</a></li>
            <li><a href="{{ url('/') }}#contact" class="nav-link">Contact</a></li>
            <li><a href="{{ route('profile') }}" class="nav-link">Profile</a></li>
        </ul>
        
        <a href="{{ url('/') }}#contact" class="btn btn-primary nav-cta">Get Started</a>
        
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>
</header>
