<?php @include "header.php"; 



	if(!isset($_SESSION)) { // AVOIDS Multiple Session...
        session_start();
    }
	
	
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer__reset_page_ek1"  >
	<div id="_bg__customer__reset_page_ek2"  >

	<div id="nav_bar_ek11"  >
		<div id="cresetnavbar1"  ></div>
		<div id="wsb" >
			<a style="text-decoration:none" href='main_page.php' >WSB</a>
		</div>

		<a href='customer_login_page.php' ><img src="skins/loginbtn.png" id="loginbtn" /></a>

	</div>

	<div id="login_form_ek2"  >
	<form class="cfpassform" action="customer_reset_action.php" method="post">
		<div id="cresetcontainer"  ></div>
		<div id="check_your_email_for_reset_passsword_" >
			Enter your passsword here.
		</div>
		<div id="newpass" >
			New Password:
		</div>
		<div id="newpassb1"  >
			<input type="password" id="npass" name="npass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
			title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		</div>
		<div id="newpass2" >
			Confirm Password:
		</div>
		<div id="newpassb2"  >	
			<input type="password" id="cnpass" name="cnpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
			title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		</div>
		<div id="newpassbtn"  >
			<button class="button" id="btnsubmit">Submit</button>
		</div> 
		<script src="jquery.md5.js"></script>
		<script src="jquery-3.5.1.min.js" ></script>
		<script>
			$(function () {
				$("#btnsubmit").click(function () { 
					var pass = $("#npass").val();
					var conPass = $("#cnpass").val();					
					if (pass != conPass) { // checks if the password is match...
						alert("Password does not match!");							
						return false;
					}
				return true;
				});
			});		
		</script>		
	</form>
	</div>
</div>
</div>




<?php @include "footer.php"; ?>

