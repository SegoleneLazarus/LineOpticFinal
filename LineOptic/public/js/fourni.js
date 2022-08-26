var fournisseurs = document.querySelectorAll(".listeFournisseurs div");
var photos = document.querySelectorAll(".photos");

fournisseurs[0].style.borderBottom="15px solid black";

// fournisseurs[0].style.borderRight="10px solid black";

fournisseurs.forEach(fournisseur => fournisseur.addEventListener("click", function(){
    for (let trio of photos){
        trio.classList.remove("active1");
    }
    var classfournisseur = fournisseur.getAttribute("class");
    photos.forEach(photo => {
        if (photo.getAttribute("id") == classfournisseur){
            photo.classList.add("active1");

        }
    });
    
    fournisseurs.forEach(four=>{
        four.style.borderBottom="3px solid black";    
    });
    fournisseur.style.borderBottom="15px solid black";
}))