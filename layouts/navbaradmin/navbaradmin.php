<?php
$requiredRole = 'admin';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/handleaccount.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Navbar</title>
  <link rel="stylesheet" href="/components/templates/navbar/assets/css/navbar.css" />
  <link rel="icon" type="image/x-icon" href="/assets/img/TED_LOGOwoBG.png" />
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <!-- Logo -->
    <div class="logo">
      <img src="/components/templates/navbar/assets/img/TED_LOGO_White.png" alt="Teddiursa Airlines Logo" draggable="false">
    </div>

    <!-- Account Dropdown -->
    <div class="nav-item account-item">
      <div class="nav-icon">
        <img src="/components/templates/navbar/assets/img/Profile.png" alt="Account" draggable="false">
      </div>
      <span class="nav-text">Account</span>
      <div class="account-dropdown">
        <div class="account-header">
          <div class="account-name"><?= htmlspecialchars($user['fullname'] ?? 'Admin') ?></div>
        </div>
        <div class="account-divider"></div>
        <button class="logout-btn">
          <svg class="logout-icon" viewBox="0 0 24 24" fill="none"
               xmlns="http://www.w3.org/2000/svg">
            <path d="M17 16L21 12M21 12L17 8M21 12H7M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
          </svg>
          LOG OUT
        </button>
      </div>
    </div>

    <!-- Admin Links -->
    <div class="nav-item" id="flight-schedule-btn">
      <div class="nav-icon">
        <img src="/components/templates/navbar/assets/img/Explore.png" alt="Explore" draggable="false">
      </div>
      <span class="nav-text">Flight Schedule Control</span>
    </div>

    <div class="nav-item" id="passenger-management-btn">
      <div class="nav-icon">
        <img src="/components/templates/navbar/assets/img/Book.png" alt="Book a trip" draggable="false">
      </div>
      <span class="nav-text">Passenger Management</span>
    </div>
  </nav>

  <!-- Background Elements -->
  <div class="stars" id="stars"></div>
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>

  <script src="/layouts/navbaradmin/assets/js/script.js"></script>
</body>
</html>
