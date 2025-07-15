function createStars() {
    const starsContainer = document.getElementById('stars');
    const starsCount = 200;
    
    for (let i = 0; i < starsCount; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        
        // Random size between 1 and 3px
        const size = Math.random() * 2 + 1;
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        
        // Random position
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        
        // Random opacity (between 0.3 and 0.8)
        const opacity = Math.random() * 0.5 + 0.3;
        star.style.setProperty('--opacity', opacity);
        
        // Random animation duration (between 2 and 5 seconds)
        const duration = Math.random() * 3 + 2;
        star.style.setProperty('--duration', `${duration}s`);
        
        // Random delay (between 0 and 5 seconds)
        const delay = Math.random() * 5;
        star.style.animationDelay = `${delay}s`;
        
        starsContainer.appendChild(star);
    }
}

// Carousel functionality
let currentSlide = 0;
const carousel = document.getElementById('carousel');
const cards = document.querySelectorAll('.destination-card');
const dotsContainer = document.getElementById('dots-container');
const totalSlides = Math.ceil(cards.length / 3); // Showing 3 cards at a time

// Initialize dots
function initDots() {
    dotsContainer.innerHTML = '';
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('div');
        dot.className = 'dot';
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(i));
        dotsContainer.appendChild(dot);
    }
}

// Update dots
function updateDots() {
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        if (index === currentSlide) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
}

// Go to specific slide
function goToSlide(slideIndex) {
    currentSlide = slideIndex;
    const offset = -currentSlide * 100;
    carousel.style.transform = `translateX(${offset}%)`;
    updateDots();
}

// Next slide
function nextSlide() {
    if (currentSlide < totalSlides - 1) {
        currentSlide++;
    } else {
        currentSlide = 0;
    }
    goToSlide(currentSlide);
}

// Previous slide
function prevSlide() {
    if (currentSlide > 0) {
        currentSlide--;
    } else {
        currentSlide = totalSlides - 1;
    }
    goToSlide(currentSlide);
}

// Call the function when the page loads
window.addEventListener('load', function() {
    createStars();
    initDots();
    
    // Set up auto-rotation for the carousel
    let carouselInterval = setInterval(nextSlide, 5000);
    
    // Pause auto-rotation when hovering over carousel
    const carouselWrapper = document.querySelector('.destinations-carousel');
    carouselWrapper.addEventListener('mouseenter', () => {
        clearInterval(carouselInterval);
    });
    
    carouselWrapper.addEventListener('mouseleave', () => {
        carouselInterval = setInterval(nextSlide, 5000);
    });
});

// Current destination being edited/deleted
let currentDestinationId = null;
const destinationData = {
    1: {
        name: "MERCURY",
        description: "Explore the closest planet to the Sun with our heat-resistant observation pods.",
        price: "$35,000",
        distance: "91 million km"
    },
    2: {
        name: "VENUS",
        description: "Float above the acidic clouds in our specialized atmospheric stations.",
        price: "$38,000",
        distance: "41 million km"
    },
    3: {
        name: "EARTH",
        description: "Rediscover your home planet from our exclusive orbital resorts.",
        price: "$15,000",
        distance: "0 km"
    },
    4: {
        name: "MARS",
        description: "Experience the red planet's breathtaking landscapes in our luxury biodomes.",
        price: "$25,000",
        distance: "78 million km"
    },
    5: {
        name: "JUPITER",
        description: "Witness the gas giant's majestic storms from our orbital observation deck.",
        price: "$42,000",
        distance: "628 million km"
    },
    6: {
        name: "SATURN",
        description: "Fly through the iconic rings in our shielded observation craft.",
        price: "$58,000",
        distance: "1.2 billion km"
    },
    7: {
        name: "URANUS",
        description: "Visit the ice giant and witness its unique sideways rotation.",
        price: "$65,000",
        distance: "2.6 billion km"
    },
    8: {
        name: "NEPTUNE",
        description: "Experience the deep blue winds of our solar system's outermost planet.",
        price: "$75,000",
        distance: "4.3 billion km"
    },
    9: {
        name: "MOON",
        description: "Our closest celestial neighbor with stunning Earthrises and low-gravity fun.",
        price: "$12,000",
        distance: "384,400 km"
    }
};

// Current passenger being edited
let currentPassengerId = null;
const passengerData = {
    1: {
        name: "JOHN SMITH",
        email: "john.smith@example.com",
        contact: "+1 (555) 123-4567",
        birthday: "1985-05-15",
        nationality: "United States",
        passport: "US12345678",
        type: "business"
    },
    2: {
        name: "MARIA GARCIA",
        email: "maria.garcia@example.com",
        contact: "+34 600 123 456",
        birthday: "1990-11-22",
        nationality: "Spain",
        passport: "ES98765432",
        type: "economy"
    },
    3: {
        name: "LI WEI",
        email: "li.wei@example.com",
        contact: "+86 138 1234 5678",
        birthday: "2015-03-08",
        nationality: "China",
        passport: "CN87654321",
        type: "first"
    }
};

// Toggle action menu visibility for destinations
function toggleMenu(id) {
    // Hide all menus first
    document.querySelectorAll('.action-menu').forEach(menu => {
        if (!menu.id.startsWith('passenger-menu-') && menu.id !== 'menu-' + id) {
            menu.classList.remove('show');
        }
    });
    
    // Toggle the selected menu
    const menu = document.getElementById('menu-' + id);
    menu.classList.toggle('show');
    currentDestinationId = id;
}

// Toggle action menu visibility for passengers
function togglePassengerMenu(id) {
    // Hide all menus first
    document.querySelectorAll('.action-menu').forEach(menu => {
        if (menu.id !== 'passenger-menu-' + id) {
            menu.classList.remove('show');
        }
    });
    
    // Toggle the selected menu
    const menu = document.getElementById('passenger-menu-' + id);
    menu.classList.toggle('show');
    currentPassengerId = id;
}

// Close menus when clicking elsewhere
document.addEventListener('click', function(e) {
    if (!e.target.classList.contains('action-btn') && 
        !e.target.closest('.action-menu')) {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.classList.remove('show');
        });
    }
});

// Modal functions
function openModal(modalId) {
    document.getElementById(modalId).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
    document.body.style.overflow = 'auto';
}

function openAddModal() {
    openModal('addModal');
}

function openPassengerAddModal() {
    openModal('addPassengerModal');
}

function openEditModal(id) {
    currentDestinationId = id;
    const dest = destinationData[id];

    document.getElementById('editName').value = dest.name;
    document.getElementById('editDesc').value = dest.description;
    document.getElementById('editPrice').value = dest.price;
    document.getElementById('editDuration').value = dest.distance;
    document.getElementById('editGravity').value = "3.7 m/s²"; // Example gravity value
    
    openModal('editModal');
}

function openPassengerEditModal(id) {
    currentPassengerId = id;
    const passenger = passengerData[id];
    
    document.getElementById('editPassengerName').value = passenger.name;
    document.getElementById('editPassengerEmail').value = passenger.email;
    document.getElementById('editPassengerContact').value = passenger.contact;
    document.getElementById('editPassengerBirthday').value = passenger.birthday;
    document.getElementById('editPassengerNationality').value = passenger.nationality;
    document.getElementById('editPassengerPassport').value = passenger.passport;
    document.getElementById('editPassengerType').value = passenger.type;
    
    openModal('editPassengerModal');
}

function updateDestination() {
    // Get updated values from form
    const name = document.getElementById('editName').value;
    const description = document.getElementById('editDesc').value;
    const price = document.getElementById('editPrice').value;
    const distance = document.getElementById('editDuration').value;
    
    // Update the destination data
    destinationData[currentDestinationId] = {
        ...destinationData[currentDestinationId],
        name,
        description,
        price,
        distance
    };
    
    // In a real app, you would send this to the server here
    alert(`Destination ${name} updated successfully!`);
    closeModal('editModal');
}

function updatePassenger() {
    // Get updated values from form
    const name = document.getElementById('editPassengerName').value;
    const email = document.getElementById('editPassengerEmail').value;
    const contact = document.getElementById('editPassengerContact').value;
    const birthday = document.getElementById('editPassengerBirthday').value;
    const nationality = document.getElementById('editPassengerNationality').value;
    const passport = document.getElementById('editPassengerPassport').value;
    const type = document.getElementById('editPassengerType').value;
    
    // Update the passenger data
    passengerData[currentPassengerId] = {
        name,
        email,
        contact,
        birthday,
        nationality,
        passport,
        type
    };
    
    // In a real app, you would send this to the server here
    alert(`Passenger ${name} updated successfully!`);
    closeModal('editPassengerModal');
    
    // Refresh the UI (in a real app, you might want to update just the changed card)
    location.reload();
}

function savePassenger() {
    // Get values from form
    const inputs = document.querySelectorAll('#addPassengerModal .form-input');
    const name = inputs[0].value;
    
    // In a real app, you would collect all form data and send to server
    alert(`New passenger ${name} added successfully!`);
    closeModal('addPassengerModal');
    
    // Refresh the UI (in a real app, you might want to append the new passenger)
    location.reload();
}

// Flight Schedule Form Submission
document.getElementById("scheduleForm").addEventListener("submit", function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(e.target);
    const destination = formData.get('destination');
    
    // In a real app, you would send this to the server
    alert(`Flight schedule to ${destination} updated successfully!`);
    
    // Reset form
    e.target.reset();
});

// Initialize the carousel on window resize
window.addEventListener('resize', function() {
    goToSlide(currentSlide);
});