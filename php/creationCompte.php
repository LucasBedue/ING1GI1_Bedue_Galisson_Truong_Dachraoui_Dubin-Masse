<?php
//Get all value of "creation"
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$date_naissance = $_POST['date_naissance'];
$mdp = $_POST['mdp'];
$role = $_POST['role'];


if (strpos($mail, '@') === false) {                         //set conditions to password and email
    echo "<p>L'adresse e-mail n'est pas valide.</p>";       
    exit;
}
if (strpos($mdp, ';') !== false) {
    
    echo "<p>Le mot de passe ne peut pas contenir le caractère ';'.</p>";
    exit;
}

$fichier = fopen('../account_informations/accounts.txt', 'r+');


while(!feof($fichier)) {                                        //check if the address is not already in use
    $line = fgets($fichier);
    $values = explode(";", $line);
    $mail_fichier = isset($values[3]) ? trim($values[3]) : null;

    if ($mail_fichier==$mail) {
        fclose($fichier);
        echo "<p>Cet adresse mail est deja utilisé pour un compte existant.</p>";  
        exit;
    }
}

$fichier = fopen('../account_informations/accounts.txt', 'a');

fwrite($fichier, $nom . ';' . $prenom . ';' . $date_naissance . ';' . $mail . ';' . $mdp . ';' . $role . ";\n");    //writes personal information to the file
fclose($fichier);

fclose($f);
header('Location: ../php_pages/Connexion.php');

?>

