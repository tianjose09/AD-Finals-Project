<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Background</title>
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <!-- Logo -->
        <div class="logo">
            <img src="/components/templates/navbar/assets/img/TED_LOGO_White.png" Teddiursa Airlines Logo" draggable="false">
        </div>
        
        <div class="nav-items-container">
            <div class="nav-item">
                <div class="nav-icon">
                    <img src="/components/templates/navbar/assets/img/Profile.png" alt="Account" draggable="false">
                </div>
                <span class="nav-text">Account</span>
            </div>
            
            <div class="nav-item">
                <div class="nav-icon">
                    <img src="/components/templates/navbar/assets/img/Explore.png" alt="Explore" draggable="false">
                </div>
                <span class="nav-text">Explore</span>
            </div>

            <div class="nav-item">
                <div class="nav-icon">
                    <img src="/components/templates/navbar/assets/img/Book.png" alt="Book a trip" draggable="false">
                </div>
                <span class="nav-text">Book a trip</span>
            </div>

            <div class="nav-item">
                <div class="nav-icon">
                    <img src="/components/templates/navbar/assets/img/AboutUs.png" alt="About Us" draggable="false">
                </div>
                <span class="nav-text">About Us</span>
            </div>
        </div>
    </nav>

    <!-- Background Elements -->
    <div class="stars" id="stars"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <script src="assets/js/navbar.js"></script>
</body>
</html>