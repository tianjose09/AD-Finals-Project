<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teddiursa Airlines - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/pages/adminpage/css/styles.css" />
    <link rel="stylesheet" href="/components/templates/navbar/assets/css/navbar.css" />
    <link rel="stylesheet" href="/components/templates/footer/assets/css/footer.css" />
</head>

<body>
    <!-- Twinkling Stars Background -->
    <div class="stars" id="stars"></div>

    <header class="cosmic-header">
        <h1>TEDDIURSA AIRLINES</h1>
        <div class="admin-text">ADMIN</div>
    </header>

    <!-- NAVBAR -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/navbar/navbar.template.php'; ?>

    <div class="admin-container">
        <h2 class="page-title">Manage Destinations</h2>

        <!-- Destinations Carousel -->
        <div class="destinations-carousel">
            <div class="carousel-container" id="carousel">
                <!-- Repeat destination cards -->
                <!-- Example: Mercury -->
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

                <!-- Repeat for other planets (Venus to Moon) -->
                <!-- ... [Omitted for brevity – your original content remains unchanged here] ... -->

            </div>

            <div class="carousel-dots" id="dots-container"></div>
        </div>

        <!-- Flight Schedule Control -->
        <h2 class="page-title flight-schedule-title">Flight Schedule Control</h2>
        <form id="scheduleForm">
            <div class="flight-container">
                <div class="form-row">
                    <div class="form-group">
                        <label>Destination (Planet/Moon)</label>
                        <select name="destination" required>
                            <option value="">Select Destination</option>
                            <optgroup label="Planets">
                                <option>Mercury</option>
                                <option>Venus</option>
                                <option>Earth</option>
                                <option>Mars</option>
                                <option>Jupiter</option>
                                <option>Saturn</option>
                                <option>Uranus</option>
                                <option>Neptune</option>
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

                    <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" name="capacity" placeholder="Enter seats" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" required>
                            <option>Onboard</option>
                            <option>Delayed</option>
                            <option>Cancelled</option>
                            <option>Scheduled</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="submit-container">
                <button type="submit" class="submit-btn">Update Schedule</button>
            </div>
        </form>

        <!-- Passenger Management -->
        <h2 class="page-title">Passenger Management</h2>
        <div class="passengers-grid">
            <!-- Passenger Cards -->
            <!-- Example: Passenger 1 -->
            <div class="passenger-card">
                <div class="card-content">
                    <h3 class="card-title">JOHN SMITH <span class="type-indicator type-business">BUSINESS CLASS</span></h3>
                    <p class="card-detail"><strong>Email:</strong> john.smith@example.com</p>
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

            <!-- Repeat for Passenger 2, 3, etc. -->
            <!-- ... -->
        </div>

        <!-- Passenger Actions -->
        <div class="action-buttons-container">
            <button class="action-btn-large secondary-btn" onclick="openModal('allPassengersModal')">
                <span></span> View All Passengers
            </button>
            <button class="action-btn-large" onclick="openPassengerAddModal()">
                <span>+</span> Add New Passenger
            </button>
        </div>

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
                    <input type="text" class="form-input" id="editPrice" placeholder="Enter price">
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

        <!-- Add Passenger Modal -->
        <div class="modal-overlay" id="addPassengerModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">ADD NEW PASSENGER</h3>
                    <button class="modal-close" onclick="closeModal('addPassengerModal')">×</button>
                </div>
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-input" placeholder="Enter passenger's full name">
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-input" placeholder="Enter passenger's email">
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Number</label>
                    <input type="tel" class="form-input" placeholder="Enter contact number">
                </div>
                <div class="form-group">
                    <label class="form-label">Birthday</label>
                    <input type="date" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Nationality</label>
                    <input type="text" class="form-input" placeholder="Enter nationality">
                </div>
                <div class="form-group">
                    <label class="form-label">Passport Number</label>
                    <input type="text" class="form-input" placeholder="Enter passport number">
                </div>
                <div class="form-group">
                    <label class="form-label">Passenger Type</label>
                    <select class="form-input">
                        <option value="economy">Economy</option>
                        <option value="business">Business Class</option>
                        <option value="firstclass">First Class</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button class="modal-btn modal-btn-secondary" onclick="closeModal('addPassengerModal')">Cancel</button>
                    <button class="modal-btn modal-btn-primary" onclick="addPassenger()">Add Passenger</button>
                </div>
            </div>
        </div>

    </div>

    <!-- FOOTER -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/components/templates/footer/footer.template.php'; ?>

    <!-- JavaScript -->
    <script src="/pages/adminpage/js/script.js"></script>
</body>
</html>
