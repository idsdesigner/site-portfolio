let slideIndex = 0;

function showSlides() {
    const slides = document.querySelector('.carousel-slide');
    const totalSlides = slides.children.length;
    
    // Define o número de slides visíveis conforme o tamanho da tela
    let visibleSlides = window.innerWidth <= 850 ? 2.5 : 3.5;

    // Calcula o índice máximo para garantir que o último conjunto de slides seja totalmente visível
    const maxIndex = Math.ceil(totalSlides - visibleSlides);

    // Impede o índice de exceder o limite e causar o corte do último slide
    if (slideIndex < 0) {
        slideIndex = maxIndex;
    } else if (slideIndex > maxIndex) {
        slideIndex = 0;
    }

    // Calcula o deslocamento para centralizar o slide atual
    const offset = -(slideIndex * 100 / visibleSlides);
    slides.style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    const slides = document.querySelector('.carousel-slide');
    const totalSlides = slides.children.length;
    let visibleSlides = window.innerWidth <= 850 ? 2.5 : 3.5;

    // Calcula o índice máximo
    const maxIndex = Math.ceil(totalSlides - visibleSlides);

    // Somente aumenta o índice se ainda houver espaço para mostrar um slide completo
    if (slideIndex < maxIndex) {
        slideIndex++;
    } else {
        slideIndex = 0; // Volta ao início se o último slide estiver totalmente visível
    }
    showSlides();
}

function prevSlide() {
    const slides = document.querySelector('.carousel-slide');
    const totalSlides = slides.children.length;
    let visibleSlides = window.innerWidth <= 850 ? 2.5 : 3.5;

    // Calcula o índice máximo
    const maxIndex = Math.ceil(totalSlides - visibleSlides);

    // Somente diminui o índice se não ultrapassar o início do carrossel
    if (slideIndex > 0) {
        slideIndex--;
    } else {
        slideIndex = maxIndex; // Vai para o último conjunto de slides visíveis ao chegar no início
    }
    showSlides();
}

// Inicializa o carrossel e ajusta ao redimensionar a tela
window.addEventListener('resize', showSlides);
showSlides();
