let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides; // Vuelve al primer slide al final
    showSlide(currentIndex);
}

// Muestra el primer slide al cargar
showSlide(currentIndex);
setInterval(nextSlide, 3000); // Cambia de slide cada 3 segundos
