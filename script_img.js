document.addEventListener("DOMContentLoaded", function() {
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevButton = document.querySelector('.carousel-control-prev');
    const nextButton = document.querySelector('.carousel-control-next');
    let currentIndex = 0;
    let timer;

    function showSlide(index) {
        carouselItems.forEach(item => {
            item.classList.remove('active');
        });
        carouselItems[index].classList.add('active');
    }

    function nextSlide() {
        currentIndex++;
        if (currentIndex >= carouselItems.length) {
            currentIndex = 0;
        }
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = carouselItems.length - 1;
        }
        showSlide(currentIndex);
    }

    function startCarousel() {
        timer = setInterval(nextSlide, 4000);
    }

    function stopCarousel() {
        clearInterval(timer);
    }

    showSlide(currentIndex);
    startCarousel();

    nextButton.addEventListener('click', () => {
        nextSlide();
        stopCarousel();
        startCarousel();
    });

    prevButton.addEventListener('click', () => {
        prevSlide();
        stopCarousel();
        startCarousel();
    });

    document.querySelector('.carousel').addEventListener('mouseover', stopCarousel);
    document.querySelector('.carousel').addEventListener('mouseout', startCarousel);
});
