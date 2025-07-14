// Create twinkling stars
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

// Carousel
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
    carousel.style.transform = `translateX(${offset}%)`;
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

window.addEventListener('load', function () {
    createStars();
    initDots();
    let carouselInterval = setInterval(nextSlide, 5000);

    const carouselWrapper = document.querySelector('.destinations-carousel');
    carouselWrapper.addEventListener('mouseenter', () => clearInterval(carouselInterval));
    carouselWrapper.addEventListener('mouseleave', () => {
        carouselInterval = setInterval(nextSlide, 5000);
    });
});

window.addEventListener('resize', () => goToSlide(currentSlide));

/* --- DESTINATIONS --- */
let currentDestinationId = null;
const destinationData = {
    1: {
        name: "MERCURY",
        description: "Explore the closest planet to the Sun with our heat-resistant observation pods.",
        price: "$35,000",
        distance: "91 million km"
    },
    // ...
    9: {
        name: "MOON",
        description: "Our closest celestial neighbor with stunning Earthrises and low-gravity fun.",
        price: "$12,000",
        distance: "384,400 km"
    }
};

function toggleMenu(id) {
    document.querySelectorAll('.action-menu').forEach(menu => {
        if (!menu.id.startsWith('passenger-menu-') && menu.id !== 'menu-' + id) {
            menu.classList.remove('show');
        }
    });
    document.getElementById('menu-' + id).classList.toggle('show');
    currentDestinationId = id;
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

function updateDestination() {
    const name = document.getElementById('editName').value;
    const description = document.getElementById('editDesc').value;
    const price = document.getElementById('editPrice').value;
    const distance = document.getElementById('editDistance').value;

    destinationData[currentDestinationId] = { name, description, price, distance };
    alert(`Destination ${name} updated successfully!`);
    closeModal('editModal');
}

/* --- PASSENGERS --- */
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
    }
    // ...
};

function togglePassengerMenu(id) {
    document.querySelectorAll('.action-menu').forEach(menu => {
        if (menu.id !== 'passenger-menu-' + id) {
            menu.classList.remove('show');
        }
    });
    document.getElementById('passenger-menu-' + id).classList.toggle('show');
    currentPassengerId = id;
}

function openPassengerEditModal(id) {
    currentPassengerId = id;
    const p = passengerData[id];
    document.getElementById('editPassengerName').value = p.name;
    document.getElementById('editPassengerEmail').value = p.email;
    document.getElementById('editPassengerContact').value = p.contact;
    document.getElementById('editPassengerBirthday').value = p.birthday;
    document.getElementById('editPassengerNationality').value = p.nationality;
    document.getElementById('editPassengerPassport').value = p.passport;
    document.getElementById('editPassengerType').value = p.type;
    openModal('editPassengerModal');
}

function updatePassenger() {
    const name = document.getElementById('editPassengerName').value;
    const email = document.getElementById('editPassengerEmail').value;
    const contact = document.getElementById('editPassengerContact').value;
    const birthday = document.getElementById('editPassengerBirthday').value;
    const nationality = document.getElementById('editPassengerNationality').value;
    const passport = document.getElementById('editPassengerPassport').value;
    const type = document.getElementById('editPassengerType').value;

    passengerData[currentPassengerId] = { name, email, contact, birthday, nationality, passport, type };
    alert(`Passenger ${name} updated successfully!`);
    closeModal('editPassengerModal');
    location.reload();
}

/* --- Modal Management --- */
function openModal(modalId) {
    document.getElementById(modalId).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
    document.body.style.overflow = 'auto';
}

function openPassengerAddModal() {
    openModal('addPassengerModal');
}

/* --- Form Submission --- */
document.getElementById("scheduleForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const destination = formData.get('destination');
    alert(`Flight schedule to ${destination} updated successfully!`);
    e.target.reset();
});

/* --- Extra UI Behaviors from main branch --- */
document.addEventListener('DOMContentLoaded', function () {
    const accountItem = document.querySelector('.account-item');
    accountItem?.addEventListener('click', function (e) {
        e.stopPropagation();
        this.classList.toggle('active');
    });

    document.addEventListener('click', function (e) {
        if (!accountItem.contains(e.target)) {
            accountItem.classList.remove('active');
        }
    });

    document.querySelector('.logout-btn')?.addEventListener('click', () => {
        alert('Logging out...');
        window.location.href = '/main.php';
    });

    document.querySelector('.logo img')?.addEventListener('click', () => {
        window.location.href = '/pages/adminpage/admin.php';
    });

    document.getElementById('nav-explore')?.addEventListener('click', () => {
        document.getElementById('destinations-section')?.scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('nav-book')?.addEventListener('click', () => {
        document.getElementById('flight-schedule-section')?.scrollIntoView({ behavior: 'smooth' });
    });
});

// Close menus on outside click
document.addEventListener('click', function (e) {
    if (!e.target.classList.contains('action-btn') && !e.target.closest('.action-menu')) {
        document.querySelectorAll('.action-menu').forEach(menu => menu.classList.remove('show'));
    }
});
