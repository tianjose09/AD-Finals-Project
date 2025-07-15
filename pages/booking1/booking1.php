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
 <!--NAVBAR-->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/navbar/navbar.template.php';
    ?>

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

        <div class="row">
          <div class="field">
            <label>Passengers</label>
            <div class="passenger-control">
              <button onclick="updatePassengers(-1)">-</button>
              <input type="number" id="passengerCount" value="1" min="1" onchange="validatePassengerInput()">
              <button onclick="updatePassengers(1)">+</button>
            </div>
          </div>
        
        </div>

        <button class="search-btn">Search Flights</button>
      </div>
    </div>
  </main>

  <datalist id="planetList">
    <option value="Earth"><option value="Mars"><option value="Venus">
    <option value="Jupiter"><option value="Saturn"><option value="Uranus">
    <option value="Neptune"><option value="Mercury"><option value="Pluto">
    <option value="Europa"><option value="Titan"><option value="Ganymede">
    <option value="Callisto"><option value="Io"><option value="Triton">
  </datalist>

  <div class="flights-container">
  <h2 class="flights-header">Available Interplanetary Flights</h2>
  <div class="flights-table">
    <div class="flights-header-row">
      <div class="flights-cell">Destination</div>
      <div class="flights-cell">Departure→Arrival</div>
      <div class="flights-cell">Distance</div>
      <div class="flights-cell">Flight Number</div>
      <div class="flights-cell">Price</div>
      <div class="flights-cell">Select</div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Mecury</div>
      <div class="flights-cell">15 Nov 2023 15:45 → 16 Nov 2023 08:30</div>
      <div class="flights-cell">91 million km</div>
      <div class="flights-cell">TA-7842</div>
      <div class="flights-cell">$35,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Venus</div>
      <div class="flights-cell">18 Nov 2023 07:15 → 18 Nov 2023 22:30</div>
      <div class="flights-cell">41 million km</div>
      <div class="flights-cell">TA-4521</div>
      <div class="flights-cell">$38,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Mars</div>
      <div class="flights-cell">19 Nov 2023 12:00 → 20 Nov 2023 18:45</div>
      <div class="flights-cell">78 million km</div>
      <div class="flights-cell">TA-9823</div>
      <div class="flights-cell">$25,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Jupiter</div>
      <div class="flights-cell">20 Nov 2023 06:30 → 22 Nov 2023 09:15</div>
      <div class="flights-cell">628 million km</div>
      <div class="flights-cell">TA-5678</div>
      <div class="flights-cell">$42,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Saturn</div>
      <div class="flights-cell">21 Nov 2023 14:20 → 21 Nov 2023 20:45</div>
      <div class="flights-cell">1.2 billion km</div>
      <div class="flights-cell">TA-3456</div>
      <div class="flights-cell">$58,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Uranus</div>
      <div class="flights-cell">22 Nov 2023 08:15 → 23 Nov 2023 11:30</div>
      <div class="flights-cell">2.6 billion km</div>
      <div class="flights-cell">TA-7890</div>
      <div class="flights-cell">$65,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>
    <div class="flights-row">
      <div class="flights-cell">Neptune</div>
      <div class="flights-cell">22 Nov 2023 08:15 → 23 Nov 2023 11:30</div>
      <div class="flights-cell">4.3 billion km</div>
      <div class="flights-cell">TA-7890</div>
      <div class="flights-cell">$75,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Pluto</div>
      <div class="flights-cell">26 Nov 2023 11:15 → 27 Nov 2023 03:30</div>
      <div class="flights-cell">16h 15m</div>
      <div class="flights-cell">TA-4567</div>
      <div class="flights-cell">$22,899</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>

    <div class="flights-row">
      <div class="flights-cell">Moon</div>
      <div class="flights-cell">27 Nov 2023 13:45 → 28 Nov 2023 21:15</div>
      <div class="flights-cell">384,400 km</div>
      <div class="flights-cell">TA-8901</div>
      <div class="flights-cell">$12,000</div>
      <div class="flights-cell"><button class="select-btn" onclick="proceedToBooking()">Select</button></div>
    </div>
  </div>
</div>


  <!--FOOTER-->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/footer/footer.template.php';
    ?>

  <script src="/pages/booking1/assets/js/script.js"></script>
</body>
</html>