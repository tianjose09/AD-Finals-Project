/* ============================================================
   Decorative twinkling‑star background
   ============================================================ */
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
        star.style.setProperty('--opacity',  Math.random() * 0.7 + 0.3);
        star.style.setProperty('--duration', Math.random() * 5   + 3 + 's');
        star.style.animationDelay = Math.random() * 5 + 's';
        body.appendChild(star);
    }

    /* ============================================================
       Sign‑Up Submit Handler
       ============================================================ */
    const signupBtn = document.querySelector('.signup-btn');

    signupBtn.addEventListener('click', async () => {
        const fullname = document.getElementById('fullname').value.trim();
        const username = document.getElementById('username').value.trim();
        const contact  = document.getElementById('contact').value.trim();
        const password = document.getElementById('password').value;

        /* ---------- Client‑side validation ---------- */
        if (!fullname || !username || !contact || !password) {
            alert('Please fill in all required fields.');
            return;
        }

        if (!/^\d{11}$/.test(contact)) {
            alert('Contact number must be exactly 11 digits.');
            return;
        }

        const strongPW =
            /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=~`{}\[\]:;"'<>,.?\/\\|]).{8,}$/;
        if (!strongPW.test(password)) {
            alert('Weak password. It must include:\n• 1 uppercase letter\n• 1 number\n• 1 special character\n• Minimum 8 characters');
            return;
        }

        /* ---------- POST to the PHP handler ---------- */
        try {
            const res = await fetch('/utils/handlesignup.php', {
                method : 'POST',
                headers: { 'Content-Type': 'application/json' },
                body   : JSON.stringify({ fullname, username, contact, password })
            });

            const result = await res.json();

            if (result.success) {
                alert(result.message);
                window.location.href = '/main.php';  // adjust if needed
            } else {
                alert(result.message);               // shows duplicate‑field errors too
            }
        } catch (err) {
            console.error(err);
            alert('Network or server error. Please try again.');
        }
    });
});

const normalizeName = name =>
    name.trim().replace(/\s+/g, ' ')         // remove wide spaces
        .toLower().replace(/\b\w/g, c => c.toUpperCase()); // capitalize

const fullname = normalizeName(document.getElementById('fullname').value);
