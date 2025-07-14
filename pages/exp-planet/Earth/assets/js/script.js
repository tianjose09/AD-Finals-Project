document.addEventListener('DOMContentLoaded', function() {
    const slide = document.querySelector('.carousel-slide');
    const images = document.querySelectorAll('.carousel-slide img');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    
    // Clone first and last images for infinite effect
    const firstClone = images[0].cloneNode(true);
    const lastClone = images[images.length - 1].cloneNode(true);
    
    // Add clones to the slide
    slide.appendChild(firstClone);
    slide.insertBefore(lastClone, images[0]);
    
    // Re-select images after cloning
    const allImages = document.querySelectorAll('.carousel-slide img');
    let counter = 1; // Start at 1 to account for the cloned last image
    const size = allImages[0].clientWidth;
    
    // Set initial position
    slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    
    // Next button
    nextBtn.addEventListener('click', () => {
        if (counter >= allImages.length - 1) return;
        slide.style.transition = "transform 0.5s ease-in-out";
        counter++;
        slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    });
    
    // Previous button
    prevBtn.addEventListener('click', () => {
        if (counter <= 0) return;
        slide.style.transition = "transform 0.5s ease-in-out";
        counter--;
        slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    });
    
    // Infinite loop logic
    slide.addEventListener('transitionend', () => {
        if (allImages[counter] === firstClone) {
            slide.style.transition = "none";
            counter = 1;
            slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        }
        if (allImages[counter] === lastClone) {
            slide.style.transition = "none";
            counter = allImages.length - 2;
            slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        const newSize = allImages[0].clientWidth;
        slide.style.transition = "none";
        slide.style.transform = 'translateX(' + (-newSize * counter) + 'px)';
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
                    // window.location.href = '/logout';
                });
            }
        });

document.addEventListener('DOMContentLoaded', function () {
    const bookBtn = document.getElementById('btn-book');
    if (bookBtn) {
        bookBtn.addEventListener('click', function () {
            window.location.href = '/pages/booking1/booking.php';
        });
    }
});