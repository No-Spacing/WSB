	<?php @include "header.php"; 
	
	
	if(!isset($_SESSION)) { // Avoids Multiple Session Warning...
        session_start();
    }
	
	if (isset($_GET['loginFailed'])) { // checks if the customer failed to login..
        $message = "Invalid Credentials ! Please try again.";
        echo "<script>alert('$message');</script>";
    }
	
    if(isset($_SESSION['isCustValid'])){ // checks if the customer is already logged in...
        header("location:customer_home_page.php");
    }
	
	?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_login_page_ek1"  >
	<div id="_bg__customer_login_page_ek2"  >

	<div id="cloginnavbar"  >
		<div id="cloginnavbar1"  ></div>
		<div id="wsb_ek12" >
			<a style="text-decoration:none" href='main_page.php' >WSB</a>
		</div>
		<div id="news_ek12" >
			<a style="text-decoration:none" href='contact_us_page.php' >CONTACT US</a>
		</div>
		<div id="about_us_ek12" >
			<a style="text-decoration:none" href='about_us_page.php' >ABOUT US</a>
		</div>

	</div>

	<div id="cloginform"  >
		<div id="clogincontainer"  ></div>
		<div id="login_to_wsb_online_banking" >
			Login to WSB Online Banking
		</div>
		<form class="cregisform" action="customer_login_action.php" method="post">
		<div id="user_id__ek3" >
			User ID:
		</div>
		<div id="cuseridbox"  >
			<input type="text" id="userid" name="userid" required>
		</div>
		<div id="password__ek8" >
			Password:
		</div>
		<div id="cpasswordbox"  >
			<input type="password" id="userpass" name="userpass" required>
		</div>
		<div id="cloginbtn"  >
			<button class="button" type="submit">Login</button>
		</div>

		</form>
		<div id="forgot_your_password_user_id_" >
			<a style="text-decoration:none" href='customer_forgot_password_user_id_page.php' >Forgot Your Password/User ID?</a>
		</div>
		<div id="register_account_here_" >
			<a style="text-decoration:none" href='customer_register_page.php' >Register Account Here!</a>
		</div>

	</div>
</div>
</div>




<?php @include "footer.php"; ?>