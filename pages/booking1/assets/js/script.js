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

// Create twinkling stars
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



document.addEventListener('DOMContentLoaded', function () {
    const bookBtn = document.getElementById('btn-book');
    if (bookBtn) {
        bookBtn.addEventListener('click', function () {
            window.location.href = '/pages/booking1/booking1.php';
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const bookNav = document.getElementById('book-nav');
    if (bookNav) {
        bookNav.addEventListener('click', function () {
            window.location.href = '/pages/booking1/booking1.php';
        });
    }
});

// Scroll or redirect to About Us page
const aboutNav = document.getElementById('about-nav');
if (aboutNav) {
    aboutNav.addEventListener('click', () => {
        window.location.href = '/pages/aboutus/aboutus.php';
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const exploreBtn = document.getElementById('explore-nav');
    if (exploreBtn) {
        exploreBtn.style.cursor = 'pointer';                // optional visual cue
        exploreBtn.addEventListener('click', () => {
            window.location.href = '/pages/ClientMain/ClientMain.php';
        });
    }
});