<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ $service['name'] }} - {{ $service['tagline'] }} | KA Software</title>
    <meta name="description" content="{{ $service['description'] }}">
    <meta name="author" content="KA Software">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="canonical" href="https://kasoftware.in/services/{{ $service['slug'] }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kasoftware.in/services/{{ $service['slug'] }}">
    <meta property="og:title" content="{{ $service['name'] }} - KA Software">
    <meta property="og:description" content="{{ $service['description'] }}">
    <meta property="og:site_name" content="KA Software">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $service['name'] }} - KA Software">
    <meta name="twitter:description" content="{{ $service['description'] }}">

    <meta name="theme-color" content="#2563eb">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <link href="{{ asset('fonts/fonts.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>
    @include('sections.header')

    <main>
        <!-- Service Hero -->
        <section class="product-hero" style="background: {{ $service['gradient'] }};">
            <div class="product-hero-bg">
                <div class="hero-pattern"></div>
            </div>
            <div class="section-container">
                <div class="product-hero-content">
                    <a href="{{ url('/') }}#services" class="product-back-link">
                        <i class="fa-solid fa-arrow-left"></i> All Services
                    </a>
                    <div class="product-hero-main">
                        <div class="product-hero-icon">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <div>
                            <span class="product-hero-category">Service</span>
                            <h1 class="product-hero-title">{{ $service['name'] }}</h1>
                            <p class="product-hero-tagline">{{ $service['tagline'] }}</p>
                        </div>
                    </div>

                    <div class="product-hero-stats">
                        @foreach($service['stats'] as $stat)
                            <div class="product-hero-stat">
                                <span class="number">{{ $stat['number'] }}</span>
                                <span class="label">{{ $stat['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Service Content -->
        <section class="product-content">
            <div class="section-container">
                <div class="product-content-grid">
                    <div class="product-main">
                        <div class="content-section">
                            <h2>Overview</h2>
                            <p>{{ $service['long_description'] }}</p>
                        </div>

                        <div class="content-section">
                            <h2>What You Get</h2>
                            <ul class="product-features-list">
                                @foreach($service['deliverables'] as $item)
                                    <li>
                                        <i class="fa-solid fa-circle-check"></i>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="content-section">
                            <h2>Why KA Software?</h2>
                            <div class="benefits-grid">
                                @foreach($service['benefits'] as $benefit)
                                    <div class="benefit-card">
                                        <div class="benefit-icon" style="background: {{ $service['gradient'] }};">
                                            <i class="{{ $benefit['icon'] }}"></i>
                                        </div>
                                        <h3>{{ $benefit['title'] }}</h3>
                                        <p>{{ $benefit['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="content-section">
                            <h2>How We Work</h2>
                            <ol class="steps-list">
                                @foreach($service['process'] as $step)
                                    <li class="step-item">
                                        <span class="step-number">{{ $loop->iteration }}</span>
                                        <div>
                                            <h3>{{ $step['title'] }}</h3>
                                            <p>{{ $step['text'] }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>

                        <div class="content-section">
                            <h2>Industries We Serve</h2>
                            <div class="usecase-chips">
                                @foreach($service['industries'] as $industry)
                                    <span class="usecase-chip">
                                        <i class="fa-solid fa-circle-check"></i> {{ $industry }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        @if(count($relatedProducts))
                            <div class="content-section">
                                <h2>Products We Built in This Space</h2>
                                <p class="section-lead">
                                    The fastest proof of what we can build for you - our own products, live with real customers.
                                </p>
                                <div class="related-products-grid service-products-grid">
                                    @foreach($relatedProducts as $rel)
                                        <a href="{{ route('product.show', $rel['slug']) }}" class="related-product-card">
                                            <div class="related-product-icon" style="background: {{ $rel['gradient'] }};">
                                                <i class="{{ $rel['icon'] }}"></i>
                                            </div>
                                            <div>
                                                <h3>{{ $rel['name'] }}</h3>
                                                <p>{{ $rel['tagline'] }}</p>
                                            </div>
                                            <i class="fa-solid fa-arrow-right related-arrow"></i>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="content-section">
                            <h2>Frequently Asked Questions</h2>
                            <div class="faq-list">
                                @foreach($service['faq'] as $faq)
                                    <details class="faq-item">
                                        <summary>
                                            <span>{{ $faq['q'] }}</span>
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </summary>
                                        <p>{{ $faq['a'] }}</p>
                                    </details>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <aside class="product-sidebar">
                        <div class="sidebar-card">
                            <h4>Technology Stack</h4>
                            <div class="tech-list">
                                @foreach($service['tech'] as $tech)
                                    <span class="tech-item">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar-card product-cta-card">
                            <h4>Start Your {{ $service['name'] }} Project</h4>
                            <p>Get a free consultation and a fixed-price quote within 48 hours.</p>
                            <a href="{{ url('/') }}#contact" class="btn btn-primary btn-block">
                                <span>Get Free Quote</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>

                        <div class="sidebar-card">
                            <h4>Other Services</h4>
                            <ul class="sidebar-services-list">
                                @foreach($otherServices as $other)
                                    <li>
                                        <a href="{{ route('service.show', $other['slug']) }}">
                                            <i class="{{ $other['icon'] }}"></i>
                                            <span>{{ $other['name'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="products-cta">
            <div class="section-container">
                <div class="products-cta-card">
                    <h2>Ready to start your {{ strtolower($service['name']) }} project?</h2>
                    <p>Tell us your idea - we reply within 24 hours with next steps and honest advice.</p>
                    <a href="{{ url('/') }}#contact" class="btn btn-primary btn-lg">
                        <span>Start the Conversation</span>
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
