document.addEventListener("DOMContentLoaded", function() {
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevButton = document.querySelector('.carousel-control-prev');
    const nextButton = document.querySelector('.carousel-control-next');
    let currentIndex = 0;
    let timer; // Variable pour le timer automatique

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
        timer = setInterval(nextSlide, 4000); // Changer d'image toutes les 4 secondes
    }

    function stopCarousel() {
        clearInterval(timer);
    }

    // Initialisation de l'affichage
    showSlide(currentIndex);
    startCarousel(); // Démarrer le carrousel automatique

    // Gestion des événements des boutons de contrôle
    nextButton.addEventListener('click', () => {
        nextSlide();
        stopCarousel(); // Arrêter le carrousel automatique lorsqu'on navigue manuellement
        startCarousel(); // Redémarrer le carrousel automatique après la navigation manuelle
    });
    prevButton.addEventListener('click', () => {
        prevSlide();
        stopCarousel(); // Arrêter le carrousel automatique lorsqu'on navigue manuellement
        startCarousel(); // Redémarrer le carrousel automatique après la navigation manuelle
    });

    // Gestion automatique du carrousel
    document.querySelector('.carousel').addEventListener('mouseover', stopCarousel); // Arrêter le carrousel en survol
    document.querySelector('.carousel').addEventListener('mouseout', startCarousel); // Redémarrer le carrousel à la sortie du survol

});
