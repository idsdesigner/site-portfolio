let slideIndex = 0;

function showSlides() {
    const slides = document.querySelector('.carousel-slide');
    const totalSlides = slides.children.length;
    const visibleSlides = 3.5; // 3 inteiros e 0.5 (metade do 4º post)
    
    if (slideIndex < 0) {
        slideIndex = totalSlides - visibleSlides; // Vai para o final
    } else if (slideIndex > totalSlides - visibleSlides) {
        slideIndex = 0; // Volta para o início
    }

    const offset = -(slideIndex * 100 / visibleSlides); // Movimenta o carrossel
    slides.style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    slideIndex++;
    showSlides();
}

function prevSlide() {
    slideIndex--;
    showSlides();
}

// Inicializar carrossel
showSlides();
