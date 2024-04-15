<!DOCTYPE php>
<php>
	<head>
	<?php // To start or restore the session
			session_start();

			// To check if the last activity timestamp exists in the session
			if (isset($_SESSION['last_activity'])) {
				// Inactivity time in seconds (15 minutes = 900 seconds)
				$inactive_duration = 900;

				// Time count since last activity
				$elapsed_time = time() - $_SESSION['last_activity'];

				// Check if user has been inactive for more than 15 minutes
				if ($elapsed_time > $inactive_duration) {
					// Destroys the session
					session_destroy();
					
					// Redirects the user to the logout page
					header("Location: ../php/deconnexion.php");
					exit;
				}
			}

			// Records the current amount of time in the session
			$_SESSION['last_activity'] = time();

			/*
			//if not already connected, kick you out
			if (!isset($_SESSION['role']) || $_SESSION['role'] !== "Client") {
				echo '<script>alert("Veuillez vous connecter pour accéder à cette page.");</script>';
				echo '<script>window.location.href = "./Connexion.php";</script>';
				exit();
			}
			*/
			
			?>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran - Panier</title>
		<link rel="stylesheet" href="../css/shop.css" />
        <link rel="stylesheet" href="../css/Panier.css" />
	</head>

	<body class="main_body">
		<div class="top_banner">
			<img src="./../img/poro.png" class="poroicon" />
			<?php 
			if (!isset($_SESSION['role']) || (($_SESSION['role'] !== "Client") && ($_SESSION['role'] !== "Admin"))) {
				echo "<a href=\"./Connexion.php\">";
				echo "<div class=\"top_left_text\">Se connecter</div></a>";
			}
			else{
				echo "<a href=\"../php/deconnexion.php\">";
				echo "<div class=\"top_left_text\">Se déconnecter</div></a>";
			}
				?>

			<div class="top_menu_container">
				<div class="top_menu">
					<div class="top_menu_box top_menu_box1">
						<a
							href="./Physique.php"
						>
							<div class="top_menu_box top_menu_box1">
								Physique
							</div>
						</a>
					</div>
					<div class="top_menu_box top_menu_box2">
						<a
							href="./Magique.php"
						>
							<div class="top_menu_box top_menu_box2">
								Magique
							</div>
						</a>
					</div>
					<div class="top_menu_box top_menu_box3">
						<a
							href="./Tank.php"
						>
							<div class="top_menu_box top_menu_box3">Tank</div>
						</a>
					</div>
					<div class="top_menu_box top_menu_box4">
						<a
							href="./Filtre.php"
						>
							<div class="top_menu_box top_menu_box4">Recherche</div>
						</a>
					</div>
				</div>
			</div>

			<div class="top_right_text">
				<a class="text_color_yellow" href="index.php">Accueil</a>
				<div class="spacer">|</div>
				<a
					class="text_color_yellow"
					href="./Contact.php"
					>Nous contacter</a
				>
			</div>

			<div class="banner_title">L'Échoppe de Doran</div>
		</div>
		<div class="central_banner">
			<div class="left_side">
				<div class="central_left_top_box">
					L'Échoppe de Doran
					<a
						href="./Panier.php"
					>
						<div class="central_left_top_bottom_text_box">
							Votre panier
							<img
								class="shopping_cart"
								src="./../img/shopping-cart-icon.png"
							/>
						</div>
					</a>
				</div>
				<div class="central_left_bottom_box">
                    <a
						href="./Boutique.php"
					>
						<div
							class="central_left_bottom_text_box0"
						>
							Notre boutique
						</div>
					</a>
					<a
						href="./Physique.php"
					>
						<div
							class="central_left_bottom_text_box central_left_bottom_text_box1"
						>
							Physique
						</div>
					</a>

					<a
						href="./Magique.php"
					>
						<div
							class="central_left_bottom_text_box central_left_bottom_text_box2"
						>
							Magique
						</div>
					</a>

					<a
						href="./Tank.php"
					>
						<div
							class="central_left_bottom_text_box central_left_bottom_text_box3"
						>
							Tank
						</div>
					</a>
					<a
						href="./Filtre.php"
					>
						<div
							class="central_left_bottom_text_box0"
						>
							Recherche
						</div>
					</a>

					<div class="central_left_bottom_bottom_text_box">
						<a class="text_color_black" href="./index.php"
							>Accueil</a
						>
						<div class="spacer">|</div>
						<a
							class="text_color_black"
							href="./Contact.php"
							>Nous contacter</a
						>
					</div>
				</div>
			</div>
			<div class="right_side">
				<div class="right_top_text">
					Votre Panier
				</div>
				<table class="right_bottom_container">
				<?php
                    if (!isset($_SESSION['role'])){
                        echo "&nbsp &nbsp Veuillez vous connecter pour avoir accès à votre panier";

                    }
                    else{
                        if((!isset($_SESSION['cartItem']))||($_SESSION['cartItem']=="")){
							echo "<p>Panier Vide</p>";
						}
						else{

							
						
						$listeNomItem=explode(";",$_SESSION['cartItem']);
						$listeNumberItem=explode(";",$_SESSION['cartNumberItem']);

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
						}

						// Requête SQL pour récupérer les items 
                        $sql = "SELECT * FROM item";
                        
						$resultat = $connexion->query($sql);

						$numberOfBoxs=0;//Our count

						for($i=0;$i<count($listeNomItem);$i++){
							$readableNomItem=str_replace('%27','%27'.'%27',$listeNomItem[$i]);
    						$readableNomItem=mysqli_real_escape_string($connexion, $readableNomItem);
							$totalprice=0;
							$sql = "SELECT * FROM item WHERE nom='$readableNomItem'";
							$resultat = $connexion->query($sql);
							if ($resultat->num_rows > 0) {//if the item exist
								$row = $resultat->fetch_assoc();
								$nom = $row["nom"];
								$stats_pv = $row["stats_pv"];
								$stats_ap = $row["stats_ap"];
								$stats_ad = $row["stats_ad"];
								$stock = $row["stock"];
								$prix = $row["prix"];
								$image=$row["image"];

								$totalprice+=$prix;
								
							}


						}

                        	echo "<tr><td>";
							echo "Prix Total :" . $totalprice;
							echo "</td></tr>";
							echo "<tr>";
							
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td><button class=\"button\" id=\"Command\"  type=\"button\" onclick=\"CommandingCheck()\">Finaliser commande</button></td></tr>";
						} 


					}
                    
					
                ?>
					
				</table>
				
			</div>
<div class="button_container2">
<button class="button2" type="button">Commander</button>
</div>
</div>

<div class="bottom_banner">
<div class="bottom_banner_left_text">
L'Échoppe de Doran - Projet DevWeb ING1 GI1 - 2023/2024
</div>
<div class="bottom_banner_right_text">
Lucas Bédué - Elyes Dachraoui - Maxime Dubin-Massé - Matthias
Galisson - Audrey Truong
</div>
</div>
<script type="text/javascript" src="../js/script.js"></script>	

</body>
</php>
