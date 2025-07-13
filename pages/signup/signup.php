<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/pages/signup/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="blob blob-4"></div> 
    
    <div class="signup-wrapper">
        <div class="logo-container">
            <div class="logo">
                <img src="LOGO Transparent.png" alt="Logo">
            </div>
        </div>
        
        <div class="signup-container">
            <h2>Sign Up</h2>
            
            <div class="input-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" placeholder="Enter your full name">
            </div>
            
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Enter your username">
            </div>
            
            <div class="input-group">
                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" placeholder="Enter your contact number">
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Create a password">
            </div>
            
            <button type="button" class="signup-btn">Sign Up</button>
            
            <div class="login-link">
                Already have an account? <a href="login-btn">Login</a>
            </div>
        </div>
    </div>

    <script src="/pages/signup/assets/js/scripts.js"></script>
</body>
</html>