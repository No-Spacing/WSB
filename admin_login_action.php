<?php
    include "connect.php"; // Connects to the database...
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
	
	// Get the Inputs from admin_login_page.php...
    $uname = mysqli_real_escape_string($conn, $_POST["adminid"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["adminpass"]);

    $sql0 =  "SELECT * FROM Admin WHERE Username='".$uname."' AND Password='".$pwd."'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc(); // Fetch specific column from ADMIN TABLE...

    if (($result->num_rows) > 0) { // Check if the password is Correct...
		$_SESSION['Admin'] = $row["Username"]; // put the username from the session named username...
		$code = rand(999999, 111111); // generate random six digits
		$_SESSION['code'] = $code; // put the OTP CODE from the session named code...
		$email = $row['Email'];
		$subject = "OTP";
		$message = "Here is your One Time Passcode $code";
		$sender = "From: wallstreetbank.99@gmail.com";		
		mail($email, $subject, $message, $sender); // send email from the customer...
        header("location:admin_otp_page.php");
    }
    else {
        session_destroy();
        die(header("location:admin_login_page.php?loginFailed=true"));
    }	


?>
