<?php @include "header.php"; 

	
	if(!isset($_SESSION)) { // Avoids Multiple Session...
        session_start();
    }
	
	if (isset($_GET['loginFailed'])) { // checks if the login credentials is invalid...
        $message = "Invalid Credentials ! Please try again.";
        echo "<script>alert('$message');</script>";
    }

    if(isset($_SESSION['isAdminValid'])){ // checks if admin is currently login...
        header("location:admin_home_page.php"); // redirect to admin home page...
    }

?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_admin_login_page_ek1"  >
	<div id="_bg__admin_login_page_ek2"  >

	<div id="nav_bar_ek4"  >
		<div id="aloginnavbar1"  ></div>
		<div id="wall_street_bank_ek4" >
			Wall Street Bank
		</div>

	</div>
	
	<div id="login_form"  >
		<div id="alogincontainer"  ></div>
		<div id="log_in_to_wsb_online_banking" >
			Log in to WSB Online Banking
		</div>
		<form class="login_form" action="admin_login_action.php" method="post">
		<div id="admin_id_" >
			Admin ID:
		</div>
		<div id="aloginadminidbox"  >
			<input type="text" id="adminid" name="adminid" required>
		</div>
		<div id="password__ek2" >
			Password:
		</div>
		<div id="aloginpassbox"  >
			<input type="password" id="adminpass" name="adminpass" required>
		</div>
		<div id="aloginbtn"  >
			<button class="button" type="submit">Login</button>
		</div>
		</form>

	</div>
</div>
</div>
















<?php @include "footer.php"; ?>