<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['isManagerValid'])){
        header("location:manager_login_page.php");
    }
?>
