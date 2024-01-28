const menu = document.querySelector('#mobile-menu')
const menuLinks = document.querySelector('.navbar_menu')
const navLinks = document.querySelectorAll('.nav_links li');
const blurbgr = document.querySelector('#blur');
const mobileMenu = () => {
    menu.classList.toggle('is-active')
    menuLinks.classList.toggle('active')
}
menu.addEventListener('click', mobileMenu);


const navSlide = () => {
    const mobile = document.querySelector('#mobile-menu');
    const nav = document.querySelector('.navbar_menu');
    const navLinks = document.querySelectorAll('.navbar_menu li');

    mobile.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
    
        navLinks.forEach((link, index) => {
        if(link.style.animation) {
            link.style.animation = ``;
        } else {
        link.style.animation = `navLinkFade 0.5 ease forwards ${index / 7 + 1.5}s`;}
    });

    mobile.classList.toggle('toggle');
    });
}
navSlide();

var nr = 1;
var delay;
function isEven(n) {
    return (n % 2 == 1);
}

const blurMenu = () => {
    if(isEven(nr))
    {   
        delay = 550;
    }
    else
    {
        delay = 0;
    }
        setTimeout(() => 
        blurbgr.classList.toggle('is-active'), delay);
        nr = nr + 1;
    }
menu.addEventListener('click', blurMenu);

