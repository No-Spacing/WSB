<?php @include "header.php";
	include "validate_admin.php";
	include "connect.php";
	include "session_timeout.php";
	
	if(!isset($_SESSION)) {
		session_start();
	}
	
	if (isset($_GET["username"])) {
        $_SESSION["username"] = $_GET["username"];
    }
	
	$queryShowCustomer = "SELECT * FROM Customer WHERE Username='".$_SESSION["username"]."'";
	$resultShowCustomer = $conn->query($queryShowCustomer);
	$row = $resultShowCustomer->fetch_assoc();
	$gender = $row["Gender"];
	
	
 ?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_admin_edit_customer_info_page_ek1"  >
	<div id="_bg__admin_edit_customer_info_page_ek2"  >

	<div id="nav_bar"  >
		<div id="aeditcusnavbar1"  ></div>
		<div id="wall_street_bank" >
			Wall Street Bank
		</div>
		<div id="logout" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar"  >
		<div id="aeditcusnavbar2"  ></div>
		<div id="home" >
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
		</div>
		<div id="managerlist_ek3" >
			<a style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
		</div>

		<div id="add_manager" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		<div id="manage_customers" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>

	</div>

	<div id="transmoneyform"  >
		<div id="ctransmoneycontainers"  ></div>
		<div id="sentinfo" >
			Mr/Ms Name bank account has been updated.
		</div>
	</div>
</div>
</div>


















<?php @include "footer.php"; ?>