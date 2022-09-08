let burgerMenu = document.getElementById('menuBurger');

let overlay = document.getElementById('menu');

burgerMenu.addEventListener('click', function() {
    console.log('click');
    this.classList.toggle("close");
    overlay.classList.toggle("overlay");
});