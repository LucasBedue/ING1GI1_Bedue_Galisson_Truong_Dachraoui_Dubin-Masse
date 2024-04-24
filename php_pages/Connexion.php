<!DOCTYPE php>
<php>

	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran - Connexion</title>
		<link rel="stylesheet" href="../css/shop.css" />
		<link rel="stylesheet" href="../css/Connexion.css" />
		<link rel="stylesheet" href="../css/Creation.css" />
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
			if(isset($_SESSION['role'])){
				if($_SESSION['role'] == "Admin"){
					echo "<a href=\"../sql/Lire_Data.php\">";
					echo "<div class=\"top_left_text\">Gérer stock</div></a>";

				}
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
				<div class="right_top_text">Connexion</div>
				<div class="right_container">
					<div class="login">
						<!--	Login form	-->
						<form method="post" action="../php/verificationConnexion.php">
							<table>
								<tr>
									<td class="row">
										<label class="creation_text">Identifiant :</label>
									</td>
									<td>
										<input class="input_box" type="text" name="mail" id="mail" required />
									</td>
								</tr>
								<tr>
									<td class="row">
										<label class="creation_text">Mot de passe :</label>
									</td>
									<td>
										<input class="input_box" type="password" name="mdp" id="mdp" required />
									</td>
								</tr>
							</table>
							<br />
							<div class="input">
								<input class="button" type="submit" value="Se connecter" />
							</div>
						</form>
					</div>

				</div>

				<div class="textbox">Pas encore de compte ? </div>

				<a href="./Creation.php" class="textbox2">Créez un compte ici</a> <!--	Link to account creation page	-->

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