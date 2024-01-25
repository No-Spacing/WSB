<?php @include "header.php"; include "connect.php" ?>


<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_register_page_ek1"  >
	<div id="_bg__customer_register_page_ek2"  >

	<div id="nav_bar_ek14"  >
		<div id="cregisternavbar1"  ></div>
		<div id="wsb_ek3" >
			<a style="text-decoration:none" href='main_page.php' >WSB</a>
		</div>
		<div id="news_ek3" >
			<a style="text-decoration:none" href='contact_us_page.php' >CONTACT US</a>
		</div>
		<div id="about_us_ek3" >
			<a style="text-decoration:none" href='about_us_page.php' >ABOUT US</a>
		</div>
		<a href='customer_login_page.php' ><img src="skins/loginbtn_ek3.png" id="loginbtn_ek3" /></a>

	</div>
	
	<div id="cregisterform"  >
		<div id="cregcontainer"  ></div>
		<div id="register_to_wsb_online_banking" >
			Register to WSB Online Banking
		</div>
		<form class="cregisform" action="customer__registered_page.php" method="post">
		<div id="account_number__ek1" >
			Account Number:
		</div>
	
		<div id="cregaccnobox"  >
			<input type="text" id="craccno" name="craccno" required>
		</div>
		<div id="user_id__ek1" >
			User ID:
		</div>
		<div id="cregusebox"  >
			<input type="text" id="cruserid" name="cruserid" required>
		</div>
		<div id="password__ek5" >
			Password:
		</div>
		<div id="cregpassbox"  >
			<input type="password" id="crpass" name="crpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
			title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
			</div>
		<div id="confirm_password__ek1" >
			Confirm Password:
		</div>
		<div id="cregconpassbox"  >
			<input type="password" id="crconpass" name="crconpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
			title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		</div>
		<div id="checkbox1"  >
			<input type="checkbox" id="cb" name="cb" required>
		</div>
		<div id="policy" >
			<a class = "pol" href='policy_page.php' >You must agree to our Terms and Conditions.</a>
		</div>

		<div id="cregisterbtn">
			<button class="button" id="btnSubmit" type="submit">Register</button>
		</div>
		<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
		<script type="text/javascript">
			$(function () {
				$("#btnSubmit").click(function () {
					var password = $("#crpass").val();					
					var confirmPassword = $("#crconpass").val();
					if (password != confirmPassword) {
						alert("Passwords do not match.");
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