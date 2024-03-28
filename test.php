<?php

// Déclaration des variables
$nomObjet = $_POST['nomObjet'];
$prixMin = $_POST['prixMin'];
$prixMax = $_POST['prixMax'];
$hpMin = $_POST['hpMin'];
$hpMax = $_POST['hpMax'];
$apMin = $_POST['apMin'];
$apMax = $_POST['apMax'];
$adMin = $_POST['adMin'];
$adMax = $_POST['adMax'];

// Fonction pour tester si une variable est un nombre entier
function estEntier($var) {
  return is_int($var) || (is_string($var) && preg_match('/^[0-9]+$/', $var));
}

// Test des variables
$erreurs = [];

// Nom de l'objet
if (!empty($nomObjet) && !estEntier($nomObjet)) {
  $erreurs[] = "Le nom de l'objet ne peut contenir que des chiffres.";
}

// Prix minimum et maximum
if (!empty($prixMin) && !estEntier($prixMin)) {
  $erreurs[] = "Le prix minimum doit être un nombre entier.";
}
if (!empty($prixMax) && !estEntier($prixMax)) {
  $erreurs[] = "Le prix maximum doit être un nombre entier.";
}

// HP minimum et maximum
if (!empty($hpMin) && !estEntier($hpMin)) {
  $erreurs[] = "Le nombre de HP minimum doit être un nombre entier.";
}
if (!empty($hpMax) && !estEntier($hpMax)) {
  $erreurs[] = "Le nombre de HP maximum doit être un nombre entier.";
}

// AP minimum et maximum
if (!empty($apMin) && !estEntier($apMin)) {
  $erreurs[] = "Le nombre d'AP minimum doit être un nombre entier.";
}
if (!empty($apMax) && !estEntier($apMax)) {
  $erreurs[] = "Le nombre d'AP maximum doit être un nombre entier.";
}

// AD minimum et maximum
if (!empty($adMin) && !estEntier($adMin)) {
  $erreurs[] = "Le nombre d'AD minimum doit être un nombre entier.";
}
if (!empty($adMax) && !estEntier($adMax)) {
  $erreurs[] = "Le nombre d'AD maximum doit être un nombre entier.";

// Affichage des erreurs
if (!empty($erreurs)) {
  echo "<ul>";
  foreach ($erreurs as $erreur) {
    echo "<li>$erreur</li>";
  }
  echo "</ul>";
} else {
  // Traitement des variables valides
  // ...
}

?>
