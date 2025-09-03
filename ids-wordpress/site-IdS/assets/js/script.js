document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.querySelector('.menu-toggle');
  const navHome = document.querySelector('.nav-home');

  menuToggle.addEventListener('click', () => {
    navHome.classList.toggle('open');
  });
});

// scroll-animations.js
document.addEventListener('DOMContentLoaded', function() {
    
    // Configuração do Intersection Observer
    const observerOptions = {
        threshold: 0.1, // Quando 10% do elemento estiver visível
        rootMargin: '0px 0px -50px 0px' // Margem para trigger
    };

    // Função callback do observer
    const observerCallback = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Adiciona classe de animação
                entry.target.classList.add('animate-in');
                
                // Para de observar o elemento (animação única)
                observer.unobserve(entry.target);
            }
        });
    };

    // Cria o observer
    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Elementos para animar
    const elementsToAnimate = document.querySelectorAll([
        '.hero h1',
        '.hero p',
        '.btns',
        '.portfolio-category',
        '.about-section',
        '.contact-section',
        '.card-projeto-home',
        '.card-arte-portfolio'
    ].join(', '));

    // Adiciona classe inicial e observa elementos
    elementsToAnimate.forEach((el, index) => {
        // Adiciona delay escalonado
        el.style.setProperty('--animation-delay', `${index * 0.1}s`);
        el.classList.add('animate-element');
        observer.observe(el);
    });

    // Animação específica para hashtags
    const hashtags = document.querySelector('.hashtags');
    if (hashtags) {
        observer.observe(hashtags);
    }

    // Animação dos cards de projeto com delay
    const projectCards = document.querySelectorAll('.card-projeto-home');
    projectCards.forEach((card, index) => {
        card.style.setProperty('--animation-delay', `${index * 0.2}s`);
    });
});

// Função para animação de entrada suave na página
window.addEventListener('load', function() {
    document.body.classList.add('page-loaded');
});

// Animação de scroll suave para links internos
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});