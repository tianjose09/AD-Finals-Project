<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Details</title>
    <link rel="stylesheet" href="/pages/booking/assets/css/styles.css.css">
</head>
<body>
    <!-- Background Elements -->
    <div class="stars" id="stars"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="form-container">
        <div class="form-header">
            <h1 class="form-title">Teddiursa Airlines</h1>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar" id="progress-bar">
                <div class="progress-fill" id="progress-fill"></div>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="progress-steps">
            <div class="step completed" data-step="1">
                <div class="step-circle">✓</div>
                <div class="step-label">Destination</div>
            </div>
            <div class="step active" id="profiling-step" data-step="2">
                <div class="step-circle">2</div>
                <div class="step-label">Profiling</div>
            </div>
            <div class="step" id="payment-step" data-step="3">
                <div class="step-circle">3</div>
                <div class="step-label">Payment</div>
            </div>
            <div class="step" id="confirmation-step" data-step="4">
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
                    Please prepare the exact amount for faster transaction.
                </div>
                
                <div class="payment-method active" id="cash-method">
                    <h4>Cash Payment</h4>
                    <div class="form-group" id="amount-group">
                        <label>Amount Paid</label>
                        <input type="number" placeholder="Enter amount" id="amount-paid" min="0" step="0.01">
                        <div class="error-message">Please enter a valid amount</div>
                    </div>
                    
                    <div class="payment-amount">
                        <div class="amount-row">
                            <span class="amount-label">Total Amount Due:</span>
                            <span class="amount-value" id="total-amount">$1,250.00</span>
                        </div>
                        <div class="amount-row">
                            <span class="amount-label">Amount Paid:</span>
                            <span class="amount-value" id="display-paid">$0.00</span>
                        </div>
                        <div class="amount-row">
                            <span class="amount-label">Change:</span>
                            <span class="amount-value change-value" id="change-amount">$0.00</span>
                        </div>
                    </div>
                </div>
                
                <div class="btn-container">
                    <button class="btn btn-outline" id="back-to-profiling">Back</button>
                    <button class="btn btn-primary" id="pay-now-btn" disabled>Complete Payment</button>
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
                    
                    <h3 class="confirmation-title">Your stellar journey awaits, <span id="confirmed-first-name"></span>!</h3>
                    <div class="confirmation-detail">
                        <strong>Reference:</strong> STL-<span id="booking-ref"></span>
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
                    <div class="confirmation-detail">
                        <strong>Gender:</strong> <span id="confirmed-gender"></span>
                    </div>
                    <div class="confirmation-detail">
                        <strong>Nationality:</strong> <span id="confirmed-nationality"></span>
                    </div>
                    <div class="confirmation-detail">
                        <strong>Contact:</strong> <span id="confirmed-phone"></span>
                    </div>
                    <div class="confirmation-detail">
                        <strong>Passport:</strong> <span id="confirmed-passport"></span>
                    </div>
                    <div class="confirmation-detail">
                        <strong>Payment Method:</strong> Cash
                    </div>
                    <div class="confirmation-detail">
                        <strong>Amount Paid:</strong> <span id="confirmed-amount"></span>
                    </div>
                    <div class="confirmation-detail">
                        <strong>Change:</strong> <span id="confirmed-change"></span>
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