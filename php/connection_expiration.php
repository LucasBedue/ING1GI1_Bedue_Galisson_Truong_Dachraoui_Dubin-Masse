<?php
header('Content-Type: text/html; charset=utf-8');
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
        header("Location: logout.php");
        exit;
    }
}

// Records the current amount of time in the session
$_SESSION['last_activity'] = time();


if (!isset($_SESSION['role']) || $_SESSION['role'] !== "Client") {
    echo '<script>alert("Veuillez vous connecter pour accéder à cette page.");</script>';
    echo '<script>window.location.href = "../css/Connexion.html";</script>';
    exit();
}

?>