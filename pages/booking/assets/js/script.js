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

// Call the function when the page loads
window.addEventListener('load', createStars);

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
        
        // Enable/disable next button based on validation
        document.getElementById('next-to-payment').disabled = !isValid;
        
        // Update progress bar
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
        
        // Update progress bar
        updateProgressBar();
    }
    
    return isValid;
}

// Update progress bar based on current section and validation
function updateProgressBar() {
    const progressFill = document.getElementById('progress-fill');
    let progress = 0;
    
    if (document.getElementById('profiling-section').classList.contains('active')) {
        // Count filled fields in profiling section
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
        
        // Add 1 if gender is selected
        if (document.querySelector('input[name="gender"]:checked')) {
            filledFields++;
        }
        
        progress = (filledFields / (fields.length + 1)) * 50;
    } else if (document.getElementById('payment-section').classList.contains('active')) {
        progress = 50;
        
        // If credit card is selected and fields are filled, increase progress
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
            // For other payment methods, assume they're complete
            progress = 100;
        }
    } else if (document.getElementById('confirmation-section').classList.contains('active')) {
        progress = 100;
    }
    
    progressFill.style.width = `${progress}%`;
}

// Add event listeners for form validation
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

// Payment method selection
const paymentMethods = document.querySelectorAll('.payment-method');

paymentMethods.forEach(method => {
    method.addEventListener('click', function() {
        paymentMethods.forEach(m => m.classList.remove('active'));
        this.classList.add('active');
        validateForm();
    });
});

// Navigation between sections
document.getElementById('next-to-payment').addEventListener('click', function() {
    if (validateForm()) {
        document.getElementById('profiling-section').classList.remove('active');
        document.getElementById('payment-section').classList.add('active');
        
        // Update progress steps
        document.querySelectorAll('.step')[1].classList.remove('active');
        document.querySelectorAll('.step')[1].classList.add('completed');
        document.querySelectorAll('.step')[2].classList.add('active');
        
        // Update progress bar
        updateProgressBar();
    }
});

document.getElementById('back-to-profiling').addEventListener('click', function() {
    document.getElementById('payment-section').classList.remove('active');
    document.getElementById('profiling-section').classList.add('active');
    
    // Update progress steps
    document.querySelectorAll('.step')[1].classList.add('active');
    document.querySelectorAll('.step')[1].classList.remove('completed');
    document.querySelectorAll('.step')[2].classList.remove('active');
    
    // Update progress bar
    updateProgressBar();
});

// Complete payment
document.getElementById('pay-now-btn').addEventListener('click', function() {
    if (validateForm()) {
        document.getElementById('payment-section').classList.remove('active');
        document.getElementById('confirmation-section').classList.add('active');
        
        // Update progress steps
        document.querySelectorAll('.step')[2].classList.remove('active');
        document.querySelectorAll('.step')[2].classList.add('completed');
        document.querySelectorAll('.step')[3].classList.add('active');
        
        // Update progress bar
        updateProgressBar();
        
        // Fill confirmation details
        document.getElementById('confirmed-name').textContent = document.getElementById('full-name').value;
        document.getElementById('confirmed-email').textContent = document.getElementById('email').value;
    }
});

// Initialize progress bar
updateProgressBar();