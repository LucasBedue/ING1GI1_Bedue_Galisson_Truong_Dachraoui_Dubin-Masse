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

// Récupérer les données de la table `item`
$sql_item = "SELECT * FROM item";
$result_item = $conn->query($sql_item);
echo "<table>";


// Vérification s'il y a des résultats
if ($result_item->num_rows > 0) {
    // Parcourir les lignes de résultat
    while ($row = $result_item->fetch_assoc()) {
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
        echo "<td class='col'>| $stock |</td>";
        /*
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
        
        */
        echo "</tr>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

echo "</table>";


// Fermer la connexion
$conn->close();
?>
