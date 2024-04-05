<?php
    session_start();
    if(!isset($_SESSION['mail'])){
        header('Location: ../php_pages/Connexion.php');
        exit();
    }
    $nomItem=$_GET['nomItem'];
    $stockToAdd=$_GET['stockToAdd'];
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
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $sql = "SELECT * FROM item WHERE nom = '$nomItem'";

    $resultat = $connexion->query($sql);
    
    // Vérification s'il y a des résultats
    if ($resultat->num_rows > 0) {
        $row = $resultat->fetch_assoc();
        $stock = $row["stock"];

        if(($stock<$stockToAdd) || ($stock==0)){//si pas assez de stock
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();

        }
        else{//if it's okay
            if((!isset($_SESSION['cartItem']))||($_SESSION['cartItem']=="")){
                $_SESSION['cartItem']=$nomItem;
                $_SESSION['cartNumberItem']=$stockToAdd;
            }
            else{
                $_SESSION['cartItem']=$_SESSION['cartItem'].";".$nomItem;
                $_SESSION['cartNumberItem']=$_SESSION['cartNumberItem'].";".$stockToAdd;
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();

            
        }
    }
    else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();

    }
    exit();



?>