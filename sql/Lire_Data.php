<?php
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role'] !== "Admin"){
        header("Location: ../php/deconnexion.php");
        exit;
    }
}
echo "<a href=\"./Add.php\">Retour au panel de contrôle</a><br>";

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Echoppe_de_doran";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérer les données de la table `item`
$sql_item = "SELECT * FROM item";
$result_item = $conn->query($sql_item);

if ($result_item->num_rows > 0) {
    // Afficher les données de chaque item
    while($row_item = $result_item->fetch_assoc()) {
        echo "Nom: " . $row_item["nom"]. " - Prix: " . $row_item["prix"]. " - Stock: " . $row_item["stock"]. " - Catégorie: " . $row_item["categorie"]. " - PV: " . $row_item["stats_pv"]. " - AD: " . $row_item["stats_ad"]. " - AP: " . $row_item["stats_ap"] . " - Image: <img src='" . $row_item["image"] . "' alt='" . $row_item["nom"] . "'><br>";
    }
} else {
    echo "0 résultats pour les items";
}

// Fermer la connexion
$conn->close();
?>
