<!DOCTYPE html>
<html lang="fr">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un élément</title>
    </head>
<body>
<a href="../php_pages/index.php">Retour au site</a><br>
    <h2>Ajouter un élément</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prix">Prix :</label><br>
        <input type="number" id="prix" name="prix" required><br><br>

        <label for="stock">Stock :</label><br>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="categorie">Catégorie :</label><br>
        <select id="categorie" name="categorie" required>
            <option value="Ad">Ad</option>
            <option value="Ap">Ap</option>
            <option value="Tank">Tank</option>
        </select><br><br>

        <label for="stats_pv">Stats HP :</label><br>
        <input type="number" id="stats_pv" name="stats_pv" required><br><br>

        <label for="stats_ad">Stats AD :</label><br>
        <input type="number" id="stats_ad" name="stats_ad" required><br><br>

        <label for="stats_ap">Stats AP :</label><br>
        <input type="number" id="stats_ap" name="stats_ap" required><br><br>


        <label for="image">Image :</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <input type="submit" value="Ajouter">
    </form>
    <br>
    <p>--------------------------------------------------------------------------------------------------------------------------------------</p>
    <br>
    <?php
    // Traitement du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer et nettoyer la catégorie
        $categorie = htmlspecialchars($_POST['categorie']);
      
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

        // Récupérer les autres données du formulaire
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $stats_pv = $_POST['stats_pv'];
        $stats_ad = $_POST['stats_ad'];
        $stats_ap = $_POST['stats_ap'];

        // Gestion de l'image
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_error = $_FILES['image']['error'];
        
        $target_directory = "./../img/"; // Répertoire cible pour stocker les images
        
        if ($image_error === 0) {
            $image_destination = $target_directory . $image_name;
            move_uploaded_file($image_tmp_name, $image_destination);
        } else {
            echo "<p>Une erreur s'est produite lors du téléchargement de l'image.</p>";
            exit;
        }

        // Préparer et exécuter la requête d'insertion
        $sql = "INSERT INTO item (nom, prix, stock, categorie, stats_pv, stats_ad, stats_ap, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siisiiis", $nom, $prix, $stock, $categorie, $stats_pv, $stats_ad, $stats_ap, $image_name);
        $result = $stmt->execute();


        // Fermer la connexion
        $stmt->close();
        $conn->close();
    }
    ?>
<?php
session_start();
if(!isset($_SESSION['role'])){
    header("Location: ../php/deconnexion.php");
    exit;
}
if(isset($_SESSION['role'])){
    if($_SESSION['role'] !== "Admin"){
        header("Location: ../php/deconnexion.php");
        exit;
    }
}

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
$indice=0;

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

        //If this is the first line
        if($indice==0){
            echo "<tr class='row'>";
            echo "<td class='col'>Image</td>";
            echo "<td class='col'>Nom</td>";
            echo "<td class='col'>PV</td>";
            echo "<td class='col'>AP</td>";
            echo "<td class='col'>AD</td>";
            echo "<td class='col'>Prix</td>";
            echo "<td class='col'>Stock</td>";
        }
        



        // Affichage de chaque item dans une ligne du tableau
        echo "<tr class='row'>";
        echo "<td class='col'><img src='./../img/$image' style='width: 50px;'/></td>";
        echo "<td class='col'><p id='item_nom$indice' name='item_nom$indice'>$nom<p></td>";
        echo "<td class='col'>$stats_pv PV</td>";
        echo "<td class='col'>$stats_ap AP</td>";
        echo "<td class='col'>$stats_ad AD</td>";
        echo "<td class='col'>$prix $</td>";
        
        echo "<td class='col'>
               
                    <input type='number' id='new_quantity$indice' name='new_quantity$indice' style='width: 50px;' value='$stock' min='0' />
                    <button id=\"buttonfixer$indice\" name=\"buttonfixer$indice\" onclick=\"fixer($indice)\">Fixer stock</button>
                    </td>";
        echo "<td class='col'>
                    
                    <button id=\"buttonretirer$indice\" name=\"buttonretirer$indice\" onclick=\"retirer($indice)\">Retirer</button>
                    </td>";
        
        echo "<td class='col'><div id=\"errordiv$indice\" name=\"errordiv$indice\"></div></td>";

        echo "</tr>";
        $indice++;
    }
} else {
    echo "Aucun résultat trouvé.";
}

echo "</table>";


// Fermer la connexion
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function retirer(indice){
            var nomAretirer=(document.getElementById("item_nom"+indice)).innerHTML;
            var diverror=document.getElementById("errordiv"+indice)
            if(nomAretirer==""){
                diverror.innerHTML="<p>Veuillez entrer le nom d'un objet.</p>";
            }
            else{
                $.ajax({url: "./Del.php",type: 'POST',data: {delete_item_nom: nomAretirer, },
        success: function(response){
            var res=JSON.parse(response);
            if(res.successDelete==true){
                
                diverror.innerHTML="<p>Objet retiré avec succès.</p>";

            }

        },
        error : function(response){
            var ress=JSON.parse(response);

            if(ress.error==true){
                diverror.innerHTML="<p>Probleme lors du changement. Vérifier existence de l'objet.</p>";
            }
            

        }
         
    });
            }
        }

        function fixer(indice){
            var nomAfixer=(document.getElementById("item_nom"+indice)).innerHTML;
            var newstock=(document.getElementById("new_quantity"+indice)).value;
            var diverror=document.getElementById("errordiv"+indice)
            if(nomAfixer==""){
                diverror.innerHTML="<p>Veuillez entrer le nom d'un objet.</p>";
            }
            else if(newstock==""){
                diverror.innerHTML="<p>Veuillez entrer une quantité positive d'objets</p>";

            }
            else{
                $.ajax({url: "./Del.php",type: 'POST',data: {item_nom: nomAfixer, new_quantity: newstock},
        success: function(response){
            var res=JSON.parse(response);
            if(res.successfix==true){
                
                diverror.innerHTML="<p>Quantité mise à jour</p>";

            }

        },
        error : function(response){
            var ress=JSON.parse(response);

            if(ress.error==true){
                diverror.innerHTML="<p>Probleme lors du changement. Vérifier existence de l'objet.</p>";
            }
            

        }
         
    });
            }
        }
    
    </script>
</body>
