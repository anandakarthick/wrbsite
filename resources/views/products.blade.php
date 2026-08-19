<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Products - KA Software | VAHA AI, KA CRM, ShopNest, PipeForge & More</title>
    <meta name="description" content="Explore KA Software's product suite: VAHA AI tutor, KA CRM, ShopNest e-commerce, KartPOS billing, PipeForge CI/CD, PeopleCore HRMS, and InsightIQ analytics. AI-powered software products built in Chennai, India.">
    <meta name="keywords" content="KA Software products, VAHA AI tutor, KA CRM, ShopNest ecommerce platform, KartPOS billing software, PipeForge CICD, PeopleCore HRMS, InsightIQ analytics, software products india">
    <meta name="author" content="KA Software">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="canonical" href="https://kasoftware.in/products">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kasoftware.in/products">
    <meta property="og:title" content="Products - KA Software | AI-Powered Software Products">
    <meta property="og:description" content="VAHA AI tutor, KA CRM, ShopNest e-commerce, PipeForge CI/CD and more - software products built by KA Software.">
    <meta property="og:site_name" content="KA Software">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Products - KA Software">
    <meta name="twitter:description" content="AI-powered software products: VAHA AI, KA CRM, ShopNest, PipeForge and more.">

    <meta name="theme-color" content="#2563eb">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>
    @include('sections.header')

    <main>
        <!-- Hero -->
        <section class="products-hero">
            <div class="hero-bg">
                <div class="hero-gradient"></div>
                <div class="hero-pattern"></div>
                <div class="hero-glow hero-glow-1"></div>
                <div class="hero-glow hero-glow-2"></div>
            </div>
            <div class="section-container">
                <div class="products-hero-content">
                    <span class="section-badge">Our Products</span>
                    <h1 class="products-hero-title">
                        Software Products, <span class="gradient-text">Built by Us</span>
                    </h1>
                    <p class="products-hero-desc">
                        Beyond services, we build and run our own products — from AI tutoring to
                        e-commerce, CRM, HRMS, and developer tools. Explore the suite.
                    </p>
                </div>
            </div>
        </section>

        <!-- Products Grid -->
        <section class="products-section">
            <div class="section-container">
                <div class="products-grid">
                    @foreach($products as $product)
                        <div class="product-card {{ !empty($product['featured']) ? 'featured' : '' }}">
                            <div class="product-card-top" style="background: {{ $product['gradient'] }};">
                                <div class="product-icon">
                                    <i class="{{ $product['icon'] }}"></i>
                                </div>
                                <span class="product-status {{ strtolower($product['status']) }}">{{ $product['status'] }}</span>
                            </div>
                            <div class="product-card-body">
                                <span class="product-category">{{ $product['category'] }}</span>
                                <h3 class="product-name">{{ $product['name'] }}</h3>
                                <p class="product-tagline">{{ $product['tagline'] }}</p>
                                <p class="product-description">{{ $product['description'] }}</p>

                                <div class="product-stats">
                                    @foreach($product['stats'] as $stat)
                                        <div class="product-stat">
                                            <span class="product-stat-number">{{ $stat['number'] }}</span>
                                            <span class="product-stat-label">{{ $stat['label'] }}</span>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="product-tags">
                                    @foreach(array_slice($product['tech'], 0, 4) as $tech)
                                        <span class="tag">{{ $tech }}</span>
                                    @endforeach
                                </div>

                                <a href="{{ route('product.show', $product['slug']) }}" class="product-link">
                                    Explore {{ $product['name'] }}
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="products-cta">
            <div class="section-container">
                <div class="products-cta-card">
                    <h2>Want a product like this for your business?</h2>
                    <p>We build custom products end-to-end — from idea to launch and beyond.</p>
                    <a href="{{ url('/') }}#contact" class="btn btn-primary btn-lg">
                        <span>Talk to Our Team</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    @include('sections.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
</body>
</html>
