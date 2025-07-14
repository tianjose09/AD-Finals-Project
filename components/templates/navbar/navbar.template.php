<?php
$requiredRole = 'client';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/handleaccount.php';
?>
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
            <img src="assets/navbar/img/TED_LOGO_White.png" alt="Teddiursa Airlines Logo" draggable="false">
        </div>
        
        <div class="nav-item account-item">
                <div class="nav-icon">
                    <img src="assets/navbar/img/Profile.png" alt="Account" draggable="false">
                </div>
                <span class="nav-text">Account</span>
        <div class="account-dropdown">
                    <div class="account-header">
                        
                        <div class="account-name"><?= htmlspecialchars($user['fullname'] ?? 'Client') ?></div>
                        


                    </div>
                    <div class="account-divider"></div>
                    <button class="logout-btn">
                        <svg class="logout-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 16L21 12M21 12L17 8M21 12H7M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        LOG OUT
                    </button>
                </div>
            </div>
            
            <div class="nav-item" id="explore-nav">
                <div class="nav-icon">
                    <img src="assets/navbar/img/Explore.png" alt="Explore" draggable="false">
                </div>
                <span class="nav-text">Explore</span>
            </div>

            <div class="nav-item" id="book-nav">
    <div class="nav-icon">
        <img src="assets/navbar/img/Book.png" alt="Book a trip" draggable="false">
    </div>
    <span class="nav-text">Book a trip</span>
</div>


            <div class="nav-item" id="about-nav">
    <div class="nav-icon">
        <img src="assets/navbar/img/AboutUs.png" alt="About Us" draggable="false">
    </div>
    <span class="nav-text">About Us</span>
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