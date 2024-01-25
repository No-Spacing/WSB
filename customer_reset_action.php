<?php 
	include "connect.php";
	
	if(!isset($_SESSION)) {
        session_start();
    }
	
	$acno = $_SESSION['acno'];
	$pass = mysqli_real_escape_string($conn, $_POST["npass"]);
	$hashPass =  MD5($pass);
	$queryUpdate = "UPDATE Customer SET Password = '$hashPass' WHERE AccNo = '$acno'";
	$conn->query($queryUpdate);
	
	header("location:customer_login_page.php");
?>