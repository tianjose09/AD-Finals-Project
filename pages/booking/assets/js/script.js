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
        const amountPaid = parseFloat(document.getElementById('amount-paid').value);
        const totalAmount = 1250.00; // Fixed amount for this demo
        
        if (isNaN(amountPaid)) {
            document.getElementById('amount-group').classList.add('error');
            document.getElementById('amount-group').querySelector('.error-message').textContent = 'Please enter a valid amount';
            isValid = false;
        } else if (amountPaid < totalAmount) {
            document.getElementById('amount-group').classList.add('error');
            document.getElementById('amount-group').querySelector('.error-message').textContent = 'Amount paid is less than total due';
            isValid = false;
        } else {
            document.getElementById('amount-group').classList.remove('error');
            // Update displayed amounts
            const change = amountPaid - totalAmount;
            document.getElementById('display-paid').textContent = `$${amountPaid.toFixed(2)}`;
            document.getElementById('change-amount').textContent = `$${change.toFixed(2)}`;
        }
        
        document.getElementById('pay-now-btn').disabled = !isValid;
        
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
        
        // If amount is filled and valid, increase progress
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

// Navigate to specific step
function navigateToStep(stepNumber) {
    // Don't allow navigation to steps that haven't been completed yet
    const currentStep = getCurrentStep();
    if (stepNumber > currentStep) return;
    
    // Hide all sections
    document.querySelectorAll('.form-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Update step indicators
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
    
    // Show the selected section
    if (stepNumber === 2) {
        document.getElementById('profiling-section').classList.add('active');
    } else if (stepNumber === 3) {
        document.getElementById('payment-section').classList.add('active');
    } else if (stepNumber === 4) {
        document.getElementById('confirmation-section').classList.add('active');
        
        // Fill confirmation details if we're going to confirmation
        if (stepNumber === 4) {
            const fullName = document.getElementById('full-name').value;
            const firstName = fullName.split(' ')[0];
            document.getElementById('confirmed-first-name').textContent = firstName;
            document.getElementById('confirmed-name').textContent = fullName;
            document.getElementById('confirmed-email').textContent = document.getElementById('email').value;
            document.getElementById('confirmed-gender').textContent = document.querySelector('input[name="gender"]:checked').value;
            document.getElementById('confirmed-nationality').textContent = document.getElementById('nationality').value;
            document.getElementById('confirmed-phone').textContent = document.getElementById('phone').value;
            document.getElementById('confirmed-passport').textContent = document.getElementById('passport').value;
            
            // Payment details
            const amountPaid = parseFloat(document.getElementById('amount-paid').value);
            const totalAmount = 1250.00;
            const change = amountPaid - totalAmount;
            document.getElementById('confirmed-amount').textContent = `$${amountPaid.toFixed(2)}`;
            document.getElementById('confirmed-change').textContent = `$${change.toFixed(2)}`;
            
            // Generate random booking reference
            document.getElementById('booking-ref').textContent = Math.floor(1000 + Math.random() * 9000) + '-' + Math.floor(1000 + Math.random() * 9000);
        }
    }
    
    // Update progress bar
    updateProgressBar();
}

// Get current step number
function getCurrentStep() {
    if (document.getElementById('profiling-section').classList.contains('active')) return 2;
    if (document.getElementById('payment-section').classList.contains('active')) return 3;
    if (document.getElementById('confirmation-section').classList.contains('active')) return 4;
    return 1;
}

// Calculate step from click position on progress bar
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

// Initialize the application
function init() {
    // Create stars when page loads
    createStars();
    
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
    
    // Real-time update for cash payment display
    document.getElementById('amount-paid').addEventListener('input', function() {
        const amountPaid = parseFloat(this.value) || 0;
        const totalAmount = 1250.00;
        const change = amountPaid - totalAmount;
        
        document.getElementById('display-paid').textContent = `$${amountPaid.toFixed(2)}`;
        document.getElementById('change-amount').textContent = `$${change.toFixed(2)}`;
        
        validateForm();
    });
    
    // Navigation between sections
    document.getElementById('next-to-payment').addEventListener('click', function() {
        if (validateForm()) {
            navigateToStep(3);
        }
    });
    
    document.getElementById('back-to-profiling').addEventListener('click', function() {
        navigateToStep(2);
    });
    
    // Complete payment
    document.getElementById('pay-now-btn').addEventListener('click', function() {
        if (validateForm()) {
            navigateToStep(4);
        }
    });
    
    // Make progress bar clickable
    document.getElementById('progress-bar').addEventListener('click', function(event) {
        const step = getStepFromClick(event);
        navigateToStep(step);
    });
    
    // Make step indicators clickable
    document.querySelectorAll('.step').forEach(step => {
        step.addEventListener('click', function() {
            const stepNumber = parseInt(this.dataset.step);
            navigateToStep(stepNumber);
        });
    });
    
    // Initialize progress bar
    updateProgressBar();
}

// Start the application when DOM is loaded
document.addEventListener('DOMContentLoaded', init);