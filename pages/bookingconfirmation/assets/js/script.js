// Create twinkling stars
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

// Validate the form fields
function validateForm() {
    let isValid = true;

    if (document.getElementById('profiling-section').classList.contains('active')) {
        const requiredMap = [
            { field: 'full-name',        group: 'name-group' },
            { field: 'dob',              group: 'dob-group' },
            { field: 'nationality',      group: 'nationality-group' },
            { field: 'phone',            group: 'phone-group' },
            { field: 'email',            group: 'email-group' },
            { field: 'emergency-name',   group: 'emergency-group' },
            { field: 'emergency-phone',  group: 'emergency-group' },
            { field: 'passport',         group: 'passport-group' },
            { field: 'expiry',           group: 'expiry-group' },
            { field: 'country',          group: 'country-group' }
        ];

        requiredMap.forEach(({ field, group }) => {
            const input = document.getElementById(field);
            const wrapper = document.getElementById(group);
            if (!input || !wrapper) return;

            if (!input.value.trim()) {
                wrapper.classList.add('error');
                isValid = false;
            } else {
                wrapper.classList.remove('error');
            }
        });

        const genderSelected = document.querySelector('input[name="gender"]:checked');
        const genderGroup = document.getElementById('gender-group');
        if (!genderSelected) {
            genderGroup.classList.add('error');
            isValid = false;
        } else {
            genderGroup.classList.remove('error');
        }

        const email = document.getElementById('email').value.trim();
        const emailGroup = document.getElementById('email-group');
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            emailGroup.classList.add('error');
            isValid = false;
        }

        document.getElementById('next-to-payment').disabled = !isValid;
        updateProgressBar();
    }

    if (document.getElementById('payment-section').classList.contains('active')) {
        const amountPaid = parseFloat(document.getElementById('amount-paid').value);
        const totalAmount = 1250.00;

        const amountGroup = document.getElementById('amount-group');

        if (isNaN(amountPaid)) {
            amountGroup.classList.add('error');
            amountGroup.querySelector('.error-message').textContent = 'Please enter a valid amount';
            isValid = false;
        } else if (amountPaid < totalAmount) {
            amountGroup.classList.add('error');
            amountGroup.querySelector('.error-message').textContent = 'Amount paid is less than total due';
            isValid = false;
        } else {
            amountGroup.classList.remove('error');
            const change = amountPaid - totalAmount;
            document.getElementById('display-paid').textContent = `$${amountPaid.toFixed(2)}`;
            document.getElementById('change-amount').textContent = `$${change.toFixed(2)}`;
        }

        document.getElementById('pay-now-btn').disabled = !isValid;
        updateProgressBar();
    }

    return isValid;
}

// Update the progress bar width
function updateProgressBar() {
    const progressFill = document.getElementById('progress-fill');
    let progress = 0;

    if (document.getElementById('profiling-section').classList.contains('active')) {
        const fields = [
            'full-name', 'dob', 'phone', 'email',
            'emergency-name', 'emergency-phone',
            'passport', 'expiry', 'country', 'nationality'
        ];

        let filledFields = 0;
        fields.forEach(field => {
            const input = document.getElementById(field);
            if (input && input.value.trim()) {
                filledFields++;
            }
        });

        if (document.querySelector('input[name="gender"]:checked')) {
            filledFields++;
        }

        progress = (filledFields / (fields.length + 1)) * 50;
    } else if (document.getElementById('payment-section').classList.contains('active')) {
        progress = 50;
        const amountPaid = parseFloat(document.getElementById('amount-paid').value);
        if (!isNaN(amountPaid)) {
            progress += (amountPaid / 1250) * 50;
            if (progress > 100) progress = 100;
        }
    } else if (document.getElementById('confirmation-section').classList.contains('active')) {
        progress = 100;
    }

    progressFill.style.width = `${progress}%`;
}

// Move between sections
function navigateToStep(stepNumber) {
    const currentStep = getCurrentStep();
    if (stepNumber > currentStep) return;

    document.querySelectorAll('.form-section').forEach(section => section.classList.remove('active'));
    document.querySelectorAll('.step').forEach(step => {
        step.classList.remove('active');
        if (parseInt(step.dataset.step) < stepNumber) {
            step.classList.add('completed');
        } else if (parseInt(step.dataset.step) === stepNumber) {
            step.classList.add('active');
        } else {
            step.classList.remove('completed');
        }
    });

    if (stepNumber === 2) {
        document.getElementById('profiling-section').classList.add('active');
    } else if (stepNumber === 3) {
        document.getElementById('payment-section').classList.add('active');
    } else if (stepNumber === 4) {
        document.getElementById('confirmation-section').classList.add('active');

        const fullName = document.getElementById('full-name').value;
        const firstName = fullName.split(' ')[0];
        document.getElementById('confirmed-first-name').textContent = firstName;
        document.getElementById('confirmed-name').textContent = fullName;
        document.getElementById('confirmed-email').textContent = document.getElementById('email').value;
        document.getElementById('confirmed-gender').textContent = document.querySelector('input[name="gender"]:checked').value;
        document.getElementById('confirmed-nationality').textContent = document.getElementById('nationality').value;
        document.getElementById('confirmed-phone').textContent = document.getElementById('phone').value;
        document.getElementById('confirmed-passport').textContent = document.getElementById('passport').value;

        const amountPaid = parseFloat(document.getElementById('amount-paid').value);
        const totalAmount = 1250.00;
        const change = amountPaid - totalAmount;
        document.getElementById('confirmed-amount').textContent = `$${amountPaid.toFixed(2)}`;
        document.getElementById('confirmed-change').textContent = `$${change.toFixed(2)}`;

        document.getElementById('booking-ref').textContent =
            Math.floor(1000 + Math.random() * 9000) + '-' + Math.floor(1000 + Math.random() * 9000);
    }

    updateProgressBar();
}

function getCurrentStep() {
    if (document.getElementById('profiling-section').classList.contains('active')) return 2;
    if (document.getElementById('payment-section').classList.contains('active')) return 3;
    if (document.getElementById('confirmation-section').classList.contains('active')) return 4;
    return 1;
}

function getStepFromClick(event) {
    const progressBar = document.getElementById('progress-bar');
    const rect = progressBar.getBoundingClientRect();
    const clickPosition = event.clientX - rect.left;
    const percentage = (clickPosition / rect.width) * 100;

    if (percentage < 25) return 1;
    if (percentage < 50) return 2;
    if (percentage < 75) return 3;
    return 4;
}

function init() {
    createStars();

    document.querySelectorAll('input, select').forEach(el => {
        el.addEventListener('input', validateForm);
    });

    document.querySelectorAll('input[type="radio"]').forEach(el => {
        el.addEventListener('change', validateForm);
    });

    document.getElementById('amount-paid').addEventListener('input', function () {
        const amountPaid = parseFloat(this.value) || 0;
        const totalAmount = 1250.00;
        const change = amountPaid - totalAmount;

        document.getElementById('display-paid').textContent = `$${amountPaid.toFixed(2)}`;
        document.getElementById('change-amount').textContent = `$${change.toFixed(2)}`;

        validateForm();
    });

    document.getElementById('next-to-payment').addEventListener('click', function () {
        if (validateForm()) {
            navigateToStep(3);
        }
    });

    document.getElementById('back-to-profiling').addEventListener('click', function () {
        navigateToStep(2);
    });

    document.getElementById('pay-now-btn').addEventListener('click', function () {
        if (validateForm()) {
            navigateToStep(4);
        }
    });

    document.getElementById('progress-bar').addEventListener('click', function (e) {
        const step = getStepFromClick(e);
        navigateToStep(step);
    });

    document.querySelectorAll('.step').forEach(step => {
        step.addEventListener('click', function () {
            const stepNum = parseInt(this.dataset.step);
            navigateToStep(stepNum);
        });
    });

    updateProgressBar();
}

document.addEventListener('DOMContentLoaded', init);
