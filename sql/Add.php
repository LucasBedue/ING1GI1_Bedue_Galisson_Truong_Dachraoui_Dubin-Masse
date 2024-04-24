<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un élément</title>
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

    ?>
</head>
<body>
    <a href="../php_pages/index.php">Retour au site</a>
    <a href="./Lire_Data.php">Voir stock</a>
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

<h2>Retirer un élément</h2>
<label for="nom">Nom :</label><br>
        <input type="text" id="nomaretirer" name="nomaretirer" ><br><br>
<div id="errorretirer" name="errorretirer"> </div>
<button id="buttonretirer" name="buttonretirer" onclick="retirer()">Retirer</button>

<h2>Fixer stock d'un élément</h2>
<label for="nom">Nom :</label><br>
        <input type="text" id="nomafixer" name="nomafixer" ><br><br>

<label for="stock">Nouveau Stock :</label><br>
        <input type="number" id="newstock" name="newstock" ><br><br>
        <button id="buttonfixer" name="buttonfixer" onclick="fixer()">Fixer stock</button>

        <div id="errorrfixer" name="errorrfixer"> </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function retirer(){
            var nomAretirer=(document.getElementById("nomaretirer")).value;
            var diverror=document.getElementById("errorretirer")
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

        function fixer(){
            var nomAfixer=(document.getElementById("nomafixer")).value;
            var newstock=(document.getElementById("newstock")).value;
            var diverror=document.getElementById("errorrfixer")
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
</html>
