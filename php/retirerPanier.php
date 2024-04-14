<?php
    session_start();
    if(!isset($_SESSION['mail'])){
        header('Location: ../php_pages/Connexion.php');
        exit();
    }

    $listeNomItem=explode(";",$_SESSION['cartItem']);
	$listeNumberItem=explode(";",$_SESSION['cartNumberItem']);

    $_SESSION['cartItem']="";
    $_SESSION['cartNumberItem']="";

    for($i=0;$i<count($listeNomItem);$i++){
        if($i!=$_GET['emplacement']){
            if((!isset($_SESSION['cartItem']))||($_SESSION['cartItem']=="")){
                $_SESSION['cartItem']=$listeNomItem[$i];
                $_SESSION['cartNumberItem']=$listeNumberItem[$i];
            }
            else{
                $_SESSION['cartItem']=$_SESSION['cartItem'].";".$listeNomItem[$i];
                $_SESSION['cartNumberItem']=$_SESSION['cartNumberItem'].";".$listeNumberItem[$i];
            }
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>