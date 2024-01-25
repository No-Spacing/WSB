<?php @include "header.php";
	include "validate_admin.php";
	include "session_timeout.php";
 ?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_admin_add_manager_page_ek1"  >
	<div id="_bg__admin_add_manager_page_ek2"  >

	<div id="nav_bar_ek2"  >
		<div id="aaddmanagernavbar1"  ></div>
		<div id="wall_street_bank_ek2" >
			Wall Street Bank
		</div>
		<div id="logout_ek2" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek2"  >
		<div id="aaddmanagernavbar2"  ></div>
		<div id="home_ek2" >
			<a style="text-decoration:none" href='admin_home_page.php'>Home</a>
		</div>
		<div id="managerlist_ek3" >
			<a style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
		</div>
		<div id="add_manager_ek2" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		<div id="manage_customers_ek2" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>
		<div id="act_logs" >
			<a style="text-decoration:none" href='admin_activity_logs_page.php'>Activity Logs</a>
		</div>

	</div>
	
	
	<div id="transmoneyforM"  >
		<div id="ctransmoneycontainers"  ></div>
		<div id="sentinfo" >
			Manager Name has been updated.
		</div>
	</div>

</div>
</div>

<?php @include "footer.php"; ?>