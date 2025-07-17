let selectedPlanetPrice = 0;
let selectedDepartureDate = '';
let selectedDepartureTime = '';
let selectedDestinationName = '';


async function submitTicketToDatabase() {
    const fullName = document.getElementById('confirmed-name')?.textContent || '';
    const gender = document.getElementById('confirmed-gender')?.textContent || '';
    const nationality = document.getElementById('confirmed-nationality')?.textContent || '';

    const phone = document.getElementById('confirmed-phone')?.textContent || '';
    const passport = document.getElementById('confirmed-passport')?.textContent || '';
    const destination = document.getElementById('planet-name')?.textContent || '';
    const departureDate = document.getElementById('departure-date')?.textContent || '';
    const departureTime = document.getElementById('departure-time')?.textContent || '';

    const amountPaid = parseFloat(document.getElementById('confirmed-amount')?.textContent?.replace('$', '') || 0);
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
        destination: selectedDestinationName,
        departure_date: selectedDepartureDate,
        departure_time: selectedDepartureTime,
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
            return true;
        } else {
            console.error('❌ Save failed:', result.message);
            return false;
        }
    } catch (err) {
        console.error('❌ Request error:', err);
        return false;
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

async function getFlightPrice() {
    try {
        const urlParams = new URLSearchParams(window.location.search);
        const flightId = urlParams.get('flight_id');

        if (!flightId) return;

        const response = await fetch(`/handlers/getFlightPrice.php?flight_id=${flightId}`);
        const data = await response.json();

        if (data.success) {
            selectedPlanetPrice = parseFloat(data.price);
            selectedDestinationName = data.destination || '';

            if (data.departure_time) {
                const departureDateObj = new Date(data.departure_time);
                selectedDepartureDate = departureDateObj.toISOString().split('T')[0];
                selectedDepartureTime = departureDateObj.toTimeString().split(':').slice(0, 2).join(':');
            }

            const totalAmountElement = document.getElementById('total-amount');
            if (totalAmountElement) {
                totalAmountElement.textContent = `$${selectedPlanetPrice.toFixed(2)}`;
            }
        } else {
            console.error('❌ Flight data fetch failed:', data.message);
        }
    } catch (error) {
        console.error('Error fetching flight price:', error);
    }
}

function updateProgressBar() {
    const progressFill = document.getElementById('progress-fill');
    if (!progressFill) return;

    let progress = 0;
    const fields = [
        'full-name', 'dob', 'phone', 'email',
        'emergency-name', 'emergency-phone',
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
            progress += (amountPaid / 1250) * 50;
            if (progress > 100) progress = 100;
        }
    } else if (document.getElementById('confirmation-section')?.classList.contains('active')) {
        progress = 100;
    }

    progressFill.style.width = `${progress}%`;
}

function navigateToStep(stepNumber) {
    const currentStep = getCurrentStep();
    if (stepNumber > currentStep && !validateForm()) return;

    document.querySelectorAll('.form-section').forEach(sec => sec.classList.remove('active'));
    document.querySelectorAll('.step').forEach(step => {
        step.classList.remove('active');
        if (parseInt(step.dataset.step) < stepNumber) step.classList.add('completed');
        else if (parseInt(step.dataset.step) === stepNumber) step.classList.add('active');
        else step.classList.remove('completed');
    });

    if (stepNumber === 2) {
        const profilingSection = document.getElementById('profiling-section');
        if (profilingSection) profilingSection.classList.add('active');
    } else if (stepNumber === 3) {
        const paymentSection = document.getElementById('payment-section');
        if (paymentSection) paymentSection.classList.add('active');
    } else if (stepNumber === 4) {
        const confirmationSection = document.getElementById('confirmation-section');
        if (confirmationSection) confirmationSection.classList.add('active');

        const fullName = document.getElementById('full-name')?.value || '';
        const firstName = fullName.split(' ')[0];
        const confirmedFirstName = document.getElementById('confirmed-first-name');
        if (confirmedFirstName) confirmedFirstName.textContent = firstName;
        
        const confirmedName = document.getElementById('confirmed-name');
        if (confirmedName) confirmedName.textContent = fullName;
        
        const confirmedEmail = document.getElementById('confirmed-email');
        if (confirmedEmail) confirmedEmail.textContent = document.getElementById('email')?.value || '';
        
        const genderRadio = document.querySelector('input[name="gender"]:checked');
        const confirmedGender = document.getElementById('confirmed-gender');
        if (confirmedGender) confirmedGender.textContent = genderRadio?.value || '';
        
        const confirmedNationality = document.getElementById('confirmed-nationality');
        if (confirmedNationality) confirmedNationality.textContent = document.getElementById('nationality')?.value || '';
        
        const confirmedPhone = document.getElementById('confirmed-phone');
        if (confirmedPhone) confirmedPhone.textContent = document.getElementById('phone')?.value || '';
        
        const confirmedPassport = document.getElementById('confirmed-passport');
        if (confirmedPassport) confirmedPassport.textContent = document.getElementById('passport')?.value || '';

        const amountPaid = parseFloat(document.getElementById('amount-paid')?.value || 0);
        const change = amountPaid - selectedPlanetPrice;
        
        const confirmedAmount = document.getElementById('confirmed-amount');
        if (confirmedAmount) confirmedAmount.textContent = `$${amountPaid.toFixed(2)}`;
        
        const confirmedChange = document.getElementById('confirmed-change');
        if (confirmedChange) confirmedChange.textContent = `$${change.toFixed(2)}`;

        const bookingRef = document.getElementById('booking-ref');
        if (bookingRef) bookingRef.textContent = Math.floor(1000 + Math.random() * 9000) + '-' + Math.floor(1000 + Math.random() * 9000);

        const departureDateSpan = document.getElementById('departure-date');
        const departureTimeSpan = document.getElementById('departure-time');
        if (departureDateSpan) departureDateSpan.textContent = selectedDepartureDate;
        if (departureTimeSpan) departureTimeSpan.textContent = selectedDepartureTime;

        const planetNameSpan = document.getElementById('planet-name');
        if (planetNameSpan) planetNameSpan.textContent = selectedDestinationName;

    }

    updateProgressBar();
}

function getCurrentStep() {
    const activeStep = document.querySelector('.step.active');
    return activeStep ? parseInt(activeStep.dataset.step) : 1;
}

function getStepFromClick(event) {
    const progressBar = document.getElementById('progress-bar');
    if (!progressBar) return 1;

    const rect = progressBar.getBoundingClientRect();
    const clickPosition = event.clientX - rect.left;
    const percentage = (clickPosition / rect.width) * 100;

    if (percentage < 25) return 1;
    if (percentage < 50) return 2;
    if (percentage < 75) return 3;
    return 4;
}

function init() {

    const continueBtn = document.getElementById('continue-btn');
    if (continueBtn) {
    continueBtn.addEventListener('click', async function () {
        await submitTicketToDatabase();
        window.location.href = '/pages/ClientMain/ClientMain.php';
    });
}



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
    createStars();

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

    const nextToPaymentBtn = document.getElementById('next-to-payment');
    if (nextToPaymentBtn) {
        nextToPaymentBtn.addEventListener('click', function () {
            if (validateForm()) {
                navigateToStep(3);
            }
        });
    }

    const backToProfilingBtn = document.getElementById('back-to-profiling');
    if (backToProfilingBtn) {
        backToProfilingBtn.addEventListener('click', function () {
            navigateToStep(2);
        });
    }

    const payNowBtn = document.getElementById('pay-now-btn');
    if (payNowBtn) {
        payNowBtn.addEventListener('click', function () {
            if (validateForm()) {
                navigateToStep(4);
            }
        });
    }

    const progressBar = document.getElementById('progress-bar');
    if (progressBar) {
        progressBar.addEventListener('click', function (event) {
            const step = getStepFromClick(event);
            navigateToStep(step);
        });
    }

    document.querySelectorAll('.step').forEach(step => {
        step.addEventListener('click', function () {
            const stepNumber = parseInt(this.dataset.step);
            navigateToStep(stepNumber);
        });
    });

    updateProgressBar();
}

document.addEventListener('DOMContentLoaded', init);