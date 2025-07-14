document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(document.querySelectorAll('.carousel-slide'));
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');
    
    // Clone slides for infinite loop
    const cloneCount = 5; // Number of visible slides
    const clonedSlides = [];
    
    // Clone first few slides and append to end
    for (let i = 0; i < cloneCount; i++) {
        const clone = slides[i].cloneNode(true);
        track.appendChild(clone);
        clonedSlides.push(clone);
    }
    
    // Clone last few slides and prepend to beginning
    for (let i = slides.length - cloneCount; i < slides.length; i++) {
        const clone = slides[i].cloneNode(true);
        track.insertBefore(clone, track.firstChild);
        clonedSlides.push(clone);
    }
    
    const allSlides = Array.from(document.querySelectorAll('.carousel-slide'));
    const slideCount = allSlides.length;
    const visibleSlides = 5;
    let currentIndex = cloneCount; // Start at first original slide
    
    // Arrange slides
    allSlides.forEach((slide, index) => {
        slide.style.left = `${index * (100 / visibleSlides)}%`;
    });
    
    // Move to slide with loop handling
    function moveToSlide(index) {
        // Reset all slides
        allSlides.forEach(slide => {
            slide.style.transform = 'scale(1)';
            slide.style.zIndex = '1';
        });
        
        // Move track
        track.style.transform = `translateX(-${index * (100 / visibleSlides)}%)`;
        
        // Make center slide larger
        const centerIndex = index + 2;
        if (allSlides[centerIndex]) {
            allSlides[centerIndex].style.transform = 'scale(1.2)';
            allSlides[centerIndex].style.zIndex = '2';
        }
        
        currentIndex = index;
    }
    
    // Handle seamless looping
    function handleLoop() {
        if (currentIndex >= slideCount - cloneCount) {
            // Jump to clone at beginning without animation
            track.style.transition = 'none';
            currentIndex = cloneCount;
            track.style.transform = `translateX(-${currentIndex * (100 / visibleSlides)}%)`;
            // Force reflow
            void track.offsetWidth;
            track.style.transition = 'transform 0.5s ease';
        } 
        else if (currentIndex <= 0) {
            // Jump to clone at end without animation
            track.style.transition = 'none';
            currentIndex = slideCount - cloneCount * 2;
            track.style.transform = `translateX(-${currentIndex * (100 / visibleSlides)}%)`;
            // Force reflow
            void track.offsetWidth;
            track.style.transition = 'transform 0.5s ease';
        }
    }
    
    // Next button
    nextBtn.addEventListener('click', function() {
        moveToSlide(currentIndex + 1);
        setTimeout(handleLoop, 500); // Check after animation completes
    });
    
    // Previous button
    prevBtn.addEventListener('click', function() {
        moveToSlide(currentIndex - 1);
        setTimeout(handleLoop, 500); // Check after animation completes
    });
    
    // Initialize
    moveToSlide(currentIndex);
    
    // Auto-center on window resize
    window.addEventListener('resize', () => {
        moveToSlide(currentIndex);
    });
});

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
                });
            }
        });

document.addEventListener('DOMContentLoaded', () => {
    const logo = document.querySelector('.logo img');   // or `.logo`
    if (logo) {
        logo.style.cursor = 'pointer';                  // optional – shows it’s clickable
        logo.addEventListener('click', () => {
            window.location.href = '/pages/ClientMain/ClientMain.php';
        });
    }
});

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

document.addEventListener('DOMContentLoaded', function () {
    const bookNav = document.getElementById('book-nav');
    if (bookNav) {
        bookNav.addEventListener('click', function () {
            window.location.href = '/pages/booking1/booking.php';
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

// Redirect to booking page when #header is clicked
document.addEventListener('DOMContentLoaded', function () {
    const bookBtn = document.getElementById('btn-book');
    if (bookBtn) {
        bookBtn.addEventListener('click', function () {
            window.location.href = '/pages/booking1/booking.php';
        });
    }
});


