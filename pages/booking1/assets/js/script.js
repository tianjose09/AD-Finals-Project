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

