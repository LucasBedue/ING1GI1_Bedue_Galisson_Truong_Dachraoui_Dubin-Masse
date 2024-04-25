
function changeTheDiv(indicediv){
    var hiddenDiv = document.getElementById("hiddenDiv"+indicediv);
    var buttonKart=document.getElementById("box"+indicediv);
    var textInputShow = document.getElementById("showStockTextField"+indicediv);

    if (hiddenDiv.style.display === "none") {
        // Afficher le div s'il est caché
        hiddenDiv.style.display = "block";
        buttonKart.textContent="Cacher Stock";

        
        var othersbutton=document.getElementsByClassName("showStockTextField");
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

    var stockmaxdiv=document.getElementById("showMaxStockTextField"+indice);
    var textstockmaxdiv=stockmaxdiv.value;
    textstockmaxdiv=textstockmaxdiv.replace("/","");
    var stockmax=parseInt(textstockmaxdiv);//the maximal stock

    var itemNameDiv=document.getElementById("nom"+indice);
    var nomItem=itemNameDiv.title; //The name of the item

    var errorfield=document.getElementById("messagefield"+indice);//the field containing the error message


   
    if(num>stockmax){
        errorfield.innerHTML="<p>Commandez moins d'objets.</p>";

    }
    else if(!(num==0)){
    
    $.ajax({url: "../php/ajoutPanier.php",type: 'POST',data: {nomItem: nomItem, stockToAdd: num},
        success: function(response){
            var res=JSON.parse(response);
            if(res.success==true){
                stockmaxdiv.value="/"+(stockmax-num);
                errorfield.innerHTML="<p>Objet rajouté au panier.</p>";

            }

        },
        error : function(response){
            var ress=JSON.parse(response);

            if(ress.stockproblem==true){
                errorfield.innerHTML="<p>Il n'y a plus de stock. Veuillez rafraichir la page</p>";
            }
            else if(ress.connectionprob==true){
                errorfield.innerHTML="<p>Connectez vous pour avoir accès au panier.</p>";

            }
            else{
                errorfield.innerHTML="<p>Erreur de serveur. Le produit n'a pas pu être ajouté.</p>";

            }

        }
         
    });

    }
    
}



function removeFromCart(indice){
    document.location.href="../php/retirerPanier.php?emplacement="+indice;
}

function CommandingCheck(){
    document.location.href="../php_pages/commandpage.php";
}

