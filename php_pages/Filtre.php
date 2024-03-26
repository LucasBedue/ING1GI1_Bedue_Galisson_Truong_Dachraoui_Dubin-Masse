<!DOCTYPE php>
<php>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran</title>
		<link rel="stylesheet" href="../css/shop.css" />
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
				<a class="text_color_yellow" href="index.php">Accueil</a>
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

				<div class="right_top_text">
					Filtre
				</div>
                
                <div>
                <form method="get" action="./Filtre.php">
							<table class="login2">
								<tr>
									<td>
										<div class="creation_text">Nom de l'objet :</div>									</td>
									<td>
										<input
										class = "input_box"
											type="text"
											name="searchname"
											id="searchname"
											
										/>
									</td>
									<td>
									</td>
									<td>
										<div class="creation_text">Type de l'objet :</div><!-- Penser à mettre des choix prédéfini-->
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="itemtype"
											id="itemtype"
											
										/>
									</td>
								</tr>
								<tr>
								<td>
										<div class="creation_text">Prix minimum :</div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="prixmin"
											id="prixmin"
											
										/>
									</td>
									
								</tr>
								<tr>
								<td>
										<div class="creation_text">Prix maximum :</div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="prixmax"
											id="prixmax"
											
										/>
									</td>
									<td>
										<div'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>
									</td>
									<td>
										<div class="creation_text">HP minimum </div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="password"
											name="HPmin"
											id="HPmin"
											
										/>
									</td>
								</tr>
								<tr>
								
								</tr>
								<tr>
								<td>
										<div class="creation_text">HP max :</div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="HPmax"
											id="HPmax"
											
										/>
									</td>
									
								</tr>
								<tr>
								<td>
										<div class="creation_text">AP minimum :</div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="APmin"
											id="APmin"
											
										/>
									</td>
									<td>
									</td>
									<td>
										<div class="creation_text">AP maximum :</div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="APmax"
											id="APmax"
											
										/>
									</td>
									
								</tr>
								<tr>
								<td>
										<div class="creation_text">AD minimum :</div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="ADmin"
											id="ADmin"
											
										/>
									</td>
									<td>
									</td>
									<td>
										<div class="creation_text">AD maximum :</div>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="ADmax"
											id="ADmax"
											
										/>
									</td>
									
								</tr>
                                
							</table>
							<br />
							<div class="input">
								<input class="button" type="submit" value="Rechercher" />
							</div>
						</form>
                </div>

                <?php
                    if (empty($_GET)){
                        echo "Veuillez selectionner vos filtres";

                    }
                    else{
                        
                        // Informations de connexion à la base de données
						$serveur = "localhost"; 
						$utilisateur = "root"; 
						$motDePasse = ""; 
						$baseDeDonnees = "Echoppe_de_doran"; 

                        //Information de recherche sur la base de données
                        $searchname=$_GET["searchname"];
                        $itemtype=$_GET["itemtype"];
                        $prixmin=$_GET["prixmin"];
                        $prixmax=$_GET["prixmax"];
                        $HPmin=$_GET["HPmin"];
                        $HPmax=$_GET["HPmax"];
                        $ADmin=$_GET["ADmin"];
                        $ADmax=$_GET["ADmax"];
                        $APmin=$_GET["APmin"];
                        $APmax=$_GET["APmax"];



						// Connexion à la base de données
						$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

						// Vérification de la connexion
						if ($connexion->connect_error) {
							die("La connexion à la base de données a échoué : " . $connexion->connect_error);
						}

						// Requête SQL pour récupérer les items 
                        if ($itemtype==""){
                            $sql = "SELECT * FROM item";
                        }
                        else{
                            $sql = "SELECT * FROM item WHERE categorie = '$itemtype'";
                        }
						
						$resultat = $connexion->query($sql);

						$numberOfBoxs=0;

                        
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
								$image=$row["image"];
                                $boolafficheur=0;//sert à confirmer l'affichage

                                //Check les caractéristiques des items recherchés
                                if($prixmin==""){
                                    $prixmin=0;
                                }
                                //...
                                
								// Affichage de chaque item dans une ligne du tableau

								echo "<tr>";
								echo "<td><div class='col'><img class='item_pic' src='./../img/$image' /></div></td>";
								echo "<td><div class='col'>$nom</div></td>";
								echo "<td><div class='col'>$stats_pv HP</div></td>";
								echo "<td><div class='col'>$stats_ap AP</div></td>";
								echo "<td><div class='col'>$stats_ad AD</div></td>";
								echo "<td><div class='col'>$stock</div></td>";
								echo "<td><div class='col'>$prix $</div></td>";
								echo "<td><div class='col'><button class='button' id=\"box$numberOfBoxs\" onclick=\"showAddPanel(this)\"type='button'>Voir stocks</button></div></td>";
								echo "</tr>";

                                $numberOfBoxs++;
							}
						} else {
							echo "Aucun résultat trouvé.";
						}



                    }
                ?>
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
