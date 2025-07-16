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
        const totalSlides = Math.ceil(cards.length / 3); 

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
    },
    2: {
        name: "MARIA GARCIA",
        email: "maria.garcia@example.com",
        contact: "+34 600 123 456",
        birthday: "1990-11-22",
        nationality: "Spain",
        passport: "ES98765432",
    },
    3: {
        name: "LI WEI",
        email: "li.wei@example.com",
        contact: "+86 138 1234 5678",
        birthday: "2015-03-08",
        nationality: "China",
        passport: "CN87654321",
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


function openEditModal(id) {
    currentDestinationId = id;
    const dest = destinationData[id];
    
    document.getElementById('editName').value = dest.name;
    document.getElementById('editDesc').value = dest.description;
    document.getElementById('editPrice').value = dest.price;
    document.getElementById('editDistance').value = dest.distance;
    
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
    
    openModal('editPassengerModal');
}

function updateDestination() {
    // Get updated values from form
    const name = document.getElementById('editName').value;
    const description = document.getElementById('editDesc').value;
    const price = document.getElementById('editPrice').value;
    const distance = document.getElementById('editDistance').value;

    // Update the destination data
    destinationData[currentDestinationId] = {
        ...destinationData[currentDestinationId],
        name,
        description,
        price,
        distance
    };
    
    alert(`Destination ${name} updated successfully!`);
    closeModal('editModal');
}

   document.querySelector('.create-btn').addEventListener('click', () => {
    sendFlightRequest("create");
});

document.querySelector('.delete-btn').addEventListener('click', () => {
    const confirmDelete = confirm("Are you sure you want to delete this schedule?");
    if (confirmDelete) {
        sendFlightRequest("delete");
    }
});

document.querySelector('.update-btn').addEventListener('click', (e) => {
    e.preventDefault();
    sendFlightRequest("update");
});



function updatePassenger() {
    // Get updated values from form
    const name = document.getElementById('editPassengerName').value;
    const email = document.getElementById('editPassengerEmail').value;
    const contact = document.getElementById('editPassengerContact').value;
    const birthday = document.getElementById('editPassengerBirthday').value;
    const nationality = document.getElementById('editPassengerNationality').value;
    const passport = document.getElementById('editPassengerPassport').value;
    
    // Update the passenger data
    passengerData[currentPassengerId] = {
        name,
        email,
        contact,
        birthday,
        nationality,
        passport,
        
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







function updateDestination() {
    const priceInput = document.getElementById('editPrice').value;
    const numericPrice = parseFloat(priceInput.replace(/[^\d.]/g, ''));

    if (isNaN(numericPrice)) {
        alert('Please enter a valid price.');
        return;
    }

    const destinationName = destinationData[currentDestinationId].name;

    fetch('/utils/handleflight.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            name: destinationName,
            price: numericPrice
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`₱${numericPrice.toLocaleString()} for ${destinationName} updated successfully!`);
            destinationData[currentDestinationId].price = `₱${numericPrice.toLocaleString()}`;
            closeModal('editModal');
            location.reload();
        } else {
            alert('Failed to update price.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while updating price.');
    });
}

function formatPHP(price) {
    return `₱${Number(price).toLocaleString()}`;
}


document.addEventListener('DOMContentLoaded', function () {
    const accountItem = document.querySelector('.account-item');

    if (accountItem) {
        accountItem.addEventListener('click', function (e) {
            e.stopPropagation();
            this.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (!accountItem.contains(e.target)) {
                accountItem.classList.remove('active');
            }
        });
    }

    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            alert('Logging out...');
            window.location.href = '/main.php?logout=1';
        });
    }

    // Auto scroll to sections
    const flightBtn = document.getElementById('flight-schedule-btn');
    const passengerBtn = document.getElementById('passenger-management-btn');

    flightBtn?.addEventListener('click', () => {
        const section = document.getElementById('flight-schedule-control');
        if (section) section.scrollIntoView({ behavior: 'smooth' });
    });

    passengerBtn?.addEventListener('click', () => {
        const section = document.getElementById('passenger-management');
        if (section) section.scrollIntoView({ behavior: 'smooth' });
    });
});


async function sendFlightRequest(mode) {
    const form = document.getElementById("scheduleForm");

    const destination = form.destination.value.trim();
    const departure_date = form.departure_date.value;
    const departure_time = form.departure_time.value;
    const return_date = form.return_date.value;
    const return_time = form.return_time.value;

    const departure_datetime = `${departure_date} ${departure_time}`;
    const return_datetime = `${return_date} ${return_time}`;

    // You can optionally include price field if needed (e.g., for update)
    const price = prompt("Enter price (₱):", "10000");
if (!price) {
    alert("Price is required.");
    return;
}
const numericPrice = parseFloat(price.replace(/[^\d.]/g, ''));
if (isNaN(numericPrice)) {
    alert("Invalid price entered.");
    return;
}


    if (!destination || !departure_date || !departure_time || !return_date || !return_time || isNaN(numericPrice)) {
        alert("Please fill all fields correctly.");
        return;
    }

    const response = await fetch("/utils/handleflight.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            mode,
            destination,
            departure_datetime,
            return_datetime,
            price: numericPrice
        })
    });

    const result = await response.json();
    alert(result.message);
}