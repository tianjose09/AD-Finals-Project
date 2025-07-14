<?php
$requiredRole = 'client';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/handleaccount.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore: Uranus</title>

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
        <h1>URANUS</h1>
        <p>“The Tilted Dreamscape”</p>
        <img src="assets/img/Uranus.png" alt="Mercury Globe" draggable="false">
    </div>

    <div id="box-explr">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="assets/img/URANUS (1).png" draggable="false">
                <img src="assets/img/URANUS (2).png" draggable="false">
                <img src="assets/img/URANUS (3).png" draggable="false">
            </div>
            <button class="carousel-btn prev-btn">&lt;</button>
            <button class="carousel-btn next-btn">&gt;</button>
        </div>

        <p>
            Bathed in icy blue, Uranus spins on its side like no other planet. Its atmosphere
            glows with pastel hues, perfect for a peaceful retreat. Quiet, cold, and hypnotic—Uranus
            is the spa resort of the outer planets.
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