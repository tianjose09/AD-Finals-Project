
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
