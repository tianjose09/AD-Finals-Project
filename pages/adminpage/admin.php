<?php
$requiredRole = 'admin';
include_once $_SERVER['DOCUMENT_ROOT'] . '/handlers/account.handler.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teddiursa Airlines - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/components/templates/navbar/assets/css/navbar.css">
    <link rel="stylesheet" href="/components/templates/footer/assets/css/footer.css">
    <link rel="stylesheet" href="/pages/adminpage/css/styles.css">
</head>
<body>
 <!-- Twinkling Stars Background -->
    <div class="stars" id="stars"></div>
    
    <header class="cosmic-header">
        <h1>TEDDIURSA AIRLINES</h1>
        <div class="admin-text">ADMIN</div>
    </header>

    <!--NAVBAR-->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/navbaradmin/navbaradmin.php';
    ?>


    <div class="admin-container"> 

        <div class="carousel-dots" id="dots-container">
            <!-- Dots will be added dynamically -->
        </div>

     <h2 class="page-title flight-schedule-title" id="flight-schedule-control">Flight Schedule Control</h2>

<!-- Schedule Form -->
<form id="scheduleForm">
    <div class="flight-container">
        <div class="form-row">
            <div class="form-group">
                <label>Destination</label>
                <select name="destination" required>
                    <option value="">Select Destination</option>
                    <optgroup label="Planets">
                        <option>Mercury</option>
                        <option>Venus</option>
                        <option>Mars</option>
                        <option>Jupiter</option>
                        <option>Saturn</option>
                        <option>Uranus</option>
                        <option>Neptune</option>
                        <option>Pluto</option>
                        <option>Moon</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label>Departure Time</label>
                <input type="time" name="departure_time" required>
            </div>

            <div class="form-group">
                <label>Departure Date</label>
                <input type="date" name="departure_date" required>
            </div>

            <div class="form-group">
                <label>Return Time</label>
                <input type="time" name="return_time" required>
            </div>

            <div class="form-group">
                <label>Return Date</label>
                <input type="date" name="return_date" required>
            </div>
        </div>
    </div>

    <!-- Button  Create, Delete, Update -->
    <div class="submit-container">
        <button type="button" class="submit-btn create-btn">Create Schedule</button>
        <button type="button" class="submit-btn delete-btn">Delete Schedule</button>
        <button type="submit" class="submit-btn update-btn">Update Schedule</button>
    </div>
</form>











        <!-- Passenger Management Section -->
        <h2 class="page-title" id="passenger-management">Passenger Management</h2>

        <div class="action-buttons-container">
            <button class="action-btn-large secondary-btn" onclick="openModal('allPassengersModal')">
                <span></span> View All Passengers
            </button>
            

    <!-- All Passengers Modal -->
    <div class="modal-overlay all-passengers-modal" id="allPassengersModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">ALL PASSENGERS</h3>
            <button class="modal-close" onclick="closeModal('allPassengersModal')">×</button>
        </div>
        <div class="passenger-list passengers-grid" id="allPassengersContainer">
            <!-- Populated by JS -->
        </div>
    </div>
</div>

<div class="modal-overlay" id="editPassengerModal">
  <div class="modal-content">
    <div class="modal-header">
      <h3>Edit Passenger</h3>
      <button class="modal-close" onclick="closeModal('editPassengerModal')">×</button>
    </div>
    <div class="modal-body">
      <input id="editPassengerName" placeholder="Name" class="form-input">
      <input id="editPassengerGender" placeholder="Gender" class="form-input">
      <input id="editPassengerContact" placeholder="Contact" class="form-input">
      <input id="editPassengerNationality" placeholder="Nationality" class="form-input">
      <input id="editPassengerPassport" placeholder="Passport" class="form-input">
      <button onclick="updatePassenger()" class="submit-btn">Save Changes</button>
    </div>
  </div>
</div>











    <!--FOOTER-->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/footer/footer.template.php';
    ?>
    </div>

    <script src="/pages/adminpage/js/script.js"></script>
</body>
</html>