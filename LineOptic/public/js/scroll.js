////////////////////////ON SCROLL SERVICES/////////////////////////////
// var scrollElements = document.querySelectorAll(".js-scoll");

// scrollElements.forEach((el) => {
//     el.style.opacity = 0
// })

window.onscroll = function()  {scrollFunction()};

function scrollFunction(){

    if(window.screen.width >=768){
        console.log(window.screen.width);
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.querySelector(".nav_desk").style.padding = "0 5%";
        } else {
            document.querySelector(".nav_desk").style.padding = "2.5% 5%";
        }
    }
}
