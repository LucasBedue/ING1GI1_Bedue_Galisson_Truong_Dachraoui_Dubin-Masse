<!DOCTYPE php>
<php>

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran - Magique</title>
		<link rel="stylesheet" href="../css/shop.css" />
		<link rel="stylesheet" href="../css/items_Mag.css" />
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
						<a href="./Physique.php">
							<div class="top_menu_box top_menu_box1">
								Physique
							</div>
						</a>
					</div>
					<div class="top_menu_box top_menu_box2">
						<a href="./Magique.php">
							<div class="top_menu_box top_menu_box2">
								Magique
							</div>
						</a>
					</div>
					<div class="top_menu_box top_menu_box3">
						<a href="./Tank.php">
							<div class="top_menu_box top_menu_box3">Tank</div>
						</a>
					</div>
					<div class="top_menu_box top_menu_box4">
						<a href="./Filtre.php">
							<div class="top_menu_box top_menu_box4">Recherche</div>
						</a>
					</div>
				</div>
			</div>

			<div class="top_right_text">
				<a class="text_color_yellow" href="./index.php">Accueil</a>
				<div class="spacer">|</div>
				<a class="text_color_yellow" href="./Contact.php">Nous contacter</a>
			</div>

			<div class="banner_title">L'Échoppe de Doran</div>
		</div>
		<div class="central_banner">
			<div class="left_side">
				<div class="central_left_top_box">
					L'Échoppe de Doran
					<a href="./Panier.php">
						<div class="central_left_top_bottom_text_box">
							Votre panier
							<img class="shopping_cart" src="./../img/shopping-cart-icon.png" />
						</div>
					</a>
				</div>
				<div class="central_left_bottom_box">
					<a href="./Boutique.php">
						<div class="central_left_bottom_text_box0">
							Notre boutique
						</div>
					</a>
					<a href="./Physique.php">
						<div class="central_left_bottom_text_box central_left_bottom_text_box1">
							Physique
						</div>
					</a>

					<a href="./Magique.php">
						<div class="central_left_bottom_text_box central_left_bottom_text_box2">
							Magique
						</div>
					</a>

					<a href="./Tank.php">
						<div class="central_left_bottom_text_box central_left_bottom_text_box3">
							Tank
						</div>
					</a>
					<a href="./Filtre.php">
						<div class="central_left_bottom_text_box0">
							Recherche
						</div>
					</a>

					<div class="central_left_bottom_bottom_text_box">
						<a class="text_color_black" href="./index.php">Accueil</a>
						<div class="spacer">|</div>
						<a class="text_color_black" href="./Contact.php">Nous contacter</a>
					</div>
				</div>
			</div>


			<div class="right_side">
				<div class="right_top_text">Items de dégats Magique</div>
				<table class="right_bottom_container">
					
					<?php
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

					// Requête SQL pour récupérer les items magiques
					$sql = "SELECT * FROM item WHERE categorie = 'Ap'";
					$resultat = $connexion->query($sql);
					$numberOfBoxs=0;

					//Check if the item is already in the the session.
					//If yes, reduce the amount of max-stock available
					if((isset($_SESSION['cartItem']))||($_SESSION['cartItem']!="")){
						$listeNomItem=explode(";",$_SESSION['cartItem']);
						$listeNumberItem=explode(";",$_SESSION['cartNumberItem']);

						
					}

					// Vérification s'il y a des résultats
					if ($resultat->num_rows > 0) {
						// Parcourir les lignes de résultat
						while ($row = $resultat->fetch_assoc()) {
							// Accéder aux données récupérées
							$nom = $row["nom"];
							$stats_pv = $row["stats_pv"];
							$stats_ap = $row["stats_ap"];
							$stats_ad = $row["stats_ad"];
							$stock = $row["stock"];

							$prix = $row["prix"];
							$image = $row["image"];

							//Affichage de la ligne informative.
							if($numberOfBoxs==0){
								echo "<tr>";
							echo "<td></td>";
							echo "<td><div class=\"col\">Nom</div></td>";
							echo "<td><div class=\"col\">HP</div></td>";
							echo "<td><div class=\"col\">AP</div></td>";
							echo "<td><div class=\"col\">AD</div></td>";
							echo "<td><div class=\"col\">Prix</div></td>";
							echo "</tr>";
							}


							// Affichage de chaque item dans une ligne du tableau

								echo "<tr>";
								echo "<td><div class='col'><img id=\"item_pic$numberOfBoxs\" class='item_pic' src='./../img/$image' onclick=\"showpicture($numberOfBoxs)\" onmouseover=\"zoomImage($numberOfBoxs)\" onmouseout=\"dezoomImage($numberOfBoxs)\"/></div></td>";
								echo "<td><div class='col'> <p id=\"nom$numberOfBoxs\" title=\"$nom\" >$nom</p></div></td>";
								echo "<td><div class='col'>$stats_pv HP</div></td>";
								echo "<td><div class='col'>$stats_ap AP</div></td>";
								echo "<td><div class='col'>$stats_ad AD</div></td>";
								echo "<td><div class='col'>$prix $</div></td>";
								echo "<td><div class='col'><button class='button' id=\"box$numberOfBoxs\" onclick=\"changeTheDiv($numberOfBoxs)\"type='button'>Voir stocks</button></div></td>";
								echo "</tr>";

                                echo "<tr id=\"hiddenDiv$numberOfBoxs\" style=\"display:none\" >";//The hidden row
                                
								//The count to fill the kart
                                echo "<td><div class='col'>";
                                echo "<button class=\"button\" id=\"addbutton$numberOfBoxs\" type=\"button\" onclick=\"increase($numberOfBoxs)\" >Add</button>";
                                echo "</div></td>";

                                echo "<td><div class='col'>";
                                echo "<input class = \"showStockTextField\" type=\"text\" id=\"showStockTextField$numberOfBoxs\" disabled value=\"0\"/>";

								//
								if(isset($listeNomItem)){
									$index=-1;
									for($i=0;$i<count($listeNomItem);$i++){
										if($listeNomItem[$i]==$nom){
											$index=$i;
										}
									}

									if($index!=(-1)){
										echo "<input class = \"showMaxStockTextField\" type=\"text\" id=\"showMaxStockTextField$numberOfBoxs\" disabled value=\"/";
										echo $stock-$listeNumberItem[$index]."\"/>";

									}
									else{
										
										echo "<input class = \"showMaxStockTextField\" type=\"text\" id=\"showMaxStockTextField$numberOfBoxs\" disabled value=\"/$stock\"/>";


									}
								}
								else{
									echo "<input class = \"showMaxStockTextField\" type=\"text\" id=\"showMaxStockTextField$numberOfBoxs\" disabled value=\"/$stock\"/>";

								}
								
								echo "</div></td>";

                                echo "<td><div class='col'>";
                                echo "<button class=\"button\" id=\"removebutton$numberOfBoxs\"  type=\"button\" onclick=\"decrease($numberOfBoxs)\">Remove</button>";
                                echo "</div></td>";

								echo "<td><div class='col'>";
                                echo "<button class=\"button\" id=\"addToCartButton$numberOfBoxs\"  type=\"button\" onclick=\"AddToCart($numberOfBoxs)\">Ajouter au panier</button>";
                                echo "</div></td>";


                                echo "</tr>";

                                $numberOfBoxs++;
						}
					} else {
						echo "Aucun résultat trouvé.";
					}

					// Fermer la connexion à la base de données
					$connexion->close();
					?>

					
					</table>



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