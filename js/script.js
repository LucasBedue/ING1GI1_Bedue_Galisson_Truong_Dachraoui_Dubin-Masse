// Sélectionner le bouton et le div caché
var toggleButton = document.getElementById("toggleButton");
var hiddenDiv = document.getElementById("hiddenDiv");

// Ajouter un écouteur d'événement au bouton
toggleButton.addEventListener("click", function() {
    // Vérifier l'état actuel du div caché
    if (hiddenDiv.style.display === "none") {
        // Afficher le div s'il est caché
        hiddenDiv.style.display = "block";
    } else {
        // Masquer le div s'il est affiché
        hiddenDiv.style.display = "none";
    }
});


var value = 0;
var maxValue = 10;

// Sélectionner les éléments du DOM
var displayValue = document.getElementById("displayValue");
var increaseButton = document.getElementById("increaseButton");
var decreaseButton = document.getElementById("decreaseButton");

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