// Create twinkling stars
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

// Call the function when the page loads
window.addEventListener('load', createStars);

// Current destination being edited/deleted
let currentDestinationId = null;
const destinationData = {
    1: {
        name: "MARS COLONY",
        description: "Experience the red planet's breathtaking landscapes in our luxury biodomes.",
        price: "$25,000",
        duration: "14 Earth days",
        gravity: "0.38g",
        image: "https://images.unsplash.com/photo-1454789548928-9efd52dc4031?w=800"
    },
    2: {
        name: "JUPITER ORBIT",
        description: "Witness the gas giant's majestic storms from our orbital observation deck.",
        price: "$42,000",
        duration: "21 Earth days",
        gravity: "Microgravity",
        image: "https://images.unsplash.com/photo-1462331940025-496dfbfc7564?w=800"
    },
    3: {
        name: "SATURN RINGS",
        description: "Fly through the iconic rings in our shielded observation craft.",
        price: "$58,000",
        duration: "30 Earth days",
        gravity: "Microgravity",
        image: "https://images.unsplash.com/photo-1506318137071-a8e063b4bec0?w=800"
    }
};

// Current passenger being edited/deleted
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
}

// Close menus when clicking elsewhere
document.addEventListener('click', function(e) {
    if (!e.target.classList.contains('action-btn')) {
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
    document.getElementById('editDuration').value = dest.duration;
    document.getElementById('editGravity').value = dest.gravity;
    document.getElementById('editImage').value = dest.image;
    
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

function openDeleteModal(id) {
    currentDestinationId = id;
    openModal('deleteModal');
}

function openPassengerDeleteModal(id) {
    currentPassengerId = id;
    openModal('deletePassengerModal');
}

function saveDestination() {
    alert("New destination saved to database");
    closeModal('addModal');
}

function savePassenger() {
    alert("New passenger added successfully");
    closeModal('addPassengerModal');
}

function updateDestination() {
    alert(`Destination ${currentDestinationId} updated successfully`);
    closeModal('editModal');
}

function updatePassenger() {
    alert(`Passenger ${currentPassengerId} updated successfully`);
    closeModal('editPassengerModal');
}

function confirmDelete() {
    alert(`Destination ${currentDestinationId} permanently deleted`);
    closeModal('deleteModal');
}

function confirmPassengerDelete() {
    alert(`Passenger ${currentPassengerId} permanently deleted`);
    closeModal('deletePassengerModal');
}

// Flight Schedule Form Submission
document.getElementById("scheduleForm").addEventListener("submit", function (e) {
    e.preventDefault();
    alert("Flight schedule updated successfully!");
    // Place your actual update logic here
});