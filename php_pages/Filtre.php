<!DOCTYPE php>
<php>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L'Echoppe de Doran</title>
		<link rel="stylesheet" href="../css/shop.css" />
		<link rel="stylesheet" href="../css/Connexion.css" />
		<link rel="stylesheet" href="../css/Filtre.css" />
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
			<img src="../img/poro.png" class="poroicon" />
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
					Filtrer des objets
				</div>
                
                <div class="right_container">
					<div class="filter">
						<!--	Login form	-->
						<form method="get" action="./Filtre.php">
							<table>
								<tr>
									<td class="row">
										<label class="creation_text">Nom de l'objet :</label>									</td>
									<td>
										<input
										class = "input_box"
											type="text"
											name="searchname"
											id="searchname"
											pattern="[A-Za-z]+"
											
										/>
									</td>
									<td>
									</td>
									<td class="row">
										<label class="creation_text">Type de l'objet :</label><!-- Penser à mettre des choix prédéfini-->
									</td>
									
									<td class="row">
										<select class="creation_text select_box" id="type" name="type">
											<option value="Ad">Physique</option>
											<option value="Ap">Magique</option>
											<option value="Tank">Tank</option>
                                            <option value="">All</option>
										</select>
									</td>
								</tr>
								<tr>
								<td class="row">
										<label class="creation_text">Prix minimum :</label>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="prixmin"
											id="prixmin"
											pattern="[0-9]{0,5}"
											
										/>
									</td>
									<td class="row">
										<div>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>
									</td>
									<td class="row">
									<label class="creation_text">Prix maximum :</label>
									</td>
									
									<td class="row">
										<input
										class = "input_box"
											type="text"
											name="prixmax"
											id="prixmax"
											pattern="[0-9]{0,5}"
										/>
									</td>
								</tr>
								
								
								<tr>
								<td class="row">
										<label class="creation_text">HP minimum </label>
									</td>
									
									<td class="row">
										<input
										class = "input_box"
											type="text"
											name="HPmin"
											id="HPmin"
											pattern="[0-9]{0,5}"
										/>
									</td>
									<td class="row">
										<div>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</div>
									</td>
								<td class="row">
										<label class="creation_text">HP max :</label>
									</td>
									
									<td class="row">
										<input
										class = "input_box"
											type="text"
											name="HPmax"
											id="HPmax"
											pattern="[0-9]{0,5}"
										/>
									</td>
									
								</tr>
								<tr>
								<td class="row">
										<label class="creation_text">AP minimum :</label>
									</td>
									
									<td class="row">
										<input
										class = "input_box"
											type="text"
											name="APmin"
											id="APmin"
											pattern="[0-9]{0,5}"
										/>
									</td>
									<td>
									</td>
									<td class="row">
										<label class="creation_text">AP maximum :</label>
									</td>
									
									<td class="row">
										<input
										class = "input_box"
											type="text"
											name="APmax"
											id="APmax"
											pattern="[0-9]{0,5}"
										/>
									</td>
									
								</tr>
								<tr>
								<td class="row">
										<label class="creation_text">AD minimum :</label>
									</td>
									
									<td>
										<input
										class = "input_box"
											type="text"
											name="ADmin"
											id="ADmin"
											pattern="[0-9]{0,5}"
										/>
									</td>
									<td>
									</td>
									<td class="row">
										<label class="creation_text">AD maximum :</label>
									</td>
									
									<td class="row">
										<input
										class = "input_box"
											type="text"
											name="ADmax"
											id="ADmax"
											pattern="[0-9]{0,5}"
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
					
				</div>
                <table class="right_bottom_container">				
				
                <?php
                    if (empty($_GET)){
                        echo "&nbsp &nbsp Veuillez sélectionner vos critères de recherche";

                    }
                    else{
                        
                        // Informations de connexion à la base de données
						$serveur = "localhost"; 
						$utilisateur = "root"; 
						$motDePasse = ""; 
						$baseDeDonnees = "Echoppe_de_doran"; 

                        //Information de recherche sur la base de données
                        $searchname=$_GET["searchname"];
                        $itemtype=$_GET["type"];
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
								$image=$row["image"];
                                $boolafficheur=0;//sert à confirmer l'affichage

                                //Check les caractéristiques des items recherchés
                                if($prixmin==""){
                                    $prixmin=0;
                                }
                                //...
                                

								
								

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



                    }
					
                ?>
                
                </table>

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
        <script type="text/javascript" src="../js/script.js"></script>	
    </body>
</php>
