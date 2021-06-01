const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector("#menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    menu.classList.toggle("active");
}

const mot = document.querySelectorAll("#mot");

mot.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    menu.classList.remove("active");
}

var btnPopup = document.getElementById('btnPopup');
var overlay = document.getElementById('overlay');
var btnClose = document.getElementById('btnClose');



btnPopup.addEventListener('click', openPopup);
btnClose.addEventListener('click', closePopUp);

function openPopup(){
    overlay.style.display = 'flex';

    var x = document.getElementById("fname").value;
    document.getElementById("primo").innerHTML = x;
    
    var x = document.getElementById("lname").value;
    document.getElementById("secondo").innerHTML = x;

    var x = document.getElementById("pays").value;
    document.getElementById("tertio").innerHTML = x;

    var x = document.getElementById("msg").value;
    document.getElementById("quatro").innerHTML = x;

}

function closePopUp(){
    overlay.style.display = 'none';
}