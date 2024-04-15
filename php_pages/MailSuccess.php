<!DOCTYPE php>
<php>

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran - Contact</title>
		<link rel="stylesheet" href="../css/shop.css" />
		<link rel="stylesheet" href="../css/Connexion.css" />
		
		
	</head>

	<body class="main_body">
		<div class="top_banner">
		<div class="iconcontainer">
				<a href="./index.php">
					<img src="./../img/poro.png" class="poroicon" />
				</a>
			</div>
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
				<div class="right_top_text">
					Nous contacter
				</div>
				<div class="right_container">
					<p>Mail envoyé avec succès.</p>

				</div>
			</div>
		</div>

		<div class="bottom_banner">
			<div class="bottom_banner_left_text">
			<p>L'Échoppe de Doran - Projet DevWeb ING1 GI1 - 2023/2024</p>
				<p>League of Legends et toutes les images utilisées appartiennent à Riot Games Inc.</p>			</div>
			<div class="bottom_banner_right_text">
				Lucas Bédué - Elyes Dachraoui - Maxime Dubin-Massé - Matthias
				Galisson - Audrey Truong
			</div>
		</div>




	</body>
</php>