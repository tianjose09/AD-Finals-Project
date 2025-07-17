<?php
$requiredRole = 'client';
include_once $_SERVER['DOCUMENT_ROOT'] . '/handlers/account.handler.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore: Saturn</title>

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
        <h1>SATURN</h1>
        <p>“Rings of Serenity”</p>
        <img src="assets/img/Saturn.png" alt="Mercury Globe" draggable="false">
    </div>

    <div id="box-explr">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="assets/img/SATURN1.png" draggable="false">
                <img src="assets/img/SATURN2.png" draggable="false">
                <img src="assets/img/SATURN3.png" draggable="false">
            </div>
            <button class="carousel-btn prev-btn">&lt;</button>
            <button class="carousel-btn next-btn">&gt;</button>
        </div>

        <p>
            Behold the most elegant sight in the sky: Saturn’s stunning rings. Best viewed from orbit,
            this golden gas giant is a symphony of tranquility and cosmic grandeur. Float among its
            icy moons, or cruise beneath the shadows of its vast ring system.
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