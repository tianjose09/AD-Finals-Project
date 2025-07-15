document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(document.querySelectorAll('.carousel-slide'));
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');

    // Clone slides for infinite loop
    const cloneCount = 5; // Number of visible slides
    const clonedSlides = [];

    for (let i = 0; i < cloneCount; i++) {
        const clone = slides[i].cloneNode(true);
        track.appendChild(clone);
        clonedSlides.push(clone);
    }

    for (let i = slides.length - cloneCount; i < slides.length; i++) {
        const clone = slides[i].cloneNode(true);
        track.insertBefore(clone, track.firstChild);
        clonedSlides.push(clone);
    }

    const allSlides = Array.from(document.querySelectorAll('.carousel-slide'));
    const slideCount = allSlides.length;
    const visibleSlides = 5;
    let currentIndex = cloneCount;

    allSlides.forEach((slide, index) => {
        slide.style.left = `${index * (100 / visibleSlides)}%`;
    });

    function moveToSlide(index) {
        allSlides.forEach(slide => {
            slide.style.transform = 'scale(1)';
            slide.style.zIndex = '1';
        });

        track.style.transform = `translateX(-${index * (100 / visibleSlides)}%)`;

        const centerIndex = index + 2;
        if (allSlides[centerIndex]) {
            allSlides[centerIndex].style.transform = 'scale(1.2)';
            allSlides[centerIndex].style.zIndex = '2';
        }

        currentIndex = index;
    }

    function handleLoop() {
        if (currentIndex >= slideCount - cloneCount) {
            track.style.transition = 'none';
            currentIndex = cloneCount;
            track.style.transform = `translateX(-${currentIndex * (100 / visibleSlides)}%)`;
            void track.offsetWidth;
            track.style.transition = 'transform 0.5s ease';
        } else if (currentIndex <= 0) {
            track.style.transition = 'none';
            currentIndex = slideCount - cloneCount * 2;
            track.style.transform = `translateX(-${currentIndex * (100 / visibleSlides)}%)`;
            void track.offsetWidth;
            track.style.transition = 'transform 0.5s ease';
        }
    }

    nextBtn.addEventListener('click', function() {
        moveToSlide(currentIndex + 1);
        setTimeout(handleLoop, 500);
    });

    prevBtn.addEventListener('click', function() {
        moveToSlide(currentIndex - 1);
        setTimeout(handleLoop, 500);
    });

    moveToSlide(currentIndex);

    window.addEventListener('resize', () => {
        moveToSlide(currentIndex);
    });

    // Account dropdown toggle
    const accountItem = document.querySelector('.account-item');
    if (accountItem) {
        accountItem.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!accountItem.contains(e.target)) {
                accountItem.classList.remove('active');
            }
        });
    }

    // Logout logic
    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            window.location.href = '/main.php?logout=1';
            alert('Logging out...');
        });
    }

    // Logo click redirect
    const logo = document.querySelector('.logo img');
    if (logo) {
        logo.style.cursor = 'pointer';
        logo.addEventListener('click', () => {
            window.location.href = '/pages/ClientMain/ClientMain.php';
        });
    }

    // Scroll to Explore section
    const exploreNav = document.getElementById('explore-nav');
    if (exploreNav) {
        exploreNav.addEventListener('click', () => {
            const exploreSection = document.getElementById('explore-section');
            if (exploreSection) {
                exploreSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Booking nav redirect
    const bookNav = document.getElementById('book-nav');
    if (bookNav) {
        bookNav.addEventListener('click', function () {
            window.location.href = '/pages/booking1/booking1.php';
        });
    }

    // About Us nav redirect
    const aboutNav = document.getElementById('about-nav');
    if (aboutNav) {
        aboutNav.addEventListener('click', () => {
            window.location.href = '/pages/aboutus/aboutus.php';
        });
    }

    // Book button redirect
    const bookBtn = document.getElementById('btn-book');
    if (bookBtn) {
        bookBtn.addEventListener('click', function () {
            window.location.href = '/pages/booking1/booking1.php';
        });
    }
});
