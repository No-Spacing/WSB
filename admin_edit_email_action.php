<?php 

include "connect.php";
include "validate_admin.php"; // checks if admin is logged in...
include "session_timeout.php"; // login time expires...
// Avoid Multiple Session
	if(!isset($_SESSION)) {
		session_start();
	}

// Gets the CustID from the Session...	
	if (isset($_GET["custID"])) {
        $_SESSION["custID"] = $_GET["custID"];
	}
	$admin = $_SESSION['Admin'];
	$email = mysqli_real_escape_string($conn, $_POST["email_01"]);
	$queryEmail = "SELECT Email FROM Customer WHERE Email = '$email'";
	$result1 = $conn->query($queryEmail);
	
	$queryAccNo = "SELECT * FROM Customer WHERE custID= ".$_SESSION["custID"];
	$result2 = $conn->query($queryAccNo);
	$row = $result2->fetch_assoc();
	$accNo = $row['AccNo'];
	

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
		<?php 	if (mysqli_num_rows($result1) >= 1) { ?>
				<div id="sentinfo" >
					Email already exist.
				</div>
		<?php } else { 
				$queryUpdate = "UPDATE Customer SET Email = '$email' WHERE custID =".$_SESSION["custID"];
				$logQuery = "INSERT INTO adminLogs VALUES('$admin', '$accNo', 'Edit Customer Email.', NOW())"; 
				$conn->query($queryUpdate);
				$conn->query($logQuery);
		?>
				<div id="sentinfo" >
					New email bank account has been updated.
				</div>
		<?php } ?>
	</div>
</div>
</div>