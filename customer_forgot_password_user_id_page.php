<?php @include "header.php"; ?>
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
	
	<div id="cfpassform"  >
	<form class="cregisform" action="reset_otp_page.php" method="post">
		<div id="cfpasscontainer"  ></div>
		<div id="reset_account" >
			Reset Account
		</div>

		<div id="account_number_" >
			Account Number:
		</div>
		<div id="cfpassaccbox"  >
			<input type="text" id="cfpassaccno" name="cfpassaccno">
		</div>
		<div id="cfpasssubmitbtn"  >
			<button class="button" type="submit">Submit</button>
		</div>
	</form>
	</div>
	
</div>
</div>



<?php @include "footer.php"; ?>