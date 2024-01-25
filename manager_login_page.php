<?php @include "header.php";
	if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION['isManagerValid'])){
        header("location:manager_home_page.php");
    }
	
	if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
        echo "<script>alert('$message');</script>";
    }

?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_manager_login_page_ek1"  >
	<div id="_bg__manager_login_page_ek2"  >

	<div id="nav_bar_ek10"  >
		<div id="mloginnavbar1"  ></div>
		<div id="wall_street_bank_ek10" >
			Wall Street Bank
		</div>

	</div>

	<div id="login_form_ek1"  >
		<div id="mlogincontainer"  ></div>
		<div id="log_in_to_wsb_online_banking_ek1" >
			Log in to WSB Online Banking
		</div>
		<form class="managerloginform" action="manager_login_action.php" method="post">	
		<div id="manager_id" >
			Manager ID:
		</div>
		<div id="mloginmanagidbox"  >
			<input type="text" id="managerid" name="managerid" required>
		</div>
		<div id="password__ek4" >
			Password:
		</div>
		<div id="mloginpassbox"  >
			<input type="password" id="managerpass" name="managerpass" required>
		</div>
		<div id="mloginbtn"  >
			<button class="button" type="submit">Login</button>
		</div>
		</form>

	</div>
</div>
</div>












<?php @include "footer.php"; ?>