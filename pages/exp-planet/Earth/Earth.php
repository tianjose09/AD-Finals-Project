<?php
$requiredRole = 'client';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/handleaccount.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore: Earth</title>

    <link rel="stylesheet" href="/components/templates/navbar/assets/css/navbar.css">
    <link rel="stylesheet" href="/components/templates/footer/assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/bg.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/TED_LOGOwoBG.png">

</head>
<body>
   
    <!--NAVBAR-->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/navbar/navbar.template.php';
    ?>

    <!--EXPLORE-->
    <div class="cont-explr">
    <div id="cont-below"></div>
        <h1>EARTH</h1>
        <p>“The Oasis of the Cosmos”</p>
        <img src="assets/img/Earth.png" alt="Mercury Globe" draggable="false">
    </div>

    <div id="box-explr">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="assets/img/EARTH (1).png" draggable="false">
                <img src="assets/img/EARTH (2).png" draggable="false">
                <img src="assets/img/EARTH (3).png" draggable="false">
            </div>
            <button class="carousel-btn prev-btn">&lt;</button>
            <button class="carousel-btn next-btn">&gt;</button>
        </div>

        <p>
            From emerald forests to sapphire seas, Earth is the jewel of the solar system.
            Its dynamic landscapes and breathable atmosphere make it the ultimate destination
            for life, adventure, and rest. Beaches, mountains, cities—there’s no place like
            home.
        </p>

        <button id="btn-book">BOOK NOW!</button>
    </div>
</div>


    <!--FOOTER-->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/footer/footer.template.php';
    ?>
    
    <!--BACKGROUND-->
    <div class="stars" id="stars"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>


    <script src="assets/js/bg.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>