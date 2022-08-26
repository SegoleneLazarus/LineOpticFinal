// HOVER & CLICK MOBILE NAVBAR
var nav_button = document.querySelectorAll(".nav_mobile img")
var nav_accueil = nav_button.querySelector("[src='img/accueil.svg']")
var nav_fournisseurs = nav_button.querySelector("[src='img/fournisseurs.svg']")
var nav_entreprise = nav_button.querySelector("[src='img/entreprise.svg']")
var nav_conseils = nav_button.querySelector("[src='img/conseils.svg']")
var nav_infos = nav_button.querySelector("[src='img/infos.svg']")


nav_button.onmouseover = function() {hoverNav()};

function hoverNav(){
    nav_button.setAttribute("src","_active")
}

nav_accueil.onmouseover = function() {hoverAccueil()};

function hoverAccueil(){
    nav_accueil.setAttribute("src","img/accueil_active.svg")
}