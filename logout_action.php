<?php
    include "connect.php";

    session_start();
	
	if(isset($_SESSION['isCustValid'])){ // checks if the admin logouts
		$uname = $_SESSION['Username'];
		$logQuery = "INSERT INTO customerLogs VALUES('$uname', 'Customer Logout', NOW())";
		$conn->query($logQuery); // Insert logs to AdminLog Table...	
		
    }
	
	
	if(isset($_SESSION['isAdminValid'])){ // checks if the admin logouts
		$uname = $_SESSION['Admin'];
		$logQuery = "INSERT INTO AdminLogs VALUES('$uname','', 'Admin Logout', NOW())";
		$conn->query($logQuery); // Insert logs to AdminLog Table...
    }
	
	if(isset($_SESSION['isManagerValid'])){ // checks if the admin logouts
		$uname = $_SESSION['Manager'];
		$logQuery = "INSERT INTO managerLogs VALUES('$uname','', 'Manager Logout', NOW())";
		$conn->query($logQuery); // Insert logs to AdminLog Table...	
    }
	
	if (isset($_GET['sessionExpired'])) {		
        header("location:main_page.php");
	}
	else {
			header("location:main_page.php");        
	}
	
	session_destroy();
	
?>
