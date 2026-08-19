{{-- SEO Meta Tags Component --}}
@php
    $defaultTitle = 'KA Software - AI-Powered Software Development Company in Chennai';
    $defaultDescription = 'KA Software is a leading AI-powered software development company in Chennai, India. Mobile apps, web applications, e-commerce, HRMS, CRM, and AI/ML solutions.';
    $defaultKeywords = 'software development company chennai, mobile app development, web application development, AI ML solutions, e-commerce development';
    $defaultImage = asset('images/og-default.jpg');
    $siteUrl = 'https://kasoftware.in';
@endphp

{{-- Primary Meta Tags --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>{{ $title ?? $defaultTitle }}</title>
<meta name="description" content="{{ $description ?? $defaultDescription }}">
<meta name="keywords" content="{{ $keywords ?? $defaultKeywords }}">
<meta name="author" content="KA Software">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<meta name="bingbot" content="index, follow">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $canonical ?? url()->current() }}">

{{-- Language and Region --}}
<meta name="language" content="English">
<meta name="geo.region" content="IN-TN">
<meta name="geo.placename" content="Chennai">
<meta name="geo.position" content="13.098115;80.209409">
<meta name="ICBM" content="13.098115, 80.209409">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:url" content="{{ $canonical ?? url()->current() }}">
<meta property="og:title" content="{{ $title ?? $defaultTitle }}">
<meta property="og:description" content="{{ $description ?? $defaultDescription }}">
<meta property="og:image" content="{{ $image ?? $defaultImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $title ?? $defaultTitle }}">
<meta property="og:site_name" content="KA Software">
<meta property="og:locale" content="en_IN">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@kasoftware">
<meta name="twitter:creator" content="@kasoftware">
<meta name="twitter:url" content="{{ $canonical ?? url()->current() }}">
<meta name="twitter:title" content="{{ $title ?? $defaultTitle }}">
<meta name="twitter:description" content="{{ $description ?? $defaultDescription }}">
<meta name="twitter:image" content="{{ $image ?? $defaultImage }}">

{{-- Additional SEO Meta --}}
<meta name="theme-color" content="#6366f1">
<meta name="msapplication-TileColor" content="#6366f1">
<meta name="application-name" content="KA Software">
<meta name="apple-mobile-web-app-title" content="KA Software">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=yes">

{{-- Favicons --}}
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">

{{-- Preconnect for Performance --}}
<link rel="dns-prefetch" href="https://www.google-analytics.com">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">

{{-- Alternate Languages (if applicable) --}}
<link rel="alternate" hreflang="en-in" href="{{ $siteUrl }}{{ request()->getPathInfo() }}">
<link rel="alternate" hreflang="en" href="{{ $siteUrl }}{{ request()->getPathInfo() }}">
<link rel="alternate" hreflang="x-default" href="{{ $siteUrl }}{{ request()->getPathInfo() }}">
