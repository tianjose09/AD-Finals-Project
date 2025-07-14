<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Teddiursa Airlines</title>
  <link rel="stylesheet" href="/pages/booking1/assets/css/styles.css">
  <link rel="icon" type="image/x-icon" href="assets/img/TED_LOGOwoBG.png">
</head>
<body>

  <nav class="navbar">
    <div class="/assets/img/LOGO White.png" alt="Teddiursa Airlines Logo" />
    </div>
    <div class="nav-items-container">
      <div class="nav-item"><div class="nav-icon"><img src="account.png" /></div><span class="nav-text">Account</span></div>
      <div class="nav-item"><div class="nav-icon"><img src="explore.png" /></div><span class="nav-text">Explore</span></div>
      <div class="nav-item"><div class="nav-icon"><img src="book.png" /></div><span class="nav-text">Book a trip</span></div>
      <div class="nav-item"><div class="nav-icon"><img src="aboutus.png" /></div><span class="nav-text">About Us</span></div>
    </div>
  </nav>

  <div class="stars" id="stars"></div>
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>

  <main class="main-content">
    <div class="booking-wrapper">
      <img src="bookinghero.png" class="bg-image" alt="Flight UI Background" draggable="false"/>
      <div class="form-overlay">
        <div class="from-to-wrapper">
          <div class="field">
            <label for="from">From</label>
            <input type="text" id="from" name="from" placeholder="Select Departure" list="planetList" />
          </div>
          <div class="swap-container">
            <button class="swap" id="swapBtn">⇄</button>
          </div>
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
          <div class="field">
            <label>Class</label>
            <select>
              <option disabled selected>Class</option>
              <option>Economy</option>
              <option>Business Class</option>
              <option>First Class</option>
              <option>Galactic Luxury</option>
            </select>
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
  <table class="flights-table"></table>
    <thead>
      <tr>
        <th>Planet→Planet</th>
        <th>Departure→Arrival</th>
        <th>Duration</th>
        <th>Flight#</th>
        <th>Price</th>
        <th>Select</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Earth → Mars</td>
        <td>15 Nov 2023 15:45 → 16 Nov 2023 08:30</td>
        <td>16h 45m</td>
        <td>TA-7842</td>
        <td>$1,299</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
      <tr>
        <td>Venus → Earth</td>
        <td>18 Nov 2023 07:15 → 18 Nov 2023 22:30</td>
        <td>15h 15m</td>
        <td>TA-4521</td>
        <td>$1,899</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
      <tr>
        <td>Jupiter → Saturn</td>
        <td>19 Nov 2023 12:00 → 20 Nov 2023 18:45</td>
        <td>30h 45m</td>
        <td>TA-9823</td>
        <td>$4,299</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
      <tr>
        <td>Earth → Pluto</td>
        <td>20 Nov 2023 06:30 → 22 Nov 2023 09:15</td>
        <td>50h 45m</td>
        <td>TA-5678</td>
        <td>$5,999</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
      <tr>
        <td>Mercury → Venus</td>
        <td>21 Nov 2023 14:20 → 21 Nov 2023 20:45</td>
        <td>6h 25m</td>
        <td>TA-3456</td>
        <td>$999</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
      <tr>
        <td>Uranus → Neptune</td>
        <td>22 Nov 2023 08:15 → 23 Nov 2023 11:30</td>
        <td>27h 15m</td>
        <td>TA-7890</td>
        <td>$3,799</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
      <tr>
        <td>Mars → Earth</td>
        <td>26 Nov 2023 11:15 → 27 Nov 2023 03:30</td>
        <td>16h 15m</td>
        <td>TA-4567</td>
        <td>$2,899</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
      <tr>
        <td>Earth → Moon</td>
        <td>27 Nov 2023 13:45 → 28 Nov 2023 21:15</td>
        <td>31h 30m</td>
        <td>TA-8901</td>
        <td>$4,199</td>
        <td><button class="select-btn" onclick="proceedToBooking()">Select</button></td>
      </tr>
    </tbody>
  </table>
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

  <script src="/pages/booking1/assets/js/script.js"></script>
</body>
</html>