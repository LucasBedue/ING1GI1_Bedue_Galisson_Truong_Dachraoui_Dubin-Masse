<?php
    session_start(); 

    session_unset();

    session_destroy();
    header("Location: ../php_pages/index.php");  //returns to login
    exit();
?>
