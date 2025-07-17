<?php
$requiredRole = ['client', 'admin']; // or 'admin' depending on who should access it
include_once $_SERVER['DOCUMENT_ROOT'] . '/handlers/account.handler.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

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


    <!--ABOUT USS-->
    <div class="cont-aboutUs">
        <img src="assets/img/Banner_Aboutus.png" alt="About Us Banner" draggable="false">

        <div id="au-text">
            <p>At Teddiursa Airlines, we're not just redefining travel -- <br>
            we're reimagining the future. Designed for the bold and the curious <br>
            our mission is to make space accessible, safe, and unforgettable.<br>
            Whether you're heading to low Earth orbit or venturing farther <br>
            we combine advanced aerospace technology with exceptional <br>
            service to deliver more than just a flight.<br><br></p>
            <h2>It's not just a flight. It's a leap into the universe.</h2>
        </div>

        <div class="dvdr"><img src="assets/img/divider.png" alt="divider" draggable="false"></div>

        <div class="team">
        <h1>Meet the TEAM</h1>
    
        <div class="team-row">
            <div id="calalay">
                <img src="assets/img/Calalay.png" alt="Calalay Profile" draggable="false">
                <h3>SOPHIA CALALAY</h3>
                <p>Lead Front-End</p>
            </div>

            <div id="emit">
                <img src="assets/img/Emit.png" alt="Emit Profile" draggable="false">
                <h3>YUKI EMIT</h3>
                <p>Back-End/Front-End</p>
            </div>

            <div id="guinto">
                <img src="assets/img/Guinto.png" alt="Guinto Profile" draggable="false">
                <h3>KHRISTIAN GUINTO</h3>
                <p>Back-End/Database/QA</p>
            </div>
        </div>
    
        <div class="team-row">
            <div id="sadicon">
                <img src="assets/img/Sadicon.png" alt="Sadicon Profile" draggable="false">
                <h3>ALTHEA SADICON</h3>
                <p> Lead Front-End</p>
            </div>

            <div id="tan">
                <img src="assets/img/Tan.png" alt="Tan Profile" draggable="false">
                <h3>KIRK TAN</h3>
                <p>Back-End/Database/Front-End</p>
            </div>
        </div>
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
    <script src="/pages/aboutus/assets/js/script.js"></script>
    <script src="/components/templates/navbar/assets/js/navbar.js"></script>
</body>

</html>