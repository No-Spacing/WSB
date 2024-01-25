<?php
    include "connect.php";
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
	
	//get the inputs from customer_login_page.php...
    $uname = mysqli_real_escape_string($conn, $_POST["userid"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["userpass"]);

    $sql0 =  "SELECT * FROM Customer WHERE UserName='$uname'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
	
    if ($row['Password'] === md5($pwd)) { // checks if the password is correct
		$_SESSION['Username'] = $row["UserName"]; // put the username from the session named username...
		$code = rand(999999, 111111); // generate random six digits
		$_SESSION['code'] = $code; // put the code from the session named code...
		$email = $row['Email'];
		$subject = "OTP";
		$message = "Here is your One Time Passcode $code";
		$sender = "From: wallstreetbank.99@gmail.com";		
		mail($email, $subject, $message, $sender); // send email from the customer...
        header("location:customer_otp_page.php");
    }
    else {	
		
        session_destroy();
        die(header("location:customer_login_page.php?loginFailed=true"));
		
		
    }	


?>
