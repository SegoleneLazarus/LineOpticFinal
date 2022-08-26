///////////SLIDER EQUIPE////////////////////////////////
var articles_slider = document.querySelectorAll('.article_slider');

let etape = 0;

let nombre_articles = articles_slider.length;

let precedent = document.querySelector(".precedent");
let suivant = document.querySelector(".suivant");

function enleverActiveArticle() {
    for (let i = 0; i < nombre_articles; i++) {
        articles_slider[i].classList.remove("active");
    }
}


suivant.addEventListener('click', function() {
    etape++;
    if (etape >= nombre_articles) {
        etape = 0;
    }
    enleverActiveArticle();
    articles_slider[etape].classList.add("active");
})

precedent.addEventListener('click', function() {
    etape--;
    if (etape <= 0) {
        etape = nombre_articles - 1;
    }
    enleverActiveArticle();
    articles_slider[etape].classList.add("active");
})

function interval(){
    etape++;
    if (etape >= nombre_articles) {
        etape = 0;
    }
    enleverActiveArticle();
    articles_slider[etape].classList.add("active");

}


setInterval(interval, 5000);

