<?php
    include "connect.php";
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
	
	
	
    $_SESSION['isCustValid'] = true; // set the customer valid to true...
    $_SESSION['LAST_ACTIVITY'] = time(); // start the activity time of the customer...
	$uname = $_SESSION['Username']; // get data from SESSION named Username...
	
	$querySelect = "SELECT * FROM Customer WHERE UserName = '$uname'";
	$result = $conn->query($querySelect);
	$row = $result->fetch_assoc();
	$acno = $row['AccNo']; // fetch Account Number from Customer Table...
	
	$queryLog = "INSERT INTO CustomerLogs VALUES('$acno','Customer Login', NOW())";
	$conn->query($queryLog); // Insert Logs to CustomerLogs...
    header("location:customer_home_page.php"); 
	
    
?>
