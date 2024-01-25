<?php @include "header.php";
	include "validate_manager.php";
	include "connect.php";
	include "session_timeout.php";
	if(!isset($_SESSION)) {
		session_start();
	}
	
	if (isset($_GET["username"])) {
        $_SESSION["username"] = $_GET["username"];
    }

 ?>

<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_manager_customer_info_page_ek1"  >
	<div id="_bg__manager_customer_info_page_ek2"  >
	<div id="nav_bar_ek6"  >
		<div id="mcusinfonavbar1"  ></div>
		<div id="wall_street_bank_ek6" >
			Wall Street Bank
		</div>
		<div id="logout_ek6" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>
	</div>

	<div id="client_nav_bar_ek5"  >
		<div id="mcusinfonavbar2"  ></div>
		<div id="home_ek5" >
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
		</div>
		<div id="add_customer_ek1" >
			<a style="text-decoration:none" href='manager_add_customer_page.php'>Add Customer</a>
		</div>
		<div id="manage_customers_ek5" >
			<a style="text-decoration:none" href='manager_manage_customers_page.php'>Manage Customers</a>
		</div>

	</div>

	<div id="transmoneyform"  >
		<div id="ctransmoneycontainers"  ></div>
		<div id="sentinfo" >
			1000 Pesos Deposited to AccountName.
		</div>
	</div>
</div>
</div>












<?php @include "footer.php"; ?>