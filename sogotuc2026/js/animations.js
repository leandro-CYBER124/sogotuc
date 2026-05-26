
// Declaraciones generales
const baseURL = getBaseUrl();

// Animación de cierre para el menú móvil al hacer click en un enlace interno.
const mobileMenu = new bootstrap.Offcanvas('#mobileMenu');
const mobileLinks = document.querySelectorAll('.mobile-menu-link');

mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.hide();
        });
    }
);

// Animación de card 3D
const cards = document.querySelectorAll('.card3d');

cards.forEach(card => {
    card.addEventListener('mousemove', rotateCard);
    card.addEventListener('mouseout', stopRotateCard);
});

function rotateCard(e){
    const cardItem = e.currentTarget.querySelector('.card3d__content');
    const rect = cardItem.getBoundingClientRect();

    // Calcula el centro de la card
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;

    // Diferencia entre la posición del mouse y el centro de la card
    const deltaX = e.clientX - centerX;
    const deltaY = e.clientY - centerY;

    // Calcula el ángulo de giro
    const rotateX = (deltaY / rect.height) * 15;
    const rotateY = -(deltaX / rect.width) * 15;

    // Aplicar las transformaciones
    cardItem.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
}

function stopRotateCard(e){
    const cardItem = e.currentTarget.querySelector('.card3d__content');
    cardItem.style.transform = 'rotateX(0) rotateY(0)';
}

// Animación del header según posición vertical de la página
const header = document.querySelector('.header-home');
const brandLight = document.querySelector('.header__logoLight--home');
const brandColor = document.querySelector('.header__logoColor--home');
const mainMenu = document.querySelector('.main-menu--home');

window.addEventListener('scroll', () => {
    let scrollY = window.scrollY;

    if(scrollY > 100){
        header.classList.add('header--scroll');
        brandLight.classList.add('d-none');
        brandColor.classList.remove('d-none');
        mainMenu.classList.add('main-menu--scroll');
    } else {
        header.classList.remove('header--scroll');
        brandLight.classList.remove('d-none');
        brandColor.classList.add('d-none');
        mainMenu.classList.remove('main-menu--scroll');
    }
});