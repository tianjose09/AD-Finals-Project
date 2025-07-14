<?php
$requiredRole = 'client';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/handleaccount.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore: Mars</title>

    <link rel="stylesheet" href="assets/navbar/css/navbar.css">
    <link rel="stylesheet" href="assets/css/bg.css">
    <link rel="stylesheet" href="assets/footer/css/footer.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/TED_LOGOwoBG.png">

</head>
<body>
   
    <!-- NAVBAR -->
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




    <!--EXPLORE-->
    <div class="cont-explr">
    <div id="cont-below"></div>
        <h1>MARS</h1>
        <p>“The Red Frontier”</p>
        <img src="assets/img/Mars.png" alt="Mercury Globe" draggable="false">
    </div>

    <div id="box-explr">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="assets/img/MARS (1).png" draggable="false">
                <img src="assets/img/MARS (2).png" draggable="false">
                <img src="assets/img/MARS (3).png" draggable="false">
            </div>
            <button class="carousel-btn prev-btn">&lt;</button>
            <button class="carousel-btn next-btn">&gt;</button>
        </div>

        <p>
            Walk the dunes of ancient deserts beneath twin moons. With its rust-red soil,
            colossal volcanoes, and canyons deeper than Earth's Grand Canyon, Mars is a
            photographer’s playground. Come for the Martian sunsets—stay for the view from
            Olympus Mons.
        </p>

        <button id="btn-book">BOOK NOW!</button>
    </div>
</div>


    <!--FOOTER-->
    <footer>
        <div id="foot-logo">
            <img src="assets/footer/img/TED_LOGOwBG.png" alt="Teddiursa Airlines Logo" draggable="false">
        </div>

        <div class="foot-text">
            <div id="foot-tagline">
                Not Just a Flight. A Leap Into the Universe.
            </div>
            <div id="foot-contInfo">
                <h3>Contact Information:</h3>
                <p><i>teddairlines@gmail.com  |  0912-343-5352</i></p>
            </div>
        </div>
    </footer>
    <!--BACKGROUND-->
    <div class="stars" id="stars"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>


    <script src="assets/js/bg.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>