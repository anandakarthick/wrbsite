<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'KA Software - AI-Powered Software Development')</title>
    <meta name="description" content="Transform your business with KA Software AI-powered software development. We build Android apps, iOS apps, web applications, e-commerce platforms, HRMS, CRM systems with cutting-edge AI integration.">
    <meta name="keywords" content="KA Software, AI software development, mobile app development, Android app development, iOS app development, web application development, e-commerce development, HRMS software, CRM systems, artificial intelligence, machine learning, custom software, digital transformation">
    <meta name="author" content="KA Software">
    
    <!-- Open Graph -->
    <meta property="og:title" content="KA Software - AI-Powered Software Development">
    <meta property="og:description" content="Transform your business with cutting-edge AI-powered software solutions. Scalable, secure, and innovative IT services.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="KA Software - AI-Powered Software Development">
    <meta name="twitter:description" content="Transform your business with cutting-edge AI-powered software solutions.">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "KA Software",
        "description": "AI-powered software development company specializing in mobile apps, web applications, and enterprise solutions",
        "url": "{{ url('/') }}",
        "foundingDate": "2024",
        "industry": "Software Development",
        "services": ["Mobile App Development", "Web Application Development", "AI Solutions", "E-commerce Development", "HRMS", "CRM Systems", "Digital Transformation"],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "18/15, Subramaniam Street, Rajaji Nagar",
            "addressLocality": "Chennai",
            "postalCode": "600049",
            "addressCountry": "IN"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-8056653499",
            "contactType": "customer service"
        }
    }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    @stack('styles')
</head>
<body>
    <!-- Header -->
    @include('sections.header')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('sections.footer')
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
