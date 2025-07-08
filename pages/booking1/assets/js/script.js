function createStars() {
  const starsContainer = document.getElementById('stars');
  for (let i = 0; i < 120; i++) {
    const star = document.createElement('div');
    star.classList.add('star');
    const size = Math.random() * 2 + 1;
    star.style.width = size + "px";
    star.style.height = size + "px";
    star.style.left = (Math.random() * 100) + "%";
    star.style.top = (Math.random() * 100) + "%";
    const duration = Math.random() * 5 + 3;
    const delay = Math.random() * 5;
    const opacity = Math.random() * 0.7 + 0.3;
    star.style.setProperty('--duration', duration + "s");
    star.style.setProperty('--opacity', opacity);
    star.style.animationDelay = delay + "s";
    starsContainer.appendChild(star);
  }
}
window.addEventListener('load', createStars);

function updatePassengers(change) {
  const input = document.getElementById('passengerCount');
  let count = parseInt(input.value) || 1;
  count += change;
  if (count < 1) count = 1;
  input.value = count;
}

function validatePassengerInput() {
  const input = document.getElementById('passengerCount');
  let count = parseInt(input.value) || 1;
  if (count < 1) count = 1;
  input.value = count;
}

document.getElementById('swapBtn').addEventListener('click', () => {
  const from = document.getElementById('from');
  const to = document.getElementById('to');
  const temp = from.value;
  from.value = to.value;
  to.value = temp;
});

function proceedToBooking() {
  const confirmBooking = confirm("Do you want to continue to booking?");
  if (confirmBooking) {
    window.location.href = "booking.html";
  }
}

// Twinkling stars
function createStars() {
    const starsContainer = document.getElementById('stars');
    const starsCount = 150;

    for (let i = 0; i < starsCount; i++) {
        const star = document.createElement('div');
        star.classList.add('star');

        // Random size between 1-3px
        const size = Math.random() * 2 + 1;
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;

        // Random position
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;

        // Random animation duration and delay
        const duration = Math.random() * 5 + 3;
        const delay = Math.random() * 5;
        const opacity = Math.random() * 0.7 + 0.3;

        star.style.setProperty('--duration', `${duration}s`);
        star.style.setProperty('--opacity', opacity);
        star.style.animationDelay = `${delay}s`;

        starsContainer.appendChild(star);
    }
}
window.addEventListener('load', createStars);

// Passenger counter controls
function updatePassengers(change) {
    const input = document.getElementById('passengerCount');
    let count = parseInt(input.value) || 1;
    count += change;
     if (count < 1) count = 1;
    input.value = count;
}

function validatePassengerInput() {
    const input = document.getElementById('passengerCount');
    let count = parseInt(input.value) || 1;
    if (count < 1) count = 1;
    input.value = count;
}

// Swap button functionality
document.getElementById('swapBtn').addEventListener('click', () => {
    const from = document.getElementById('from');
    const to = document.getElementById('to');
    const temp = from.value;
    from.value = to.value;
    to.value = temp;
});

// Booking confirmation navigation
function proceedToBooking() {
    const confirmBooking = confirm("Do you want to continue to booking?");
    if (confirmBooking) {
        window.location.href = "booking.html";
    }
}

// Form Validation
function validateForm() {
    let isValid = true;

    // Validate profiling section
    if (document.getElementById('profiling-section').classList.contains('active')) {
        const requiredFields = [
            'full-name', 'dob', 'nationality',
            'phone', 'email', 'emergency-name',
            'emergency-phone', 'passport', 'expiry', 'country'
        ];

        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            const group = document.getElementById(`${fieldId}-group`);
  if (!field.value.trim()) {
                group.classList.add('error');
                isValid = false;
            } else {
                group.classList.remove('error');
            }
        });

        // Validate gender
        const genderSelected = document.querySelector('input[name="gender"]:checked');
        if (!genderSelected) {
            document.getElementById('gender-group').classList.add('error');
            isValid = false;
        } else {
            document.getElementById('gender-group').classList.remove('error');
        }

        // Validate email format
        const email = document.getElementById('email').value;
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            document.getElementById('email-group').classList.add('error');
            isValid = false;
        }

        document.getElementById('next-to-payment').disabled = !isValid;
        updateProgressBar();
    }

    // Validate payment section
    if (document.getElementById('payment-section').classList.contains('active')) {
        const paymentFields = ['card-number', 'expiry-date', 'cvv'];
        let paymentValid = true;

        if (document.getElementById('credit-card-method').classList.contains('active')) {
            paymentFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                const group = document.getElementById(`${fieldId}-group`);

                if (!field.value.trim()) {
                    group.classList.add('error');
                    paymentValid = false;
                } else {
                    group.classList.remove('error');
                }
            });
        }

        document.getElementById('pay-now-btn').disabled = !paymentValid;
        updateProgressBar();
    }

    return isValid;
}

// Progress bar updater
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
        fields.forEach(fieldId => {
            if (document.getElementById(fieldId).value.trim()) {
                filledFields++;
            }
        });

        if (document.querySelector('input[name="gender"]:checked')) {
            filledFields++;
        }

        progress = (filledFields / (fields.length + 1)) * 50;
    } else if (document.getElementById('payment-section').classList.contains('active')) {
        progress = 50;
         if (document.getElementById('credit-card-method').classList.contains('active')) {
            const paymentFields = ['card-number', 'expiry-date', 'cvv'];
            let paymentFilled = 0;

            paymentFields.forEach(fieldId => {
                if (document.getElementById(fieldId).value.trim()) {
                    paymentFilled++;
                }
            });

            progress += (paymentFilled / paymentFields.length) * 50;
        } else {
            progress = 100;
        }
    } else if (document.getElementById('confirmation-section').classList.contains('active')) {
        progress = 100;
    }

    progressFill.style.width = `${progress}%`;
}

// Attach input listeners for validation
document.querySelectorAll('input, select').forEach(element => {
    element.addEventListener('input', () => {
        validateForm();
    });
});
document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', () => {
        validateForm();
    });
});

// Payment method switcher
const paymentMethods = document.querySelectorAll('.payment-method');
paymentMethods.forEach(method => {
    method.addEventListener('click', function () {
        paymentMethods.forEach(m => m.classList.remove('active'));
        this.classList.add('active');
        validateForm();
            validateForm();
    });
});

// Navigation between steps
document.getElementById('next-to-payment').addEventListener('click', function () {
    if (validateForm()) {
        document.getElementById('profiling-section').classList.remove('active');
        document.getElementById('payment-section').classList.add('active');

        document.querySelectorAll('.step')[1].classList.remove('active');
        document.querySelectorAll('.step')[1].classList.add('completed');
        document.querySelectorAll('.step')[2].classList.add('active');

        updateProgressBar();
    }
});

document.getElementById('back-to-profiling').addEventListener('click', function () {
    document.getElementById('payment-section').classList.remove('active');
    document.getElementById('profiling-section').classList.add('active');

    document.querySelectorAll('.step')[1].classList.add('active');
    document.querySelectorAll('.step')[1].classList.remove('completed');
    document.querySelectorAll('.step')[2].classList.remove('active');

    updateProgressBar();
});

// Final payment click
document.getElementById('pay-now-btn').addEventListener('click', function () {
    if (validateForm()) {
        document.getElementById('payment-section').classList.remove('active');
        document.getElementById('confirmation-section').classList.add('active');

        document.querySelectorAll('.step')[2].classList.remove('active');
        document.querySelectorAll('.step')[2].classList.add('completed');
        document.querySelectorAll('.step')[3].classList.add('active');

        updateProgressBar();
        document.getElementById('confirmed-name').textContent = document.getElementById('full-name').value;
        document.getElementById('confirmed-email').textContent = document.getElementById('email').value;
    }
});

// Initial call
updateProgressBar();
