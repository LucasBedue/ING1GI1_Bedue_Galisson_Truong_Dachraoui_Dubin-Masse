<?php
     
     $mail = $_POST['mail'];
     $mdp = $_POST['mdp'];
     

     $file = fopen("infopers.txt", "r");

     while(!feof($file)) {                                      
        $line = fgets($file);                                       //select a line then split it into several parts
        $values = explode(";", $line);
        $mail_file = isset($values[3]) ? trim($values[3]) : null;
        $mdp_file = isset($values[4]) ? trim($values[4]) : null;
        $role_file = isset($values[5]) ? trim($values[5]) : null;

        if ($mail_file == $mail && $mdp_file == $mdp) {             //check if password and email address match
        
            fclose($file);
            
            session_start();
            $role = $role_file;
            $_SESSION['role'] = $role;
            $_SESSION['mail'] = $mail;
            if ($role == "Jeune") {                                 //sends the user to his homepage
                header("Location: jeunespage.php");
                exit();
            } else {
                header("Location: Adminpage.php");
                exit();
            }
        } 
    }

    fclose($file);
    header("Location: ../css/Connexion.html");                                  //bring back to login if pb during connection
    exit();

?>