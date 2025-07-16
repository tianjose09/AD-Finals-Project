// 🌌 STAR BACKGROUND
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
window.addEventListener('load', createStars);

// 🌐 Dropdown & Navigation
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

    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            alert('Logging out...');
            window.location.href = '/main.php?logout=1';
        });
    }

    // Auto scroll to sections
    const flightBtn = document.getElementById('flight-schedule-btn');
    const passengerBtn = document.getElementById('passenger-management-btn');

    flightBtn?.addEventListener('click', () => {
        const section = document.getElementById('flight-schedule-control');
        if (section) section.scrollIntoView({ behavior: 'smooth' });
    });

    passengerBtn?.addEventListener('click', () => {
        const section = document.getElementById('passenger-management');
        if (section) section.scrollIntoView({ behavior: 'smooth' });
    });
});
