<?php
     
     $mail = $_POST['mail'];
     $mdp = $_POST['mdp'];
     

     $file = fopen("../account_informations/accounts.txt", "r");

     while(!feof($file)) {                                      
        $line = fgets($file);                                       //select a line then split it into several parts
        $values = explode(";", $line);
        $mail_file = isset($values[5]) ? trim($values[5]) : null;
        $mdp_file = isset($values[6]) ? trim($values[6]) : null;
        $role_file = isset($values[9]) ? trim($values[9]) : null;

        if ($mail_file == $mail && $mdp_file == $mdp) {             //check if password and email address match
        
            fclose($file);
            
            session_start();
            $role = $role_file;
            $_SESSION['role'] = $role;
            $_SESSION['mail'] = $mail;
            if ($role == "Client") {                                 //sends the user to his homepage
                header("Location: ../php_pages/index.php");
                exit();
            } else {
                header("Location: ../php_pages/index.php");
                exit();
            }
        } 
    }

    fclose($file);
    header("Location: ../php_pages/Connexion.php");                                  //bring back to login if pb during connection
    exit();

?>
