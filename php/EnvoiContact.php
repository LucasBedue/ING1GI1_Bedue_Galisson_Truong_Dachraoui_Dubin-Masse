<?php
header('Content-Type: text/html; charset=utf-8');
session_start();


$nom = $_POST['LastName'];
$prenom = $_POST['FirstName'];
$entreprise = $_POST['entreprise'];
$sexe=$_POST['Sexe'];
$date_naissance = $_POST['DOB'];
$mail = $_POST['mail'];
$telephone=$_POST['telephone'];
$fonction=$_POST['fonction'];
$sujet=$_POST['sujet'];
$message=$_POST['message'];



if (strpos($mail, '@') === false) {                         //set conditions to password and email
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["contactbutton"])){

		$email= new PHPMailer;
	//Server settings										
		$email->isSMTP();                                            //Send using SMTP
		$email->Host       = 'smtp-mail.outlook.com';                //Set the SMTP server to send through
		$email->SMTPAuth   = true;                                   //Enable SMTP authentication
		$email->Username   = 'ganvi2dormir@outlook.fr';              //SMTP username
		$email->Password   = 'ZzZzZzZz0000';                         //SMTP password
		$email->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
		$email->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                                          // Send using SMTP
	
		//Recipients
		
		$email->setFrom('ganvi2dormir@outlook.fr');
		$email->addAddress('lucasbedue@gmail.com');

		//Content
		$email->isHTML(true);
		
		$email->Subject = $sujet;
		$email->Body=$message;
	
		$email->send();

        header('Location: ../php_pages/MailSuccess.php');
        exit();
	}
	else{
        header('Location: ../php_pages/MailFail.php');
        exit();
    }

    


?>