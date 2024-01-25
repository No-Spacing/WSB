<?php
    include "connect.php";
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
	
    $_SESSION['isManagerValid'] = true; // set the customer valid to true...
    $_SESSION['LAST_ACTIVITY'] = time(); // start the activity time of the customer...
	$uname = $_SESSION['Manager']; // get data from SESSION named Username...
	
	
	$queryLog = "INSERT INTO managerLogs VALUES('$uname','', 'Manager Login', NOW())";
	$conn->query($queryLog); // Insert Logs to CustomerLogs...
    header("location:manager_home_page.php"); 
	
    
?>
