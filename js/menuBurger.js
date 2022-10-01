const hamburgerButton = document.querySelector(".nav-toggler");
const navigation = document.querySelector("nav");
const dropdownClick = document.querySelector(".click_drop");
const dropdown = document.querySelector(".drop_down");

hamburgerButton.addEventListener("click", toggleNav);
dropdownClick.addEventListener("click", toggleLi);

function toggleNav() {
    hamburgerButton.classList.toggle("active");
    navigation.classList.toggle("active");
    dropdown.classList.remove("active");
}

function toggleLi() {
    console.log("clik");
    dropdown.classList.toggle("active");
}