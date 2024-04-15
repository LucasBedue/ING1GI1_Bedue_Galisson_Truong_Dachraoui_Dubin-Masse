<?php
    //Get all value of "creation"
$nom = $_POST['LastName'];
$prenom = $_POST['FirstName'];
$entreprise = $_POST['entreprise'];
$sexe=$_POST['sexe'];
$date_naissance = $_POST['DOB'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$telephone=$_POST['telephone'];
$fonction=$_POST['fonction'];
$role = "Client";


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
    $mail_fichier = isset($values[5]) ? trim($values[5]) : null;

    if ($mail_fichier==$mail) {
        fclose($fichier);
        echo "<p>Cet adresse mail est deja utilisé pour un compte existant.</p>";  
        exit;
    }
}

fclose($fichier);

$fichier = fopen('../account_informations/accounts.txt', 'a');

fwrite($fichier, $nom . ';' . $prenom . ';' . $entreprise . ';' . $sexe . ';' . $date_naissance . ';' . $mail . ';' . $mdp . ';' . $telephone . ';' . $fonction . ';' . $role . ";\n");    //writes personal information to the file
fclose($fichier);



header('Location: ../php_pages/Creationreussie.php');

?>
