<?php 
$requiredRole = ['client', 'admin'];
include_once $_SERVER['DOCUMENT_ROOT'] . '/handlers/account.handler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Teddiursa Airlines - Booking</title>
  <link rel="icon" type="image/x-icon" href="assets/img/TED_LOGOwoBG.png">
  <link rel="stylesheet" href="/components/templates/navbar/assets/css/navbar.css">
  <link rel="stylesheet" href="/components/templates/footer/assets/css/footer.css">
  <link rel="stylesheet" href="/pages/booking1/assets/css/styles.css">
</head>
<body>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/navbar/navbar.template.php'; ?>

  <div class="stars" id="stars"></div>
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>

  <main class="main-content">
    <div class="booking-wrapper">
      <img src="/assets/img/bookinghero.png" class="bg-image" alt="Flight UI Background" draggable="false"/>
      <div class="form-overlay">
        <div class="from-to-wrapper">
          <div class="field">
            <label for="to">To</label>
            <input type="text" id="to" name="to" placeholder="Select Destination" list="planetList" />
          </div>
        </div>
        <div class="row">
          <div class="field">
            <label for="date">Date</label>
            <input type="date" id="date" />
          </div>
        </div>
        <button class="search-btn" id="searchBtn">Search Flights</button>
      </div>
    </div>
  </main>

  <datalist id="planetList">
    <option value="Earth"><option value="Mars"><option value="Venus">
    <option value="Jupiter"><option value="Saturn"><option value="Uranus">
    <option value="Neptune"><option value="Mercury"><option value="Pluto">
    <option value="Moon">
  </datalist>

  <div class="flights-container">
    <h2 class="flights-header">Available Interplanetary Flights</h2>
    <div class="flights-table">
      <div class="flights-header-row">
        <div class="flights-cell">Destination</div>
        <div class="flights-cell">Departure→Arrival</div>
        <div class="flights-cell">Time</div>
        <div class="flights-cell">Flight Number</div>
        <div class="flights-cell">Price</div>
        <div class="flights-cell">Select</div>
      </div>
    </div>
  </div>

  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/footer/footer.template.php'; ?>
  <script src="/components/templates/navbar/assets/js/navbar.js"></script>
  <script src="/pages/booking1/assets/js/script.js"></script>
</body>
</html>
