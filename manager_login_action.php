<?php
    include "connect.php";
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
	
	// Get the inputs from manager_login_page.php...
    $uname = mysqli_real_escape_string($conn, $_POST["managerid"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["managerpass"]);
	
    $sql0 =  "SELECT * FROM Manager WHERE ManagerID='$uname'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc(); // Fetch Specific Column from the Manager Table...

    if ($row['Password'] === md5($pwd)) { // Check if the password is correct...
        $_SESSION['Manager'] = $row["ManagerID"]; // Set the Current ManagerID...
		$code = rand(999999, 111111); // generate random six digits
		$_SESSION['code'] = $code; // put the code from the session named code...
		$email = $row['Email'];
		$subject = "OTP";
		$message = "Here is your One Time Passcode $code";
		$sender = "From: wallstreetbank.99@gmail.com";		
		mail($email, $subject, $message, $sender); // send email from the customer...
        header("location:manager_otp_page.php");
    }
    else {		
        session_destroy();
        die(header("location:manager_login_page.php?loginFailed=true"));
    }	


?>
