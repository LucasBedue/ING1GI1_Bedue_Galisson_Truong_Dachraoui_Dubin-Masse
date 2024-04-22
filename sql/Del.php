<?php

$response=array('success'=>false,'error'=>true,'successfix'=>false,'successDelete'=>false);

$serveur = "localhost"; 
$utilisateur = "root"; 
$motDePasse = ""; 
$baseDeDonnees = "Echoppe_de_doran"; 
// Connexion à la base de données
$conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

						
// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Modif quantité
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["new_quantity"])) {
    // Récupération du nom de l'élément et de la nouvelle quantité
    $item_nom = $_POST['item_nom'];
    $new_quantity = $_POST['new_quantity'];

    // Requête pour mettre à jour le stock dans la base de données
    $sql_update = "UPDATE item SET stock = '$new_quantity' WHERE nom = '$item_nom'";

    if ($conn->query($sql_update) === TRUE) {
        //echo "La quantité a été mise à jour avec succès.";
        $response['success']=true;
        $response['successfix']=true;
        $response['error']=false;
    } else {
        //echo "Erreur lors de la mise à jour de la quantité: " . $conn->error;
    }
}

// Supprimer 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_item_nom'])) {
    // Récupération du nom de l'élément à supprimer
    $item_nom = $_POST['delete_item_nom'];
    $sql_delete = "DELETE FROM item WHERE nom = '$item_nom'";

    if ($conn->query($sql_delete) === TRUE) {
        //echo "L'élément a été supprimé avec succès.";
        $response['success']=true;
        $response['successDelete']=true;
        $response['error']=false;
    } else {
        //echo "Erreur lors de la suppression de l'élément: " . $conn->error;
    }
}







echo json_encode($response);

?>
