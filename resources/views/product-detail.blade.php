<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ $product['name'] }} - {{ $product['tagline'] }} | KA Software</title>
    <meta name="description" content="{{ $product['description'] }}">
    <meta name="author" content="KA Software">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="canonical" href="https://kasoftware.in/products/{{ $product['slug'] }}">

    <meta property="og:type" content="product">
    <meta property="og:url" content="https://kasoftware.in/products/{{ $product['slug'] }}">
    <meta property="og:title" content="{{ $product['name'] }} - {{ $product['tagline'] }}">
    <meta property="og:description" content="{{ $product['description'] }}">
    <meta property="og:site_name" content="KA Software">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $product['name'] }} - KA Software">
    <meta name="twitter:description" content="{{ $product['description'] }}">

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
        <!-- Product Hero -->
        <section class="product-hero" style="background: {{ $product['gradient'] }};">
            <div class="product-hero-bg">
                <div class="hero-pattern"></div>
            </div>
            <div class="section-container">
                <div class="product-hero-content">
                    <a href="{{ route('products') }}" class="product-back-link">
                        <i class="fa-solid fa-arrow-left"></i> All Products
                    </a>
                    <div class="product-hero-main">
                        <div class="product-hero-icon">
                            <i class="{{ $product['icon'] }}"></i>
                        </div>
                        <div>
                            <span class="product-hero-category">
                                {{ $product['category'] }} &middot; {{ $product['status'] }}
                            </span>
                            <h1 class="product-hero-title">{{ $product['name'] }}</h1>
                            <p class="product-hero-tagline">{{ $product['tagline'] }}</p>
                        </div>
                    </div>

                    <div class="product-hero-stats">
                        @foreach($product['stats'] as $stat)
                            <div class="product-hero-stat">
                                <span class="number">{{ $stat['number'] }}</span>
                                <span class="label">{{ $stat['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                    @if(!empty($product["image"]))
                        <div class="product-hero-photo">
                            <img src="{{ asset($product["image"]) }}" alt="{{ $product["name"] }}">
                        </div>
                    @endif
            </div>
        </section>

        <!-- Product Content -->
        <section class="product-content">
            <div class="section-container">
                <div class="product-content-grid">
                    <div class="product-main">
                        <div class="content-section">
                            <h2>About {{ $product['name'] }}</h2>
                            <p>{{ $product['long_description'] }}</p>
                        </div>

                        @if(!empty($product['benefits']))
                            <div class="content-section">
                                <h2>Why {{ $product['name'] }}?</h2>
                                <div class="benefits-grid">
                                    @foreach($product['benefits'] as $benefit)
                                        <div class="benefit-card">
                                            <div class="benefit-icon" style="background: {{ $product['gradient'] }};">
                                                <i class="{{ $benefit['icon'] }}"></i>
                                            </div>
                                            <h3>{{ $benefit['title'] }}</h3>
                                            <p>{{ $benefit['text'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="content-section">
                            <h2>Key Features</h2>
                            <ul class="product-features-list">
                                @foreach($product['features'] as $feature)
                                    <li>
                                        <i class="fa-solid fa-circle-check"></i>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @if(!empty($product['how_it_works']))
                            <div class="content-section">
                                <h2>How It Works</h2>
                                <ol class="steps-list">
                                    @foreach($product['how_it_works'] as $step)
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
                        @endif

                        @if(!empty($product['use_cases']))
                            <div class="content-section">
                                <h2>Perfect For</h2>
                                <div class="usecase-chips">
                                    @foreach($product['use_cases'] as $useCase)
                                        <span class="usecase-chip">
                                            <i class="fa-solid fa-circle-check"></i> {{ $useCase }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if(!empty($product['testimonial']))
                            <div class="product-testimonial">
                                <i class="fa-solid fa-quote-left testimonial-quote-icon"></i>
                                <blockquote>{{ $product['testimonial']['quote'] }}</blockquote>
                                <div class="testimonial-person">
                                    <div class="testimonial-avatar" style="background: {{ $product['gradient'] }};">
                                        {{ strtoupper(substr($product['testimonial']['author'], 0, 1)) }}
                                    </div>
                                    <div>
                                        <strong>{{ $product['testimonial']['author'] }}</strong>
                                        <span>{{ $product['testimonial']['role'] }}, {{ $product['testimonial']['company'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($product['faq']))
                            <div class="content-section">
                                <h2>Frequently Asked Questions</h2>
                                <div class="faq-list">
                                    @foreach($product['faq'] as $faq)
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
                        @endif
                    </div>

                    <aside class="product-sidebar">
                        <div class="sidebar-card">
                            <h4>Technology Stack</h4>
                            <div class="tech-list">
                                @foreach($product['tech'] as $tech)
                                    <span class="tech-item">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar-card product-cta-card">
                            <h4>Interested in {{ $product['name'] }}?</h4>
                            <p>Get a live demo or discuss pricing for your business.</p>
                            <a href="{{ url('/') }}#contact" class="btn btn-primary btn-block">
                                <span>Request a Demo</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <a href="{{ !empty($product['site_url']) ? $product['site_url'] : url('sites/' . $product['slug'] . '/index.html') }}" class="btn btn-outline btn-block" style="margin-top: 0.75rem;" target="_blank" rel="noopener">
                                <span>Visit Product Website</span>
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Related Products -->
        @if(count($related))
        <section class="related-products">
            <div class="section-container">
                <div class="section-header">
                    <span class="section-badge">More Products</span>
                    <h2 class="section-title">Explore the Suite</h2>
                </div>
                <div class="related-products-grid">
                    @foreach($related as $rel)
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
        </section>
        @endif
    </main>

    @include('sections.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
</body>
</html>
