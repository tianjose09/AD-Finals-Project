// Twinkle stars
const starsContainer = document.getElementById('stars');
for (let i = 0; i < 100; i++) {
    const star = document.createElement('div');
    star.classList.add('star');

    const size = Math.random() * 3;
    star.style.width = `${size}px`;
    star.style.height = `${size}px`;

    star.style.left = `${Math.random() * 100}%`;
    star.style.top = `${Math.random() * 100}%`;


    star.style.animationDelay = `${Math.random() * 2}s`;

    starsContainer.appendChild(star);
}

const loadingTexts = [
    "Fueling the engines...",
    "Checking systems...",
    "Final countdown...",
    "Clearing launch pad...",
    "Ignition sequence start..."
];

const loadingTextElement = document.querySelector('.loading-text');
let currentIndex = 0;

setInterval(() => {
    currentIndex = (currentIndex + 1) % loadingTexts.length;
    loadingTextElement.textContent = loadingTexts[currentIndex];
}, 3000);
