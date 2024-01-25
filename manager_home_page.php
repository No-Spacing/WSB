<?php @include "header.php"; 
	include "validate_manager.php";
	include "session_timeout.php";
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_manager_home_page_ek1"  >
	<div id="_bg__manager_home_page_ek2"  >

	<div id="nav_bar_ek9"  >
		<div id="mhomenavbar1"  ></div>
		<div id="wall_street_bank_ek9" >
			Wall Street Bank
		</div>
		<div id="logout_ek9" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek8"  >
		<div id="mhomenavbar2"  ></div>
		<div id="home_ek8" >
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
		</div>
		<div id="add_customer_ek4" >
			<a style="text-decoration:none" href='manager_add_customer_page.php'>Add Customer</a>
		</div>
		<div id="manage_customers_ek8" >
			<a style="text-decoration:none" href='manager_manage_customers_page.php'>Manage Customers</a>
		</div>


	</div>

	<div id="managerinfo"  >
		<div id="mhomecontainer"  ></div>
		<div id="__manager_access_page_" >
			"Manager Access Page"
		</div>
		<div id="infomanager" >
			
Please note that only authorized personnel is only allowed to access this website.
Having access on this page gives you access on all of customers  information only. Any concern about your employees access, kindly contact your admin.
Always double check all information before saving any changes. Any errors that you made, kindly contact your admin.
For technical problems, please contact your I.T. department directly.
		</div>

	</div>
</div>
</div>












<?php @include "footer.php"; ?>