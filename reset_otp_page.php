<?php @include "header.php"; 
	
	if(!isset($_SESSION)) {
        session_start();
    }
	
	include "connect.php";
	$acno = mysqli_real_escape_string($conn, $_POST["cfpassaccno"]);
	
	$queryEmail="SELECT * FROM Customer WHERE AccNo = '$acno'";
	$result = $conn->query($queryEmail);
	$row = $result->fetch_assoc();
	$email = $row['Email'];
	$subject = "OTP";
	$code = rand(999999, 111111);
	$message = "Here is your One Time Passcode $code";
	$sender = "From: wallstreetbank.99@gmail.com";		
	//mail($email, $subject, $message, $sender);
	$_SESSION['acno'] = $acno;
	
?>

		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_customer_forgot_password_user_id_page_ek1"  >
	<div id="_bg__customer_forgot_password_user_id_page_ek2"  >

	<div id="nav_bar_ek13"  >
		<div id="cfpassnavbar1"  ></div>
		<div id="wsb_ek2" >
			<a style="text-decoration:none" href='main_page.php' >WSB</a>
		</div>

		<a href='customer_login_page.php' ><img src="skins/loginbtn_ek2.png" id="loginbtn_ek2" /></a>

	</div>
<form class="cfpassform" action="customer__reset_page.php" method="post">
	<div id="cfpassform"  >
		<div id="cfpasscontainer"  ></div>
		<div id="otpacc" >
			Enter your OTP
		</div>
		<div id="cfotpbox"  >
			<input type="number" id="cfpassemail" value="<?php echo $code; ?>">
		</div>
		<div id="otpaccs" >
			Check your email for your one time password.
		</div>
		<div id="cfpasssubmitbtn"  >
			<button class="button" id="cfsubmit">Submit</button>
		</div>
		
		<script src="jquery.md5.js"></script>
		<script src="jquery-3.5.1.min.js" ></script>
		<script>
			$(function () {
				$("#cfsubmit").click(function () { 
					var otp = $("#cfpassemail").val();
					var verifyOTP = "<?php echo $code; ?>";						
					if (otp != verifyOTP) {
						alert("Incorrect Code");							
						return false;
					}
				return true;
				});
			});		
		</script>		
	</div>
</form>	
</div>
</div>



<?php @include "footer.php"; ?>