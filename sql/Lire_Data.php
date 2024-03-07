<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Echoppe_De_Doran";

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
        echo "Nom: " . $row_item["nom"]. " - Prix: " . $row_item["prix"]. " - Stock: " . $row_item["stock"]. "<br>";
    }
} else {
    echo "0 résultats pour les items";
}

// Récupérer les données de la table `user`
$sql_user = "SELECT * FROM user";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    // Afficher les données de chaque utilisateur
    while($row_user = $result_user->fetch_assoc()) {
        echo "Nom: " . $row_user["Nom"]. " - Prénom: " . $row_user["Prenom"]. " - Age: " . $row_user["Age"]. "<br>";
    }
} else {
    echo "0 résultats pour les utilisateurs";
}

// Fermer la connexion
$conn->close();
?>
