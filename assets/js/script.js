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



document.addEventListener('DOMContentLoaded', function () {
    // Twinkling stars logic...

    const loginBtn = document.querySelector('.login-btn');

    loginBtn.addEventListener('click', async () => {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;


        const res = await fetch('/handlers/login.handler.php', {

            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username, password })
        });

        const result = await res.json();

        if (result.success) {
            alert(`Welcome ${result.fullname}! Redirecting to ${result.role} dashboard...`);
            window.location.href = result.role === 'admin' ? '/pages/adminpage/admin.php' : '/pages/ClientMain/ClientMain.php';
        } else {
            alert(result.message);
        }
    });
});
