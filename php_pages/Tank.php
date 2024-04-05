<!DOCTYPE php>
<php>

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran - Tank</title>
		<link rel="stylesheet" href="../css/shop.css" />
		<link rel="stylesheet" href="../css/items_Tank.css" />
	</head>

	<body class="main_body">
		<div class="top_banner">
			<div class="iconcontainer">
				<a href="./index.php">
					<img src="./../img/poro.png" class="poroicon" />
				</a>
			</div>
			<a href="./Connexion.php">
				<div class="top_left_text">Se connecter</div>
			</a>

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
				<div class="right_top_text">Items Tank</div>
				<table class="right_bottom_container">
					<tr>
						<td></td>
						<td>
							<div class="col">Nom</div>
						</td>
						<td>
							<div class="col">HP</div>
						</td>
						<td>
							<div class="col">AP</div>
						</td>
						<td>
							<div class="col">AD</div>
						</td>

						<td>
							<div class="col">Prix</div>
						</td>
					</tr>
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

					// Requête SQL pour récupérer les items Tanks
					$sql = "SELECT * FROM item WHERE categorie = 'Tank'";
					$resultat = $connexion->query($sql);

					// Vérification s'il y a des résultats
					if ($resultat->num_rows > 0) {
						// Parcourir les lignes de résultat
						while ($row = $resultat->fetch_assoc()) {
							// Accéder aux données récupérées
							$nom = $row["nom"];
							$stats_pv = $row["stats_pv"];
							$stats_ap = $row["stats_ap"];
							$stats_ad = $row["stats_ad"];

							$prix = $row["prix"];
							$image = $row["image"];
							// Affichage de chaque item dans une ligne du tableau
							echo "<tr>";
							echo "<td><div class='col'><img class='item_pic' src='./../img/$image' /></div></td>";
							echo "<td><div class='col'>$nom</div></td>";
							echo "<td><div class='col'>$stats_pv HP</div></td>";
							echo "<td><div class='col'>$stats_ap AP</div></td>";
							echo "<td><div class='col'>$stats_ad AD</div></td>";

							echo "<td><div class='col'>$prix $</div></td>";
							echo "<td><div class='col'><button class='button' type='button'>Ajouter</button></div></td>";
							echo "</tr>";
						}
					} else {
						echo "Aucun résultat trouvé.";
					}

					// Fermer la connexion à la base de données
					$connexion->close();
					?>
					<tr>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>
							<div class="button_container2">
								<button class="button2" type="button">Commander</button>
							</div>
						<td>
					</tr>
				</table>



			</div>
		</div>
		</div>

		<div class="bottom_banner">
			<div class="bottom_banner_left_text">
				<p>L'Échoppe de Doran - Projet DevWeb ING1 GI1 - 2023/2024</p>
				<p>League of Legends et toutes les images utilisées appartiennent à Riot Games Inc.</p>
			</div>
			<div class="bottom_banner_right_text">
				Lucas Bédué - Elyes Dachraoui - Maxime Dubin-Massé - Matthias
				Galisson - Audrey Truong
			</div>
		</div>
	</body>
</php>