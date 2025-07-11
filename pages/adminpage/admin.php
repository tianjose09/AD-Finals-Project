
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teddiursa Airlines - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Twinkling Stars Background -->
    <div class="stars" id="stars"></div>
    
    <header class="cosmic-header">
        <h1>TEDDIURSA AIRLINES</h1>
        <div class="admin-text">ADMIN</div>
    </header>

    <!-- NAVBAR -->
    <nav class="navbar">
        <!-- Logo -->
        <div class="logo">
            <img src="images/LOGO White.png" alt="Teddiursa Airlines Logo" draggable="false">
        </div>
        
        <div class="nav-items-container">
            <div class="nav-item">
                <div class="nav-icon">
                    <img src="images/account.png" alt="Account" draggable="false">
                </div>
                <span class="nav-text">Account</span>
            </div>
            
            <div class="nav-item">
                <div class="nav-icon">
                    <img src="images/explore.png" alt="Explore" draggable="false">
                </div>
                <span class="nav-text">Explore</span>
            </div>

            <div class="nav-item">
                <div class="nav-icon">
                    <img src="images/book.png" alt="Book a trip" draggable="false">
                </div>
                <span class="nav-text">Book a trip</span>
            </div>

            <div class="nav-item">
                <div class="nav-icon">
                    <img src="images/aboutus.png" alt="About Us" draggable="false">
                    </div>
                <span class="nav-text">About Us</span>
            </div>
        </div>
    </nav>

    <div class="admin-container">
        <h2 class="page-title">Manage Destinations</h2>

        <div class="destinations-grid">
            <!-- Destination Card 1 -->
            <div class="destination-card">
                <img src="images/MARS.png" alt="Mars Colony" class="card-image">
                <div class="card-content">
                    <h3 class="planet-name">MARS</h3>
                    <p class="card-detail">Experience the red planet's breathtaking landscapes in our luxury biodomes.</p>
                    <p class="card-detail"><strong>Price:</strong> $25,000</p>
                    <p class="card-detail"><strong>Duration:</strong> 14 Earth days</p>
                    <p class="card-detail"><strong>Gravity:</strong> 0.38g</p>
                </div>
                <button class="action-btn" onclick="toggleMenu(1)">✎</button>
                <div class="action-menu" id="menu-1">
                    <div class="menu-item" onclick="openEditModal(1)">Edit Destination</div>
                    <div class="menu-item" onclick="openDeleteModal(1)">Delete Destination</div>
                </div>
            </div>

            <!-- Destination Card 2 -->
            <div class="destination-card">
                <img src="images/JUPITER.png" alt="Jupiter View" class="card-image">
                <div class="card-content">
                    <h3 class="planet-name">JUPITER</h3>
                    <p class="card-detail">Witness the gas giant's majestic storms from our orbital observation deck.</p>
                    <p class="card-detail"><strong>Price:</strong> $42,000</p>
                    <p class="card-detail"><strong>Duration:</strong> 21 Earth days</p>
                    <p class="card-detail"><strong>Gravity:</strong> Microgravity</p>
                </div>
                <button class="action-btn" onclick="toggleMenu(2)">✎</button>
                <div class="action-menu" id="menu-2">
                    <div class="menu-item" onclick="openEditModal(2)">Edit Destination</div>
                    <div class="menu-item" onclick="openDeleteModal(2)">Delete Destination</div>
                </div>
            </div>

            <!-- Destination Card 3 -->
            <div class="destination-card">
                <img src="images/SATURN.png" alt="Saturn Rings" class="card-image">
                <div class="card-content">
                    <h3 class="planet-name">SATURN</h3>
                    <p class="card-detail">Fly through the iconic rings in our shielded observation craft.</p>
                    <p class="card-detail"><strong>Price:</strong> $58,000</p>
                    <p class="card-detail"><strong>Duration:</strong> 30 Earth days</p>
                    <p class="card-detail"><strong>Gravity:</strong> Microgravity</p>
                </div>
                <button class="action-btn" onclick="toggleMenu(3)">✎</button>
                <div class="action-menu" id="menu-3">
                    <div class="menu-item" onclick="openEditModal(3)">Edit Destination</div>
                    <div class="menu-item" onclick="openDeleteModal(3)">Delete Destination</div>
                </div>
            </div>
        </div>

        <div class="add-btn-container">
            <button class="add-btn" onclick="openAddModal()">
                <span>+</span> New Cosmic Destination
            </button>
        </div>

    <!-- Flight Schedule Control Section -->
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
            <!-- Submit Button OUTSIDE the rounded box -->
            <div class="submit-container">
                <button type="submit" class="submit-btn">Update Schedule</button>
            </div>
        </form>
<!-- Passenger Management Section -->
        <h2 class="page-title">Passenger Management</h2>

        <div class="passengers-grid">
            <!-- Passenger Card 1 -->
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
                    <div class="menu-item" onclick="openPassengerDeleteModal(1)">Delete Passenger</div>
                </div>
            </div>

            <!-- Passenger Card 2 -->
            <div class="passenger-card">
                <div class="card-content">
                    <h3 class="card-title">MARIA GARCIA <span class="type-indicator type-economy">ECONOMY</span></h3>
                    <p class="card-detail"><strong>Email:</strong> maria.garcia@example.com</p>
                    <p class="card-detail"><strong>Contact:</strong> +34 600 123 456</p>
                    <p class="card-detail"><strong>Birthday:</strong> 11/22/1990</p>
                    <p class="card-detail"><strong>Nationality:</strong> Spain</p>
                    <p class="card-detail"><strong>Passport:</strong> ES98765432</p>
                </div>
                <button class="action-btn" onclick="togglePassengerMenu(2)">⋮</button>
                <div class="action-menu" id="passenger-menu-2">
                    <div class="menu-item" onclick="openPassengerEditModal(2)">Edit Passenger</div>
                    <div class="menu-item" onclick="openPassengerDeleteModal(2)">Delete Passenger</div>
                </div>
            </div>

            <!-- Passenger Card 3 -->
            <div class="passenger-card">
                <div class="card-content">
                    <h3 class="card-title">LI WEI <span class="type-indicator type-first">FIRST CLASS</span></h3>
                    <p class="card-detail"><strong>Email:</strong> li.wei@example.com</p>
                    <p class="card-detail"><strong>Contact:</strong> +86 138 1234 5678</p>
                    <p class="card-detail"><strong>Birthday:</strong> 03/08/2015</p>
                    <p class="card-detail"><strong>Nationality:</strong> China</p>
                    <p class="card-detail"><strong>Passport:</strong> CN87654321</p>
                </div>
                <button class="action-btn" onclick="togglePassengerMenu(3)">⋮</button>
                <div class="action-menu" id="passenger-menu-3">
                    <div class="menu-item" onclick="openPassengerEditModal(3)">Edit Passenger</div>
                    <div class="menu-item" onclick="openPassengerDeleteModal(3)">Delete Passenger</div>
                </div>
            </div>
        </div>

        <div class="action-buttons-container">
            <button class="action-btn-large secondary-btn" onclick="openModal('allPassengersModal')">
                <span></span> View All Passengers
            </button>
            <button class="action-btn-large" onclick="openPassengerAddModal()">
                <span></span> Add New Passenger
            </button>
        </div>
    </div>
    <!-- Add Destination Modal -->
    <div class="modal-overlay" id="addModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">ADD NEW DESTINATION</h3>
                <button class="modal-close" onclick="closeModal('addModal')">×</button>
            </div>
            <div class="form-group">
                <label class="form-label">Destination Name</label>
                <input type="text" class="form-input" placeholder="Enter destination name">
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-input" rows="3" placeholder="Enter destination description"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Price</label>
                <input type="text" class="form-input" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label class="form-label">Duration</label>
                <input type="text" class="form-input" placeholder="Enter duration">
            </div>
            <div class="form-group">
                <label class="form-label">Gravity</label>
                <input type="text" class="form-input" placeholder="Enter gravity information">
            </div>
            <div class="form-group">
                <label class="form-label">Image URL</label>
                <input type="text" class="form-input" placeholder="Enter image URL">
            </div>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-secondary" onclick="closeModal('addModal')">Cancel</button>
                <button class="modal-btn modal-btn-primary" onclick="saveDestination()">Save Destination</button>
            </div>
        </div>
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
                <label class="form-label">Duration</label>
                <input type="text" class="form-input" id="editDuration" placeholder="Enter duration">
            </div>
            <div class="form-group">
                <label class="form-label">Gravity</label>
                <input type="text" class="form-input" id="editGravity" placeholder="Enter gravity information">
            </div>
            <div class="form-group">
                <label class="form-label">Image URL</label>
                <input type="text" class="form-input" id="editImage" placeholder="Enter image URL">
            </div>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-secondary" onclick="closeModal('editModal')">Cancel</button>
                <button class="modal-btn modal-btn-primary" onclick="updateDestination()">Update Destination</button>
            </div>
        </div>
    </div>
