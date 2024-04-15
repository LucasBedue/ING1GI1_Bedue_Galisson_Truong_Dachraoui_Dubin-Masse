<!DOCTYPE php>
<php>

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran</title>
		<link rel="stylesheet" href="../css/shop.css" />
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



		?>
	</head>

	<body class="main_body">
		<div class="top_banner">
		<div class="iconcontainer">
				<a href="./index.php">
					<img src="./../img/poro.png" class="poroicon" />
				</a>
			</div>			<a
				href="./Connexion.php"
			>
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
				<a class="text_color_yellow" href="index.php">Accueil</a>
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
					Bienvenue dans l'échoppe de Doran
				</div>
				<div class="right_text_container">
					<p class="right_first_textbox">
						<span>L'Échoppe de Doran</span>,
						la meilleure boutique pour vos items du renomé jeu : <span>League of Legends</span>
					</p>
					<br>
					<p>Accédez à l'ensemble de notre boutique <a class="text_color_turquoise bolded"
							href="./Boutique.php">ici</a>, ou bien regardez par catégorie</p>

					<p>
						Et si vous avez besoin d'aide pour faire votre choix, n'hésitez pas à utiliser
						<a class="text_color_turquoise bolded" href="./Filtre.php">notre système de recherche</a>
						pour filtrer l'ensemble de notre boutique et trouver l'item qu'il vous faut
					</p>

					<p>
						Vous pouvez aussi nous contacter
						<a class="text_color_turquoise bolded" href="./Contact.php">ici</a>
						pour toute requête ou question que vous auriez
					</p>



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