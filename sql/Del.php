<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'Echoppe_De_Doran');

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
        echo "La quantité a été mise à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de la quantité: " . $conn->error;
    }
}

// Supprimer 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_item_nom'])) {
    // Récupération du nom de l'élément à supprimer
    $item_nom = $_POST['delete_item_nom'];
    $sql_delete = "DELETE FROM item WHERE nom = '$item_nom'";

    if ($conn->query($sql_delete) === TRUE) {
        echo "L'élément a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'élément: " . $conn->error;
    }
}

// Récupération des éléments de la base de données
$sql_select = "SELECT * FROM item";
$result_select = $conn->query($sql_select);

echo "<table>";

// Vérification s'il y a des résultats
if ($result_select->num_rows > 0) {
    // Parcourir les lignes de résultat
    while ($row = $result_select->fetch_assoc()) {
        // Accéder aux données récupérées
        $nom = $row["nom"];
        $stats_pv = $row["stats_pv"];
        $stats_ap = $row["stats_ap"];
        $stats_ad = $row["stats_ad"];
        $stock = $row["stock"];
        $prix = $row["prix"];
        $image = $row["image"];
        // Affichage de chaque item dans une ligne du tableau
        echo "<tr class='row'>";
        echo "<td class='col'><img src='./../img/$image' style='width: 50px;'/></td>";
        echo "<td class='col'>$nom</td>";
        echo "<td class='col'>$stats_pv PV</td>";
        echo "<td class='col'>$stats_ap AP</td>";
        echo "<td class='col'>$stats_ad AD</td>";
        echo "<td class='col'>$prix $</td>";
        echo "<td class='col'>
                <form method='post'>
                    <input type='hidden' name='item_nom' value='$nom'>
                    <input type='number' name='new_quantity' style='width: 50px;' value='$stock' min='0' />
                    <button type='submit'>Mettre à jour</button>
                </form>
              </td>";
        echo "<td class='col'>
                <form method='post'>
                    <input type='hidden' name='delete_item_nom' value='$nom'>
                    <button type='submit'>Supprimer</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

echo "</table>";

// Fermer la connexion à la base de données
$conn->close();
?>
