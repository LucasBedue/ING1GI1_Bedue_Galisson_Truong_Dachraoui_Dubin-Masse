<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un élément</title>
</head>
<body>
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

    <?php
    // Traitement du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer et nettoyer la catégorie
        $categorie = htmlspecialchars($_POST['categorie']);
      
        // Connexion à la base de données
        $conn = new mysqli('localhost', 'root', '', 'Echoppe_De_Doran');

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

        if ($result) {
            echo "<p>L'élément a été ajouté avec succès.</p>";
            echo "Catégorie récupérée : " . $categorie; 

        } else {
            echo "<p>Une erreur s'est produite lors de l'ajout de l'élément: " . $conn->error . "</p>";
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
