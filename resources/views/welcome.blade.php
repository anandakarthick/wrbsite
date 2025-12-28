<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KA Software - AI-Powered Software Development</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('sections.header')
    
    <main>
        @include('sections.hero')
        @include('sections.services')
        @include('sections.ai-features')
        @include('sections.stats')
        @include('sections.portfolio')
        @include('sections.contact')
        @include('sections.cta')
    </main>
    
    @include('sections.footer')
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
