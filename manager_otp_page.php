<?php @include "header.php"; 
	
    if(!isset($_SESSION)) {// avoids multiple session warning...
        session_start();
    }

    if(isset($_SESSION['isManagerValid'])){ // checks if the customer is already logged in...
        header("location:manager_home_page.php");
    }
	
	$code = $_SESSION['code']; // get the data from SESSION named CODE...
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
<form class="cfpassform" action="manager_otp_action.php" method="post">
	<div id="cfpassform"  >
		<div id="cfpasscontainer"  ></div>
		<div id="otpacc" >
			Enter your OTP
		</div>
		<div id="cfotpbox"  >
			<input type="number" id="cfpassemail" >
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
					if (otp != verifyOTP) { // checks if the OPT CODE is Correct...
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