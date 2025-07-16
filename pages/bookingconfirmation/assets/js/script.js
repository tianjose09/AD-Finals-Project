let selectedPlanetPrice = 0; // This will store the flight price

async function submitTicketToDatabase() {
    const fullName = document.getElementById('full-name')?.value || '';
    const gender = document.querySelector('input[name="gender"]:checked')?.value || '';
    const nationality = document.getElementById('nationality')?.value || '';
    const phone = document.getElementById('phone')?.value || '';
    const passport = document.getElementById('passport')?.value || '';
    const departureDate = document.getElementById('departure-date')?.value || '2025-08-01';
    const departureTime = document.getElementById('departure-time')?.value || '08:00';
    const destination = document.getElementById('planet-name')?.textContent || 'Mars';
    const amountPaid = parseFloat(document.getElementById('amount-paid')?.value || 0);
    const change = amountPaid - selectedPlanetPrice;
    const reference = document.getElementById('booking-ref')?.textContent || '';

    const payload = {
        reference,
        passenger_name: fullName,
        gender,
        nationality,
        contact_number: phone,
        passport_number: passport,
        departure_location: "Earth Spaceport",
        destination,
        departure_date: departureDate,
        departure_time: departureTime,
        payment_method: "Cash",
        price_paid: amountPaid,
        change_given: change
    };

    try {
        const res = await fetch('/handlers/storeTicket.handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const result = await res.json();
        if (result.success) {
            console.log('✅ Ticket saved:', result.message);
            return true;  // ✅ return success
        } else {
            console.error('❌ Save failed:', result.message);
            return false; // ❌ return failure
        }
    } catch (err) {
        console.error('❌ Request error:', err);
        return false; // ❌ return failure
    }
}

// Create Stars in Background
function createStars() {
    const starsContainer = document.getElementById('stars');
    const starsCount = 150;

    for (let i = 0; i < starsCount; i++) {
        const star = document.createElement('div');
        star.classList.add('star');

        const size = Math.random() * 2 + 1;
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;

        const duration = Math.random() * 5 + 3;
        const delay = Math.random() * 5;
        const opacity = Math.random() * 0.7 + 0.3;

        star.style.setProperty('--duration', `${duration}s`);
        star.style.setProperty('--opacity', opacity);
        star.style.animationDelay = `${delay}s`;

        starsContainer.appendChild(star);
    }
}

// Validate Form
function validateForm() {
    let isValid = true;

    if (document.getElementById('profiling-section').classList.contains('active')) {
        const requiredFields = [
            'full-name', 'dob', 'nationality',
            'phone', 'email',
            'passport', 'expiry', 'country'
        ];

        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            const group = document.getElementById(`${fieldId}-group`);

            if (!field || !field.value.trim()) {
                if (group) group.classList.add('error');
                isValid = false;
            } else {
                if (group) group.classList.remove('error');
            }
        });

        const genderSelected = document.querySelector('input[name="gender"]:checked');
        const genderGroup = document.getElementById('gender-group');
        if (!genderSelected) {
            if (genderGroup) genderGroup.classList.add('error');
            isValid = false;
        } else {
            if (genderGroup) genderGroup.classList.remove('error');
        }

        const email = document.getElementById('email')?.value;
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            const emailGroup = document.getElementById('email-group');
            if (emailGroup) emailGroup.classList.add('error');
            isValid = false;
        }

        const phone = document.getElementById('phone');
        const phoneGroup = document.getElementById('phone-group');
        if (!/^09\d{9}$/.test(phone.value.trim())) {
            if (phoneGroup) phoneGroup.classList.add('error');
            isValid = false;
        } else {
            if (phoneGroup) phoneGroup.classList.remove('error');
        }

        updateProgressBar();
    }

    if (document.getElementById('payment-section').classList.contains('active')) {
        const amountPaid = parseFloat(document.getElementById('amount-paid')?.value || 0);

        if (isNaN(amountPaid)) {
            const amountGroup = document.getElementById('amount-group');
            if (amountGroup) {
                amountGroup.classList.add('error');
                const errorMessage = amountGroup.querySelector('.error-message');
                if (errorMessage) errorMessage.textContent = 'Please enter a valid amount';
            }
            isValid = false;
        } else if (amountPaid < selectedPlanetPrice) {
            const amountGroup = document.getElementById('amount-group');
            if (amountGroup) {
                amountGroup.classList.add('error');
                const errorMessage = amountGroup.querySelector('.error-message');
                if (errorMessage) errorMessage.textContent = 'Amount paid is less than total due';
            }
            isValid = false;
        } else {
            const amountGroup = document.getElementById('amount-group');
            if (amountGroup) amountGroup.classList.remove('error');
            const change = amountPaid - selectedPlanetPrice;
            const displayPaid = document.getElementById('display-paid');
            if (displayPaid) displayPaid.textContent = `$${amountPaid.toFixed(2)}`;
            const changeAmount = document.getElementById('change-amount');
            if (changeAmount) changeAmount.textContent = `$${change.toFixed(2)}`;
        }

        const payNowBtn = document.getElementById('pay-now-btn');
        if (payNowBtn) payNowBtn.disabled = !isValid;
        updateProgressBar();
    }

    return isValid;
}

function updateProgressBar() {
    const progressFill = document.getElementById('progress-fill');
    if (!progressFill) return;

    let progress = 0;
    const fields = [
        'full-name', 'dob', 'phone', 'email',
        'passport', 'expiry', 'country', 'nationality'
    ];

    if (document.getElementById('profiling-section')?.classList.contains('active')) {
        let filledFields = 0;
        fields.forEach(id => {
            const field = document.getElementById(id);
            if (field && field.value.trim()) {
                filledFields++;
            }
        });
        if (document.querySelector('input[name="gender"]:checked')) filledFields++;
        progress = (filledFields / (fields.length + 1)) * 50;
    } else if (document.getElementById('payment-section')?.classList.contains('active')) {
        progress = 50;
        const amountPaid = parseFloat(document.getElementById('amount-paid')?.value || 0);
        if (!isNaN(amountPaid)) {
            progress += (amountPaid / selectedPlanetPrice) * 50;
            if (progress > 100) progress = 100;
        }
    } else if (document.getElementById('confirmation-section')?.classList.contains('active')) {
        progress = 100;
    }

    progressFill.style.width = `${progress}%`;
}

async function getFlightPrice() {
    try {
        const urlParams = new URLSearchParams(window.location.search);
        const flightId = urlParams.get('flight_id');

        if (!flightId) return;

        const response = await fetch(`/handlers/getFlightPrice.php?flight_id=${flightId}`);
        const data = await response.json();

        if (data.success) {
            selectedPlanetPrice = parseFloat(data.price);
            const totalAmountElement = document.getElementById('total-amount');
            if (totalAmountElement) {
                totalAmountElement.textContent = `$${selectedPlanetPrice.toFixed(2)}`;
            }
        }
    } catch (error) {
        console.error('Error fetching flight price:', error);
    }
}

function init() {
    document.getElementById('return-home-btn').addEventListener('click', async function () {
        const success = await submitTicketToDatabase();
        if (success) {
            window.location.href = '/pages/ClientMain/ClientMain.php';
        } else {
            alert("❌ Failed to save ticket. Please try again.");
        }
    });

    createStars();
    getFlightPrice();

    // Validation triggers
    document.querySelectorAll('input, select').forEach(element => {
        element.addEventListener('input', () => validateForm());
    });

    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', () => validateForm());
    });

    const amountPaidInput = document.getElementById('amount-paid');
    if (amountPaidInput) {
        amountPaidInput.addEventListener('input', function () {
            const amountPaid = parseFloat(this.value) || 0;
            const change = amountPaid - selectedPlanetPrice;

            const displayPaid = document.getElementById('display-paid');
            if (displayPaid) displayPaid.textContent = `$${amountPaid.toFixed(2)}`;

            const changeAmount = document.getElementById('change-amount');
            if (changeAmount) changeAmount.textContent = `$${change.toFixed(2)}`;

            validateForm();
        });
    }

    updateProgressBar();
}

document.addEventListener('DOMContentLoaded', init);
