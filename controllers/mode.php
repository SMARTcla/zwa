<?php

// file for change mode dark to white
include("redirect.php");
    // request
    if (isset($_GET['bg'])) {
        if($_SESSION["mode"] === 'white'){
            $_SESSION['mode'] = $_GET['bg'];
            redirect_to();
        }
        if($_SESSION["mode"] === 'dark'){
            $_SESSION['mode'] = $_GET['bg'];
            redirect_to();
        }
    }
    
    // header('Location: index.php');
?>