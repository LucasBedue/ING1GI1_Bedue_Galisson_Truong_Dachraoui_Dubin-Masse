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
				<div class="right_top_text">
					Nous contacter
				</div>
				<div class="right_container">
					<div class="login">
						<!--	Login form	-->
						<form method="post" action="../php/EnvoiContact.php">
							<table>
								<tr>
									<td class="row">
										<label class="creation_text">Prénom :</label>
									</td>
									<td class="row">
										<input class="input_box" type="text" name="FirstName" id="Fname" required />
									</td>
									<td class="row">
										<div>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>
									</td>
									<td class="row">
										<label class="creation_text">Nom de famille :</label>
									</td>

									<td class="row">
										<input class="input_box" type="text" name="LastName" id="Lname" required />
									</td>
								</tr>
								<tr>
									<td class="row">
										<label class="creation_text">Nom de l'entreprise :</label>
									</td>

									<td class="row">
										<input class="input_box" type="text" name="entreprise" id="entreprise" />
									</td>
									<td class="row">
										<div>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>
									</td>
									<td class="row">
										<label class="creation_text">Sexe :</label>
									</td>

									<td class="row">
										<label class="radio">F
											<input class="radio" type="radio" name="Sexe" value="F">

										</label>
										<label class="radio">M
											<input class="radio" type="radio" name="Sexe" value="M">

										</label>
										<label class="radio">Autre
											<input class="radio" type="radio" name="Sexe" value="O">

										</label>
									</td>
								</tr>
								<tr>
									<td class="row">
										<label class="creation_text">Email :</label>
									</td>

									<td class="row">
										<input class="input_box" type="text" name="mail" id="mail" required />
									</td>

								</tr>

								<tr>
									<td class="row">
										<label class="creation_text">Numéro de téléphone :</label>
									</td>

									<td class="row">
										<input class="input_box" type="text" name="telephone" id="telephone" />
									</td>
									<td class="row">
										<div>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>
									</td>
									<td class="row">
										<label class="creation_text">Date de naissance :</label>
									</td>

									<td class="row">
										<input class="input_box" type="date" id="DOB" name="DOB" />
									</td>

								</tr>
								<tr>
									<td class="row">
										<label class="creation_text">Fonction :</label>
									</td>

									<td class="row">
										<select class="creation_text select_box" id="fonction" name="fonction">
											<option value="top">Top</option>
											<option value="jungle">Jungle</option>
											<option value="mid">Mid</option>
											<option value="bot">Bottom</option>
											<option value="support">Support</option>
										</select>
									</td>


								</tr>



							</table>

							<table>
								<tr>
									<td class="row">
										<label class="creation_text">Sujet :</label>
									</td>

									<td class="row">
										<input class="input_box sujet_text" type="text" name="sujet" id="sujet"
											required />
									</td>

								</tr>
								<tr>
									<td class="row">
										<label class="creation_text">Message :</label>
									</td>

									<td class="row">
										<textarea class="textarea_box" name="message" id="message" rows="4" cols="90"
											required>		</textarea>
									</td>

								</tr>
							</table>
							<br />
							<div class="input">
								<input class="button" type="submit" value="Envoyer" />
							</div>
						</form>
					</div>

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