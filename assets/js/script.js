document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;
    const starCount = 100;
    
    for (let i = 0; i < starCount; i++) {
        const star = document.createElement('div');
        star.classList.add('star');
        
        const size = Math.random() * 3 + 1;
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;
        const opacity = Math.random() * 0.7 + 0.3;
        const duration = Math.random() * 5 + 3 + 's';
        const delay = Math.random() * 5 + 's';
        
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        star.style.left = `${x}px`;
        star.style.top = `${y}px`;
        star.style.setProperty('--opacity', opacity);
        star.style.setProperty('--duration', duration);
        star.style.animationDelay = delay;
        
        body.appendChild(star);
    }
});