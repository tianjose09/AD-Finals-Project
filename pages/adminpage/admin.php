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
        <h2 class="page-title">Manage Destinations</h2>
            
        <div class="destinations-carousel">
            <div class="carousel-container" id="carousel">
             <!-- Mercury -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">MERCURY</h3>
        <p class="card-detail">Explore the closest planet to the Sun with our heat-resistant observation pods.</p>
        <p class="card-detail"><strong>Price:</strong> $35,000</p>
        <p class="card-detail"><strong>Distance:</strong> 91 million km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(1)">✎</button>
    <div class="action-menu" id="menu-1">
        <div class="menu-item" onclick="openEditModal(1)">Edit Destination</div>
    </div>
</div>

<!-- Venus -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">VENUS</h3>
        <p class="card-detail">Float above the acidic clouds in our specialized atmospheric stations.</p>
        <p class="card-detail"><strong>Price:</strong> $38,000</p>
        <p class="card-detail"><strong>Distance:</strong> 41 million km</p>
    </div> 
    <button class="action-btn" onclick="toggleMenu(2)">✎</button>
    <div class="action-menu" id="menu-2">
        <div class="menu-item" onclick="openEditModal(2)">Edit Destination</div>
    </div>
</div>

<!-- Mars -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">MARS</h3>
        <p class="card-detail">Experience the red planet's breathtaking landscapes in our luxury biodomes.</p>
        <p class="card-detail"><strong>Price:</strong> $25,000</p>
        <p class="card-detail"><strong>Distance:</strong> 78 million km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(3)">✎</button>
    <div class="action-menu" id="menu-3">
        <div class="menu-item" onclick="openEditModal(3)">Edit Destination</div>
    </div>
</div>

<!-- Jupiter -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">JUPITER</h3>
        <p class="card-detail">Witness the gas giant's majestic storms from our orbital observation deck.</p>
        <p class="card-detail"><strong>Price:</strong> $42,000</p>
        <p class="card-detail"><strong>Distance:</strong> 628 million km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(4)">✎</button>
    <div class="action-menu" id="menu-4">
        <div class="menu-item" onclick="openEditModal(4)">Edit Destination</div>
    </div>
</div>

<!-- Saturn -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">SATURN</h3>
        <p class="card-detail">Fly through the iconic rings in our shielded observation craft.</p>
        <p class="card-detail"><strong>Price:</strong> $58,000</p>
        <p class="card-detail"><strong>Distance:</strong> 1.2 billion km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(5)">✎</button>
    <div class="action-menu" id="menu-5">
        <div class="menu-item" onclick="openEditModal(5)">Edit Destination</div>
    </div>
</div>

<!-- Uranus -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">URANUS</h3>
        <p class="card-detail">Visit the ice giant and witness its unique sideways rotation.</p>
        <p class="card-detail"><strong>Price:</strong> $65,000</p>
        <p class="card-detail"><strong>Distance:</strong> 2.6 billion km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(6)">✎</button>
    <div class="action-menu" id="menu-6">
        <div class="menu-item" onclick="openEditModal(6)">Edit Destination</div>
    </div>
</div>

<!-- Neptune -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">NEPTUNE</h3>
        <p class="card-detail">Experience the deep blue winds of our solar system's outermost planet.</p>
        <p class="card-detail"><strong>Price:</strong> $75,000</p>
        <p class="card-detail"><strong>Distance:</strong> 4.3 billion km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(7)">✎</button>
    <div class="action-menu" id="menu-7">
        <div class="menu-item" onclick="openEditModal(7)">Edit Destination</div>
    </div>
</div>

<!-- Pluto -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">PLUTO</h3>
        <p class="card-detail">A remote icy world on the edge of the solar system with stunning views of the Kuiper Belt.</p>
        <p class="card-detail"><strong>Price:</strong> $12,000</p>
        <p class="card-detail"><strong>Distance:</strong> 5.9 billion km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(8)">✎</button>
    <div class="action-menu" id="menu-8">
        <div class="menu-item" onclick="openEditModal(8)">Edit Destination</div>
    </div>
</div>

<!-- Moon -->
<div class="destination-card">
    <div class="card-content">
        <h3 class="planet-name">MOON</h3>
        <p class="card-detail">Our closest celestial neighbor with stunning Earthrises and low-gravity fun.</p>
        <p class="card-detail"><strong>Price:</strong> $12,000</p>
        <p class="card-detail"><strong>Distance:</strong> 384,400 km</p>
    </div>
    <button class="action-btn" onclick="toggleMenu(9)">✎</button>
    <div class="action-menu" id="menu-9">
        <div class="menu-item" onclick="openEditModal(9)">Edit Destination</div>
    </div>
</div>
            
    </div> 

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
                <label>Time</label>
                <input type="time" name="time" required>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" required>
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