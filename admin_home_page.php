<?php @include "header.php";
	include "validate_admin.php"; // checks if admin is logged in...
	include "session_timeout.php"; // login time expires...
 ?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />



<div id="page_admin_home_page_ek1"  >
	<div id="_bg__admin_home_page_ek2"  >

	<div id="nav_bar_ek3"  >
		<div id="ahomenavbar1"  ></div>
		<div id="wall_street_bank_ek3" >
			Wall Street Bank
		</div>
		<div id="logout_ek3" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek3"  >
		<div id="ahomenavbar2"  ></div>
		<div id="home_ek3" >
			<a style="text-decoration:none" href='admin_home_page.php'>Home</a>
		</div>
		<div id="managerlist_ek3" >
			<a style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
		</div>

		<div id="add_manager_ek3" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		
		<div id="manage_customers_ek3" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>
		<div id="act_logs" >
			<a style="text-decoration:none" href='admin_activity_logs_page.php'>Activity Logs</a>
		</div>
	</div>

	<div id="admininfo"  >
		<div id="ahomecontainer"  ></div>
		<div id="__admin_access_page_" >
			"Admin Access Page"
		</div>
		<div id="infoadmin" >
			
Please note that only authorized personnel is only allowed to access this website.
Having access on this page gives you access on updating all the information of a any user including the manager and employee registered on our banking website. 
Always double check all information before saving any changes.
Any error or problems that you encounter, please contact your I.T. team directly.
		</div>

	</div>
</div>
</div>
















<?php @include "footer.php"; ?>