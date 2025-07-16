<?php
$requiredRole = 'admin';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/handleaccount.php';
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
    include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/navbar/navbar.template.php';
    ?>


    <div class="admin-container"> 

        <div class="carousel-dots" id="dots-container">
            <!-- Dots will be added dynamically -->
        </div>

     <h2 class="page-title flight-schedule-title">Flight Schedule Control</h2>

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
        <h2 class="page-title">Passenger Management</h2>

        <div class="passengers-grid">
            <!-- Passenger Card 1 -->
            <div class="passenger-card">
                <div class="card-content">
                    <h3 class="card-title">JOHN SMITH </h3>
                    <p class="card-detail"><strong>Email:</strong> john.smith@gmail.com</p>
                    <p class="card-detail"><strong>Contact:</strong> +1 (555) 123-4567</p>
                    <p class="card-detail"><strong>Birthday:</strong> 05/15/1985</p>
                    <p class="card-detail"><strong>Nationality:</strong> United States</p>
                    <p class="card-detail"><strong>Passport:</strong> US12345678</p>
                </div>
                <button class="action-btn" onclick="togglePassengerMenu(1)">⋮</button>
                <div class="action-menu" id="passenger-menu-1">
                    <div class="menu-item" onclick="openPassengerEditModal(1)">Edit Passenger</div>
                </div>
            </div>

            <!-- Passenger Card 2 -->
            <div class="passenger-card">
                <div class="card-content">
                    <h3 class="card-title">MARIA GARCIA</h3>
                    <p class="card-detail"><strong>Email:</strong> maria.garcia@gmail.com</p>
                    <p class="card-detail"><strong>Contact:</strong> +34 600 123 456</p>
                    <p class="card-detail"><strong>Birthday:</strong> 11/22/1990</p>
                    <p class="card-detail"><strong>Nationality:</strong> Spain</p>
                    <p class="card-detail"><strong>Passport:</strong> ES98765432</p>
                </div>
                <button class="action-btn" onclick="togglePassengerMenu(2)">⋮</button>
                <div class="action-menu" id="passenger-menu-2">
                    <div class="menu-item" onclick="openPassengerEditModal(2)">Edit Passenger</div>
                </div>
            </div>

            <!-- Passenger Card 3 -->
            <div class="passenger-card">
                <div class="card-content">
                    <h3 class="card-title">LI WEI</h3>
                    <p class="card-detail"><strong>Email:</strong> li.wei@gmail.com</p>
                    <p class="card-detail"><strong>Contact:</strong> +86 138 1234 5678</p>
                    <p class="card-detail"><strong>Birthday:</strong> 03/08/2015</p>
                    <p class="card-detail"><strong>Nationality:</strong> China</p>
                    <p class="card-detail"><strong>Passport:</strong> CN87654321</p>
                </div>
                <button class="action-btn" onclick="togglePassengerMenu(3)">⋮</button>
                <div class="action-menu" id="passenger-menu-3">
                    <div class="menu-item" onclick="openPassengerEditModal(3)">Edit Passenger</div>
                </div>
            </div>
        </div>

        <div class="action-buttons-container">
            <button class="action-btn-large secondary-btn" onclick="openModal('allPassengersModal')">
                <span></span> View All Passengers
            </button>
            

    <!-- Edit Destination Modal -->
    <div class="modal-overlay" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">EDIT DESTINATION</h3>
                <button class="modal-close" onclick="closeModal('editModal')">×</button>
            </div>
            <div class="form-group">
                <label class="form-label">Destination Name</label>
                <input type="text" class="form-input" id="editName" placeholder="Enter destination name">
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-input" id="editDesc" rows="3" placeholder="Enter destination description"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Price</label>
                <input type="text" class="form-input" id="editPrice" placeholder="₱" value="₱">
            </div>
            <div class="form-group">
                <label class="form-label">Distance</label>
                <input type="text" class="form-input" id="editDistance" placeholder="Enter distance">
            </div>
            
            <div class="modal-actions">
                <button class="modal-btn modal-btn-secondary" onclick="closeModal('editModal')">Cancel</button>
                <button class="modal-btn modal-btn-primary" onclick="updateDestination()">Update Destination</button>
            </div>
        </div>
    </div>

    
    <!-- All Passengers Modal -->
    <div class="modal-overlay all-passengers-modal" id="allPassengersModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">ALL PASSENGERS</h3>
                <button class="modal-close" onclick="closeModal('allPassengersModal')">×</button>
            </div>
            <table class="passengers-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>JOHN SMITH</td>
                        <td>john.smith@gmail.com</td>
                        <td>+1 (555) 123-4567</td>
                    </tr>
                    <tr>
                        <td>MARIA GARCIA</td>
                        <td>maria.garcia@gmail.com</td>
                        <td>+34 600 123 456</td>
                    </tr>
                    <tr>
                        <td>LI WEI</td>
                        <td>li.wei@gmail.com</td>
                        <td>+86 138 1234 5678</td>
                    </tr>
                    <tr>
                        <td>EMMA JOHNSON</td>
                        <td>emma.j@gmail.com</td>
                        <td>+44 7700 900123</td>
                    </tr>
                    <tr>
                        <td>AHMED KHAN</td>
                        <td>ahmed.k@gmail.com</td>
                        <td>+971 50 123 4567</td>
                    </tr>
                    <tr>
                        <td>SOFIA MÜLLER</td>
                        <td>sofia.m@gmail.com</td>
                        <td>+49 151 12345678</td>
                    </tr>
                    <tr>
                        <td>JAMES WILSON</td>
                        <td>james.w@gmail.com</td>
                        <td>+61 412 345 678</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--FOOTER-->
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/footer/footer.template.php';
    ?>
    </div>

    <script src="/pages/adminpage/js/script.js"></script>
    <script src="/components/templates/navbar/assets/js/navbar.js"></script>
</body>
</html>