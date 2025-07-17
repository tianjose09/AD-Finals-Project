function createStars() {
    const starsContainer = document.getElementById('stars');
    const starsCount = 200;

    for (let i = 0; i < starsCount; i++) {
        const star = document.createElement('div');
        star.className = 'star';

        const size = Math.random() * 2 + 1;
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;

        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;

        const opacity = Math.random() * 0.5 + 0.3;
        star.style.setProperty('--opacity', opacity);

        const duration = Math.random() * 3 + 2;
        star.style.setProperty('--duration', `${duration}s`);

        const delay = Math.random() * 5;
        star.style.animationDelay = `${delay}s`;

        starsContainer.appendChild(star);
    }
}

let currentSlide = 0;
const carousel = document.getElementById('carousel');
const cards = document.querySelectorAll('.destination-card');
const dotsContainer = document.getElementById('dots-container');
const totalSlides = Math.ceil(cards.length / 3);

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

function updateDots() {
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentSlide);
    });
}

function goToSlide(slideIndex) {
    currentSlide = slideIndex;
    const offset = -currentSlide * 100;
    if (carousel) {
        carousel.style.transform = `translateX(${offset}%)`;
    }
    updateDots();
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    goToSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    goToSlide(currentSlide);
}

let passengerData = {};

function loadPassengersFromDB() {
    fetch('/handlers/passengers.handler.php')
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                passengerData = {};
                const grid = document.getElementById('allPassengersContainer');
                grid.innerHTML = '';

                data.data.forEach((p) => {
                    const id = p.id;
                    passengerData[id] = p;

                    const card = document.createElement('div');
                    card.className = 'passenger-card';
                    card.innerHTML = `
                        <div class="card-content">
                            <h3 class="card-title">${p.passenger_name}</h3>
                            <p><strong>Contact:</strong> ${p.contact_number}</p>
                            <p><strong>Gender:</strong> ${p.gender}</p>
                            <p><strong>Nationality:</strong> ${p.nationality}</p>
                            <p><strong>Passport:</strong> ${p.passport_number}</p>
                        </div>
                        <button class="action-btn" onclick="togglePassengerMenu('${id}')">⋮</button>
                        <div class="action-menu" id="passenger-menu-${id}">
                            <div class="menu-item" onclick="openPassengerEditModal('${id}')">Edit Passenger</div>
                            <div class="menu-item" onclick="deletePassenger('${id}')">Delete Passenger</div>
                        </div>
                    `;
                    grid.appendChild(card);
                });
            } else {
                alert('Failed to load passengers.');
            }
        });
}

window.addEventListener('load', createStars);

// 🌐 Dropdown & Navigation
window.addEventListener('load', createStars);
document.addEventListener('DOMContentLoaded', function() {
            const accountItem = document.querySelector('.account-item');
            
    
            accountItem.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
            });
       
            document.addEventListener('click', function(e) {
                if (!accountItem.contains(e.target)) {
                    accountItem.classList.remove('active');
                }
            });
            
            // Handle logout button click
            const logoutBtn = document.querySelector('.logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    window.location.href = '/main.php?logout=1';
                    alert('Logging out...');
                    // window.location.href = '/logout';
                });
            }
        });

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


function deletePassenger(id) {
    const confirmed = confirm("Are you sure you want to delete this passenger?");
    if (!confirmed) return;

    fetch('/handlers/deletepassenger.handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            loadPassengersFromDB();
        })
        .catch(err => {
            console.error('Delete error:', err);
            alert("An error occurred while deleting.");
        });
}

let currentPassengerId = null;

function togglePassengerMenu(id) {
    document.querySelectorAll('.action-menu').forEach(menu => {
        if (menu.id !== 'passenger-menu-' + id) {
            menu.classList.remove('show');
        }
    });

    const menu = document.getElementById('passenger-menu-' + id);
    menu.classList.toggle('show');
    currentPassengerId = id;
}

function openPassengerEditModal(id) {
    currentPassengerId = id;
    const p = passengerData[id];

    document.getElementById('editPassengerName').value = p.passenger_name;
    document.getElementById('editPassengerGender').value = p.gender;
    document.getElementById('editPassengerContact').value = p.contact_number;
    document.getElementById('editPassengerNationality').value = p.nationality;
    document.getElementById('editPassengerPassport').value = p.passport_number;

    openModal('editPassengerModal');
}

function openModal(modalId) {
    document.getElementById(modalId).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
    document.body.style.overflow = 'auto';
}

function updatePassenger() {
    const id = currentPassengerId;

    const updated = {
        id,
        passenger_name: document.getElementById('editPassengerName').value.trim(),
        gender: document.getElementById('editPassengerGender').value,
        contact_number: document.getElementById('editPassengerContact').value,
        nationality: document.getElementById('editPassengerNationality').value,
        passport_number: document.getElementById('editPassengerPassport').value,
    };

    fetch('/handlers/updatepassenger.handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(updated)
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Passenger updated successfully.");
                closeModal('editPassengerModal');
                loadPassengersFromDB();
            } else {
                alert("Failed to update passenger.");
            }
        })
        .catch(err => {
            console.error('Update error:', err);
            alert("Error updating passenger.");
        });
}

function updateDestination() {
    const priceInput = document.getElementById('editPrice').value;
    const numericPrice = parseFloat(priceInput.replace(/[^\d.]/g, ''));

    if (isNaN(numericPrice)) {
        alert('Please enter a valid price.');
        return;
    }

    const destinationName = destinationData[currentDestinationId].name;

    fetch('/handlers/flight.handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
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

// Initialize everything on page load
window.addEventListener('load', function () {
    createStars();
    initDots();
    loadPassengersFromDB();

    const carouselWrapper = document.querySelector('.destinations-carousel');
    let carouselInterval = setInterval(nextSlide, 5000);

    carouselWrapper?.addEventListener('mouseenter', () => clearInterval(carouselInterval));
    carouselWrapper?.addEventListener('mouseleave', () => {
        carouselInterval = setInterval(nextSlide, 5000);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const logoutBtn = document.querySelector('.logout-btn');
    logoutBtn?.addEventListener('click', () => {
        alert('Logging out...');
        window.location.href = '/main.php?logout=1';
    });

    document.getElementById("scheduleForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        const destination = formData.get('destination');
        alert(`Flight schedule to ${destination} updated successfully!`);
        e.target.reset();
    });

    document.querySelector('.create-btn')?.addEventListener('click', () => sendFlightRequest("create"));
    document.querySelector('.delete-btn')?.addEventListener('click', () => {
        if (confirm("Are you sure you want to delete this schedule?")) {
            sendFlightRequest("delete");
        }
    });
    document.querySelector('.update-btn')?.addEventListener('click', e => {
        e.preventDefault();
        sendFlightRequest("update");
    });

    window.addEventListener('resize', () => goToSlide(currentSlide));
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

    const response = await fetch("/handlers/flight.handler.php", {
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
