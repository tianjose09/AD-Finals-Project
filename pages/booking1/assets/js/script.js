// 🌌 STAR BACKGROUND
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

// ✈️ PASSENGER COUNTER
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

// 🔁 SWAP DESTINATIONS
document.getElementById('swapBtn')?.addEventListener('click', () => {
  const from = document.getElementById('from');
  const to = document.getElementById('to');
  const temp = from.value;
  from.value = to.value;
  to.value = temp;
});

// 🎫 BOOKING CONFIRMATION
function proceedToBooking(flightId) {
  const confirmBooking = confirm("Do you want to continue to booking?");
  if (confirmBooking) {
    window.location.href = `/pages/bookingconfirmation/bookingconfirmation.php?flight_id=${flightId}`;
  }
}

// 👤 ACCOUNT DROPDOWN
document.addEventListener('DOMContentLoaded', function () {
  const accountItem = document.querySelector('.account-item');

  if (accountItem) {
    accountItem.addEventListener('click', function (e) {
      e.stopPropagation();
      this.classList.toggle('active');
    });

    document.addEventListener('click', function (e) {
      if (!accountItem.contains(e.target)) {
        accountItem.classList.remove('active');
      }
    });
  }

  // 🚪 Logout
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

  // 🔗 Navigation buttons
  const bookBtn = document.getElementById('btn-book');
  if (bookBtn) {
    bookBtn.addEventListener('click', function () {
      window.location.href = '/pages/booking1/booking1.php';
    });
  }

  const bookNav = document.getElementById('book-nav');
  if (bookNav) {
    bookNav.addEventListener('click', function () {
      window.location.href = '/pages/booking1/booking1.php';
    });
  }

  const aboutNav = document.getElementById('about-nav');
  if (aboutNav) {
    aboutNav.addEventListener('click', () => {
      window.location.href = '/pages/aboutus/aboutus.php';
    });
  }

  const exploreBtn = document.getElementById('explore-nav');
  if (exploreBtn) {
    exploreBtn.style.cursor = 'pointer';
    exploreBtn.addEventListener('click', () => {
      window.location.href = '/pages/ClientMain/ClientMain.php';
    });
  }

  // ✨ SEARCH FLIGHTS — ✅ ADDED HERE
  const searchBtn = document.getElementById('searchBtn');
  if (searchBtn) {
    searchBtn.addEventListener('click', () => {
      const to = document.getElementById('to').value.trim();
      const date = document.getElementById('date').value;

      const flightTable = document.querySelector(".flights-table");
      const rows = flightTable.querySelectorAll(".flights-row:not(.flights-header-row)");
      rows.forEach(row => row.remove());

      fetch(`/handlers/booking.handler.php?to=${encodeURIComponent(to)}&date=${encodeURIComponent(date)}`)
        .then(response => {
          if (!response.ok) throw new Error("HTTP error " + response.status);
          return response.json();
        })
        .then(data => {
          if (!data.success) {
            flightTable.innerHTML += `
              <div class="flights-row"><div class="flights-cell" colspan="5">❌ ${data.error}</div></div>`;
            return;
          }

          if (data.flights.length === 0) {
            flightTable.innerHTML += `
              <div class="flights-row"><div class="flights-cell" colspan="5">No flights found.</div></div>`;
            return;
          }

          data.flights.forEach(flight => {
            const departureTime = new Date(flight.departure_time).toLocaleString('en-US', {
              day: '2-digit', month: 'short', year: 'numeric',
              hour: '2-digit', minute: '2-digit'
            });

            const returnTime = new Date(flight.return_time).toLocaleString('en-US', {
              day: '2-digit', month: 'short', year: 'numeric',
              hour: '2-digit', minute: '2-digit'
            });

            const row = `
            <div class="flights-row">
                <div class="flights-cell">${flight.arrival_planet_name}</div>
                <div class="flights-cell">${flight.departure_planet_name} → ${flight.arrival_planet_name}</div>
                <div class="flights-cell">${departureTime} → ${returnTime}</div>
                <div class="flights-cell">${flight.flight_number}</div>
                <div class="flights-cell">$${parseFloat(flight.price).toLocaleString()}</div>
                <div class="flights-cell">
                <button class="select-btn" onclick="proceedToBooking('${flight.id}')">Select</button>
                </div>
            </div>
            `;

            flightTable.innerHTML += row;
          });

          const flightsContainer = document.querySelector(".flights-container");
          if (flightsContainer) {
            flightsContainer.scrollIntoView({ behavior: "smooth" });
          }
        })
        .catch(error => {
          console.error("Error fetching filtered flights:", error);
          flightTable.innerHTML += `
            <div class="flights-row"><div class="flights-cell" colspan="5">⚠️ Error loading flights.</div></div>`;
        });
    });
  }
});
