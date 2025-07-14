<?php
$requiredRole = 'client';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/handleaccount.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client: Menu</title>

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


    <!--CLIENT: MENU / HOME-->

    <!--Header Section-->
    <div id="header">
        <img src="assets/img/HeaderMain.png" alt="Header" draggable="false">
        <button id="btn-book">BOOK NOW!</button>
    </div>
    
    <!--Carousel Section-->
    <div id="explore">
    <h3>Start planning your next trip...</h3>
    <p>Thinking of travelling somewhere soon? <br>
    Here are some options to help you get started.</p>

    <div class="carousel-container" id="explore-section">
        <button class="carousel-btn prev-btn">&lt;</button>
        <div class="carousel">
            <div class="carousel-track">
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Mercury/Mercury.php">
            <img src="assets/img/Ex-Mercury.png" alt="Mercury" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Venus/Venus.php">
            <img src="assets/img/Ex-Venus.png" alt="Venus" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Earth/Earth.php">
            <img src="assets/img/Ex-Earth.png" alt="Earth" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Mars/Mars.php">
            <img src="assets/img/Ex-Mars.png" alt="Mars" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Jupiter/Jupiter.php">
            <img src="assets/img/Ex-Jupiter.png" alt="Jupiter" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Saturn/Saturn.php">
            <img src="assets/img/Ex-Saturn.png" alt="Saturn" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Uranus/Uranus.php">
            <img src="assets/img/Ex-Uranus.png" alt="Uranus" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Neptune/Neptune.php">
            <img src="assets/img/Ex-Neptune.png" alt="Neptune" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Pluto/Pluto.php">
            <img src="assets/img/Ex-Pluto.png" alt="Pluto" draggable="false">
        </a>
    </div>
    <div class="carousel-slide">
        <a href="/pages/exp-planet/Moon/Moon.php">
            <img src="assets/img/Ex-Moon.png" alt="Moon" draggable="false">
        </a>
    </div>
</div>

        </div>
        <button class="carousel-btn next-btn">&gt;</button>
    </div>
    </div>

    <div class="dvdr"><img src="assets/img/divider.png" alt="divider" draggable="false"></div>

    <!--FUN FACTS-->
    <div class="cont-facts">
        <div id="fun-text">FUN FACTS!</div>

        <div id="fun-image">
            <div id="ff1"><img src="assets/img/FunFacts (1).png" alt="Fun Fact #1" draggable="false"></div>
            <div id="ff2"><img src="assets/img/FunFacts (2).png" alt="Fun Fact #2" draggable="false"></div>
            <div id="ff3"><img src="assets/img/FunFacts (3).png" alt="Fun Fact #3" draggable="false"></div>
        </div>
    </div>

    <!--PROPER ATTIRE-->
    <div class="cont-attire">
        <div id="att-text">
            <h3>Proper Trip Attire!</h3>
            <p>A specialized, pressurized ensemble designed to ensure safety,<br>
            mobility, and life support—engineered for exploration beyond<br>
            Earth’s atmosphere.</p>
        </div>

        <img src="assets/img/ProperAttire.png" alt="Proper Attire" draggable="false">

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