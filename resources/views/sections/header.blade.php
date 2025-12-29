<!-- Header -->
<header id="header">
    <nav class="nav-container">
        <a href="{{ url('/') }}" class="logo" aria-label="KA Software - Home">
            <span class="logo-icon">
                <img src="{{ asset('images/logo.png') }}" alt="KA Software Logo" width="40" height="40" style="object-fit: contain;">
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
