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
            <li><a href="{{ route('products') }}" class="nav-link">Products</a></li>
            <li><a href="{{ route('success-stories') }}" class="nav-link">Success Stories</a></li>
            <li><a href="{{ url('/') }}#contact" class="nav-link">Contact</a></li>
            <li><a href="{{ route('profile') }}" class="nav-link">Profile</a></li>
        </ul>
        
        <a href="#contact" class="btn btn-primary nav-cta" onclick="scrollToContact(event)">Get Started</a>
        
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>
</header>

<script>
function scrollToContact(e) {
    var contactSection = document.getElementById('contact');
    if (contactSection) {
        e.preventDefault();
        contactSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else {
        // If not on home page, redirect to home page with #contact
        window.location.href = '{{ url("/") }}#contact';
    }
}
</script>
