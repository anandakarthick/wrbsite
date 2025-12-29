{{-- Google Analytics & Search Console Verification --}}
{{-- Update the IDs below with your actual values --}}

{{-- Google Search Console Verification --}}
{{-- Get your code from: https://search.google.com/search-console --}}
{{-- <meta name="google-site-verification" content="YOUR_GOOGLE_VERIFICATION_CODE"> --}}

{{-- Bing Webmaster Tools Verification --}}
{{-- Get your code from: https://www.bing.com/webmasters --}}
{{-- <meta name="msvalidate.01" content="YOUR_BING_VERIFICATION_CODE"> --}}

{{-- Google Analytics 4 (GA4) --}}
{{-- Get your Measurement ID from: https://analytics.google.com --}}
@if(config('services.google.analytics_id'))
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_id') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ config('services.google.analytics_id') }}');
</script>
@endif

{{-- Google Tag Manager (Alternative to GA4) --}}
{{-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-XXXXXXX');</script> --}}
