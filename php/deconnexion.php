<?php
    session_start(); 

    session_unset();

    session_destroy();
    header("Location: ../css/index.html");  //returns to login
    exit();
?>
