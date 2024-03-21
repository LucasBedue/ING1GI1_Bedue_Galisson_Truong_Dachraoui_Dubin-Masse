<!DOCTYPE php>
<php>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran - Connexion</title>
		<link rel="stylesheet" href="../css/shop.css" />
		<link rel="stylesheet" href="../css/Creation.css" />
		<link rel="stylesheet" href="../css/Connexion.css" />
	</head>

	<body class="main_body">
		<div class="top_banner">
			<img src="../img/poro.png" class="poroicon" />
			<a
				href="./Connexion.php"
			>
				<div class="top_left_text">Se connecter</div>
			</a>

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
				</div>
			</div>

			<div class="top_right_text">
				<a class="text_color_yellow" href="./index.php">Accueil</a>
				<div class="spacer">|</div>
				<a
					class="text_color_yellow"
					href="./Contact.php"
					>Nous contacter</a
				>
			</div>

			<div class="banner_title">L'Echoppe de Doran</div>
		</div>
		<div class="central_banner">
			<div class="left_side">
				<div class="central_left_top_box">
					L'Echoppe de Doran
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
				<div class="right_top_text">Connexion</div>
				<div class="right_container">
					<div class="login">
						<!--	Login form	-->
						<form method="post" action="./verificationConnexion.php">
							<table class="login2">
								<tr>
									<td class="login_text">Prénom :</td>
									<td>
										<input
											type="text"
											name="FirstName"
											id="Fname"
											required
										/>
									</td>
									<td>
									</td>
									<td class="login_text">Nom de famille :</td>
									<td>
										<input
											type="text"
											name="LastName"
											id="Lname"
											required
										/>
									</td>
								</tr>
								<tr>
									<td class="login_text">Nom de l'entreprise :</td>
									<td>
										<input
											type="text"
											name="entreprise"
											id="entreprise"
											required
										/>
									</td>
									
								</tr>
								<tr>
									<td class="login_text">Email :</td>
									<td>
										<input
											type="text"
											name="mail"
											id="mail"
											required
										/>
									</td>
									
								</tr>
								<tr>
									<td class="login_text">Mot de passe :</td>
									<td>
										<input
											type="password"
											name="mdp"
											id="mdp"
											required
										/>
									</td>
								</tr>
								<tr>
									<td class="login_text">Numéro de téléphone :</td>
									<td>
										<input
											type="text"
											name="telephone"
											id="telephone"
											required
										/>
									</td>
									
								</tr>
								<tr>
									<td class="login_text">Adresse :</td>
									<td>
										<input
											type="text"
											name="adress"
											id="adress"
											required
										/>
									</td>
									<td>
									</td>
									<td class="login_text">Code Postal :</td>
									<td>
										<input
											type="text"
											name="CodePostal"
											id="CodePostal"
											required
										/>
									</td>
									
								</tr>
								<tr>
									<td class="login_text">Ville :</td>
									<td>
										<input
											type="text"
											name="ville"
											id="ville"
											required
										/>
									</td>
									<td>
									</td>
									<td class="login_text">Pays :</td>
									<td>
										<input
											type="text"
											name="pays"
											id="pays"
											required
										/>
									</td>
									
								</tr>
							</table>
							<br />
							<div class="input">
								<input class="button" type="submit" value="Créer le compte" />
							</div>
						</form>
					</div>
					
				</div>

                
			</div>
		</div>

		<div class="bottom_banner">
			<div class="bottom_banner_left_text">
				L'Echoppe de Doran - Projet DevWeb ING1 GI1 - 2023/2024
			</div>
			<div class="bottom_banner_right_text">
				Lucas Bédué - Elyes Dachraoui - Maxime Dubin-Massé - Matthias
				Galisson - Audrey Truong
			</div>
		</div>
	</body>
</php>