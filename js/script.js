function changeTheDiv(indicediv){
    var hiddenDiv = document.getElementById("hiddenDiv"+indicediv);
    var buttonKart=document.getElementById("box"+indicediv);
    if (hiddenDiv.style.display === "none") {
        // Afficher le div s'il est caché
        hiddenDiv.style.display = "block";
        buttonKart.textContent="Cacher Stock";

        var othersbutton=document.getElementsByClassName("button");
        for(var i=0;i<othersbutton.length;i++){
            if(i!=indicediv){
                hiddenDiv=hiddenDiv = document.getElementById("hiddenDiv"+i);
                buttonKart=document.getElementById("box"+i);
                hiddenDiv.style.display = "none";
                buttonKart.textContent="Voir stocks";

            }
        }

    } else {
        // Masquer le div s'il est affiché
        hiddenDiv.style.display = "none";
        buttonKart.textContent="Voir stocks";
    }

}


var value = 0;
var maxValue = 10;

// Sélectionner les éléments du DOM

/*
// Mettre à jour l'affichage de la valeur
function updateDisplay() {
    displayValue.textContent = value;
}

// Augmenter la valeur
increaseButton.addEventListener("click", function() {
    if (value < maxValue) {
        value++;
        updateDisplay();
    }
});

// Diminuer la valeur
decreaseButton.addEventListener("click", function() {
    if (value > 0) {
        value--;
        updateDisplay();
    }
});

// Initialiser l'affichage
updateDisplay();
*/

function increase(indice){
    var increaseButton = document.getElementById("addbutton"+indice);

}

function decrease(indice){
    var decreaseButton = document.getElementById("removebutton"+indice);

}


function zoomImage(indicepicture){
    var imageLink = document.getElementById("item_pic"+indicepicture);
    imageLink.classList.remove("item_pic");
    imageLink.classList.add("zoomed");
}

function dezoomImage(indicepicture){
    var imageLink = document.getElementById("item_pic"+indicepicture);
    imageLink.classList.remove("zoomed");
    imageLink.classList.add("item_pic");

}

// Rediriger vers la page précédente en cliquant sur le bouton de fermeture
function retourPagePrecedente() {
    window.history.back();
}


// Ajouter un événement au clic sur l'image pour ouvrir la nouvelle page
function showpicture(indicepicture){
    var imageLink = document.getElementById("item_pic"+indicepicture);
    window.open(imageLink.src, "_blank");
    
}

function verifyForm(){
    
}