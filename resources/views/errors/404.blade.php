<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | KA Software</title>
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
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
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
            background: #6366f1;
            top: -100px;
            right: -100px;
        }
        
        .glow-2 {
            width: 300px;
            height: 300px;
            background: #8b5cf6;
            bottom: -50px;
            left: -50px;
        }
    </style>
</head>
<body>
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>
    
    <div class="container">
        <div class="error-code">404</div>
        <h1 class="error-title">Page Not Found</h1>
        <p class="error-description">
            Oops! The page you're looking for doesn't exist or has been moved.
        </p>
        <a href="{{ url('/') }}" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Back to Home
        </a>
    </div>
</body>
</html>
