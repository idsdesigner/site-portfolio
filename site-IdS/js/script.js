document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.querySelector('.menu-toggle');
  const navHome = document.querySelector('.nav-home');

  menuToggle.addEventListener('click', () => {
    navHome.classList.toggle('open');
  });
});
