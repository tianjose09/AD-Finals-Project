// ⭐  Twinkling stars (your existing code)  ⭐
document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const starCount = 96;
    for (let i = 0; i < starCount; i++) {
        const star = document.createElement('div');
        star.classList.add('star');
        const size = Math.random() * 3 + 1;
        star.style.width  = `${size}px`;
        star.style.height = `${size}px`;
        star.style.left   = `${Math.random() * window.innerWidth}px`;
        star.style.top    = `${Math.random() * window.innerHeight}px`;
        star.style.setProperty('--opacity', Math.random() * 0.7 + 0.3);
        star.style.setProperty('--duration', Math.random() * 5 + 3 + 's');
        star.style.animationDelay = Math.random() * 5 + 's';
        body.appendChild(star);
    }

    /* ---------- SIGN‑UP SUBMIT ---------- */
    const signupBtn = document.querySelector('.signup-btn');
    signupBtn.addEventListener('click', async () => {
        console.log("Sign up button clicked!");
        const fullname = document.getElementById('fullname').value.trim();
        const username = document.getElementById('username').value.trim();
        const contact  = document.getElementById('contact').value.trim();
        const password = document.getElementById('password').value;

        if (!fullname || !username || !password) {
            alert('Please fill in all required fields.');
            return;
        }

        const res = await fetch('/utils/handlesignup.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fullname, username, contact, password })
        });
        const result = await res.json();

        if (result.success) {
            alert(result.message);
            // Redirect to login page
            window.location.href = '/main.php'; // adjust path
        } else {
            alert(result.message);
        }
    });
});
