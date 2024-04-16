<?php
    session_start();
    if(!isset($_SESSION['mail'])){
        header('Location: ../php_pages/Connexion.php');
        exit();
    }

    $listeNomItem=explode(";",$_SESSION['cartItem']);
	$listeNumberItem=explode(";",$_SESSION['cartNumberItem']);

    // Informations de connexion à la base de données
    $serveur = "localhost"; 
    $utilisateur = "root"; 
    $motDePasse = ""; 
    $baseDeDonnees = "Echoppe_de_doran"; 

    
    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    // Vérification de la connexion
    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    for($i=0;$i<count($listeNomItem);$i++){
        $readableNomItem=str_replace('%27','%27'.'%27',$listeNomItem[$i]);
        $readableNomItem=mysqli_real_escape_string($connexion, $readableNomItem);

        $sql = "SELECT * FROM item WHERE nom='$readableNomItem'";
        $resultat = $connexion->query($sql);
        if ($resultat->num_rows > 0) {//if the item exist
            //check if the stock is okay everywhere
            $row = $resultat->fetch_assoc();

            $stock = $row["stock"];
            if($stock<$listeNumberItem[$i]){
                header('Location: ../php_pages/Commandfail?erreur="stock".php');
                exit();
            }
        
        }
    
    }
    
    for($i=0;$i<count($listeNomItem);$i++){
        $readableNomItem=str_replace('%27','%27'.'%27',$listeNomItem[$i]);
        $readableNomItem=mysqli_real_escape_string($connexion, $readableNomItem);

        $actualNumber=$listeNumberItem[$i];
        //if yes, retrieve the amount of items.
        $sql = "UPDATE item SET stock=stock-'$actualNumber' WHERE nom='$readableNomItem'";
        $resultat = $connexion->query($sql);
        if ($resultat===TRUE) {//if it worked
            unset($_SESSION['cartItem']);
            unset($_SESSION['cartNumberItem']);
            header('Location: ../php_pages/Commandreussi.php');
            exit();
        }
        else{
            header('Location: ../php_pages/Commandfail?erreur="serveur".php');
            exit();
        }
    
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
    
?>