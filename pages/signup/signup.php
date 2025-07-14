
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="/pages/signup/assets/css/styles.css">
</head>
<body>

    <!-- Four Circles -->
    <!-- Background Elements -->
    <div class="stars" id="stars"></div>

    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="blob blob-4"></div>

    <!-- Admin Sign-Up Section -->
    <div class="signup-wrapper">
        <div class="logo-container">
            <div class="logo">
                <img src="/assets/img/LOGO Transparent.png" alt="Logo">
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
