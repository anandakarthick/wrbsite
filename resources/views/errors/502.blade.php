<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>502 - Bad Gateway | KA Software</title>
    <link href="{{ asset('fonts/fonts.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e1b4b 0%, #0f172a 50%, #020617 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            overflow: hidden;
        }
        
        .container {
            text-align: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }
        
        .error-code {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(8rem, 20vw, 15rem);
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }
        
        .error-title {
            font-family: 'Poppins', sans-serif;
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .error-description {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 2.5rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.5);
        }
        
        .glow {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.3;
            z-index: 0;
        }
        
        .glow-1 {
            width: 400px;
            height: 400px;
            background: #f59e0b;
            top: -100px;
            right: -100px;
        }
        
        .glow-2 {
            width: 300px;
            height: 300px;
            background: #ef4444;
            bottom: -50px;
            left: -50px;
        }
    </style>
</head>
<body>
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>
    
    <div class="container">
        <div class="error-code">502</div>
        <h1 class="error-title">Bad Gateway</h1>
        <p class="error-description">
            We're experiencing some technical difficulties. Please try again in a few moments.
        </p>
        <a href="{{ url('/') }}" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="23 4 23 10 17 10"></polyline>
                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
            </svg>
            Try Again
        </a>
    </div>
</body>
</html>
