<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Teddiursa Airlines</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <nav class="navbar">
    <div class="logo">
      <img src="LOGO White.png" alt="Teddiursa Airlines Logo" />
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