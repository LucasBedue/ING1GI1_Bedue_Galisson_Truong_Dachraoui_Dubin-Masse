function getXhr(){//To create an XHR object
    var xhr = null; 
if(window.XMLHttpRequest) // Firefox et autres
xhr = new XMLHttpRequest(); 
else if(window.ActiveXObject){ // Internet Explorer 
try {
xhr = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
}
else { // XMLHttpRequest non supporté par le navigateur 
alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
xhr = false; 
} 
    return xhr
}




function changeTheDiv(indicediv){
    var hiddenDiv = document.getElementById("hiddenDiv"+indicediv);
    var buttonKart=document.getElementById("box"+indicediv);
    var textInputShow = document.getElementById("showStockTextField"+indicediv);

    if (hiddenDiv.style.display === "none") {
        // Afficher le div s'il est caché
        hiddenDiv.style.display = "block";
        buttonKart.textContent="Cacher Stock";

        
        var othersbutton=document.getElementsByClassName("button");
        for(var i=0;i<othersbutton.length;i++){
            if(i!=indicediv){
                hiddenDiv=hiddenDiv = document.getElementById("hiddenDiv"+i);
                buttonKart=document.getElementById("box"+i);
                textInputShow = document.getElementById("showStockTextField"+i);

                textInputShow.value="0";
                hiddenDiv.style.display = "none";
                buttonKart.textContent="Voir stocks";

            }
        }

    } else {
        // Masquer le div s'il est affiché
        hiddenDiv.style.display = "none";
        textInputShow.value="0";
        buttonKart.textContent="Voir stocks";
    }

}


function increase(indice){
    var textInputShow = document.getElementById("showStockTextField"+indice);
    var num=parseInt(textInputShow.value);

    var stockmaxdiv=document.getElementById("showMaxStockTextField"+indice);
    var textstockmaxdiv=stockmaxdiv.value;
    textstockmaxdiv=textstockmaxdiv.replace("/","");
    var stockmax=parseInt(textstockmaxdiv);

    
    if(num<stockmax){
        num+=1;
        textInputShow.value=num;

    }
    
}

function decrease(indice){
    var textInputShow = document.getElementById("showStockTextField"+indice);
    var num=parseInt(textInputShow.value);
    if(textInputShow.value>0){
        num-=1;
        textInputShow.value=num;

    }
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

function AddToCart(indice){
    var textInputShow = document.getElementById("showStockTextField"+indice);
    var num=parseInt(textInputShow.value); //The stock


    var itemNameDiv=document.getElementById("nom"+indice);
    var nomItem=itemNameDiv.title; //The name of the item
    if(!(num==0)){
        //var string=encodeURI("../php/ajoutPanier.php?nomItem="+encodeURIComponent(nomItem)+"&stockToAdd="+num);
        //string=string.replace(/'/g, encodeURIComponent('%27'));
        document.location.href="../php/ajoutPanier.php?nomItem="+nomItem+"&stockToAdd="+num;

    }


}

function removeFromCart(indice){
    document.location.href="../php/retirerPanier.php?emplacement="+indice;
}

function CommandingCheck(){
    document.location.href="../php_pages/commandpage.php";

}
