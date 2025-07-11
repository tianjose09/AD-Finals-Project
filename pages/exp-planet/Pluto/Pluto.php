<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore: Pluto</title>

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
        
        <div class="nav-items-container">
            <div class="nav-item">
                <div class="nav-icon">
                    <img src="assets/navbar/img/Profile.png" alt="Account" draggable="false">
                </div>
                <span class="nav-text">Account</span>
            </div>
            
            <div class="nav-item">
                <div class="nav-icon">
                    <img src="assets/navbar/img/Explore.png" alt="Explore" draggable="false">
                </div>
                <span class="nav-text">Explore</span>
            </div>

            <div class="nav-item">
                <div class="nav-icon">
                    <img src="assets/navbar/img/Book.png" alt="Book a trip" draggable="false">
                </div>
                <span class="nav-text">Book a trip</span>
            </div>

            <div class="nav-item">
                <div class="nav-icon">
                    <img src="assets/navbar/img/AboutUs.png" alt="About Us" draggable="false">
                </div>
                <span class="nav-text">About Us</span>
            </div>
        </div>
    </nav>


    <!--EXPLORE-->
    <div class="cont-explr">
    <div id="cont-below"></div>
        <h1>PLUTO</h1>
        <p>“The Lonely Beauty”</p>
        <img src="assets/img/Pluto.png" alt="Mercury Globe" draggable="false">
    </div>

    <div id="box-explr">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="assets/img/PLUTO (1).png" draggable="false">
                <img src="assets/img/PLUTO (2).png" draggable="false">
                <img src="assets/img/PLUTO (3).png" draggable="false">
            </div>
            <button class="carousel-btn prev-btn">&lt;</button>
            <button class="carousel-btn next-btn">&gt;</button>
        </div>

        <p>
            Far from the Sun lies a world of soft glaciers, heart-shaped plains, and poetic isolation.
            Pluto is a place for those seeking silence, wonder, and the thrill of the unknown.
            It’s not a planet—it's a love letter to the explorers.
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