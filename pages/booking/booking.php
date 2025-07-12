<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Details</title>
    <link rel="stylesheet" href="/pages/booking/assets/css/styles.css">
    <link rel="icon" type="image/x-icon" href="assets/img/TED_LOGOwoBG.png">
</head>
<body>
    <div class="stars" id="stars"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="form-container">
        <div class="form-header">
            <h1 class="form-title">Teddiursa Airlines</h1>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress-fill" id="progress-fill"></div>
        </div>

        <!-- Progress Steps -->
        <div class="progress-steps">
            <div class="step completed">
                <div class="step-circle">✓</div>
                <div class="step-label">Destination</div>
            </div>
            <div class="step active" id="profiling-step">
                <div class="step-circle">2</div>
                <div class="step-label">Profiling</div>
            </div>
            <div class="step" id="payment-step">
                <div class="step-circle">3</div>
                <div class="step-label">Payment</div>
            </div>
            <div class="step" id="confirmation-step">
                <div class="step-circle">4</div>
                <div class="step-label">Confirmation</div>
            </div>
        </div>

        <div class="form-content">
            <!-- Profiling Section -->
            <div class="form-section active" id="profiling-section">
                <h2 class="section-title">Passenger Information</h2>
                
                <div class="form-group" id="name-group">
                    <label>Full Name</label>
                    <input type="text" placeholder="First Name, Middle Name, Last Name" id="full-name">
                    <div class="error-message">Please enter your full name</div>
                </div>
                
                <div class="form-group" id="dob-group">
                    <label>Date of Birth</label>
                    <input type="date" id="dob">
                    <div class="error-message">Please select your date of birth</div>
                </div>
                
                <div class="form-group" id="gender-group">
                    <label>Gender</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" name="gender" id="male" value="male">
                            <label for="male">Male</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female">Female</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" name="gender" id="other" value="other">
                            <label for="other">Other</label>
                        </div>
                    </div>
                    <div class="error-message">Please select your gender</div>
                </div>
                
                <div class="form-group" id="nationality-group">
                    <label>Nationality</label>
                    <input type="text" placeholder="Your nationality" id="nationality">
                    <div class="error-message">Please enter your nationality</div>
                </div>
                
                <h2 class="section-title">Contact Information</h2>
                
                <div class="form-group" id="phone-group">
                    <label>Phone Number</label>
                    <input type="tel" placeholder="+639XXXXXXXXX" id="phone">
                    <div class="error-message">Please enter a valid phone number</div>
                </div>
                
                <div class="form-group" id="email-group">
                    <label>Email Address</label>
                    <input type="email" placeholder="your.email@gmail.com" id="email">
                    <div class="error-message">Please enter a valid email address</div>
                </div>
                
                <div class="form-group" id="emergency-group">
                    <label>Emergency Contact</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div>
                            <input type="text" placeholder="Name" id="emergency-name">
                            <div class="error-message" style="margin-top: 15px;">Please enter name</div>
                        </div>
                        <div>
                            <input type="tel" placeholder="Phone Number" id="emergency-phone">
                            <div class="error-message" style="margin-top: 15px;">Please enter phone number</div>
                        </div>
                    </div>
                </div>
                
                <h2 class="section-title">Travel Documents</h2>
                
                <div class="form-group" id="passport-group">
                    <label>Passport Number</label>
                    <input type="text" placeholder="Passport number" id="passport">
                    <div class="error-message">Please enter your passport number</div>
                </div>
                
                <div class="form-group" id="expiry-group">
                    <label>Expiry Date</label>
                    <input type="date" id="expiry">
                    <div class="error-message">Please select expiry date</div>
                </div>
                
                <div class="form-group" id="country-group">
                    <label>Issuing Country</label>
                    <input type="text" placeholder="Issuing country" id="country">
                    <div class="error-message">Please enter issuing country</div>
                </div>
                
                <div class="btn-container">
                    <button class="btn btn-primary" id="next-to-payment" disabled>Continue</button>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="form-section" id="payment-section">
                <h2 class="section-title">Payment Method</h2>
                
                <div class="payment-notice">
                    Cash payments are not accepted at this spaceport.
                </div>
                
                <div class="payment-method active" id="credit-card-method">
                    <h4>Credit/Debit Card</h4>
                    <div class="form-group" id="card-number-group">
                        <label>Card Number</label>
                        <input type="text" placeholder="1234 5678 9012 3456" id="card-number">
                        <div class="error-message">Please enter a valid card number</div>
                    </div>
                    
                    <div class="card-details">
                        <div class="form-group" id="expiry-date-group">
                            <label>Expiry Date</label>
                            <input type="text" placeholder="MM/YY" id="expiry-date">
                            <div class="error-message">Please enter expiry date</div>
                        </div>
                        <div class="form-group" id="cvv-group">
                            <label>Security Code</label>
                            <input type="text" placeholder="CVV" id="cvv">
                            <div class="error-message">Please enter CVV</div>
                        </div>
                    </div>
                </div>
                
                <div class="payment-method" id="apple-pay-method">
                    <h4>Apple Pay</h4>
                    <button class="wallet-button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                        </svg>
                        Pay with Apple Pay
                    </button>
                </div>
                
                <div class="payment-method" id="google-pay-method">
                    <h4>Google Pay</h4>
                    <button class="wallet-button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3.064 7.51A9.996 9.996 0 0 1 12 2c2.695 0 4.959.991 6.69 2.605l-2.867 2.868C14.786 6.482 13.468 5.977 12 5.977c-2.605 0-4.81 1.76-5.595 4.123-.2.6-.314 1.24-.314 1.9 0 .66.114 1.3.314 1.9.786 2.364 2.99 4.123 5.595 4.123 1.345 0 2.49-.355 3.386-.955a4.6 4.6 0 0 0 1.996-3.018H12v-3.868h9.418c.118.654.182 1.336.182 2.045 0 3.046-1.09 5.61-2.982 7.35C16.964 21.105 14.7 22 12 22A9.996 9.996 0 0 1 2 12c0-1.614.386-3.14 1.064-4.49z"/>
                        </svg>
                        Pay with Google Pay
                    </button>
                </div>
                
                <div class="btn-container">
                    <button class="btn btn-outline" id="back-to-profiling">Back</button>
                    <button class="btn btn-primary" id="pay-now-btn" disabled>Pay Now</button>
                </div>
            </div>

            <!-- Confirmation Section -->
            <div class="form-section" id="confirmation-section">
                <h2 class="section-title">Booking Confirmed</h2>
                
                <div class="confirmation-section">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                         <!-- Edit this base on user info -->
                    <h3 class="confirmation-title">Your stellar journey awaits</h3>
                    <div class="confirmation-detail">
                        <strong>Reference:</strong> STL-7842-295
                    </div>
                    <div class="confirmation-detail">
                        <strong>Departure:</strong> Earth Spaceport
                    </div>
                    <div class="confirmation-detail">
                        <strong>Destination:</strong> Mars Colony One
                    </div>
                    <div class="confirmation-detail">
                        <strong>Date:</strong> 15 Nov 2023
                    </div>
                    <div class="confirmation-detail">
                        <strong>Time:</strong> 15:45 GST
                    </div>
                    <div class="confirmation-detail">
                        <strong>Passenger:</strong> <span id="confirmed-name"></span>
                    </div>
                </div>
                
                <div class="ticket">
                    <h3>Your E-Ticket</h3>
                    <p>Your ticket has been sent to <strong id="confirmed-email"></strong></p>
                    <button class="btn btn-primary">Download Ticket</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/pages/booking/assets/js/script.js"></script>
</body>
</html>