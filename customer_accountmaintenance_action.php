<?php
	include "validate_customer.php";
	include "session_timeout.php";
/* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
	if(!isset($_SESSION)) {
        session_start();
    }
	
	include "connect.php"; // connects to the database
	

	$username = $_SESSION['Username']; // get the value from the session named Username...

	// get the inputs from customer_accountmaintenance_page.php...
	$mobileNo = mysqli_real_escape_string($conn, $_POST["cnumber"]);
	$password = mysqli_real_escape_string($conn, $_POST["cconpass"]);
	$hashPassword = md5($password);
	
	
	$queryUpdate = "UPDATE Customer SET Phone='$mobileNo', Password='$hashPassword' WHERE UserName='$username'";
	$querySelect = "SELECT * FROM Customer WHERE UserName = '$username'";
	$result = $conn->query($querySelect);
	$row = $result->fetch_assoc(); // fetch specific column from the Customer table...
	$acno = $row['AccNo'];
	
	
	$logQuery = "INSERT INTO CustomerLogs VALUES('$acno', 'Customer Edit.', NOW())";
				
?>

	<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_accountmaintenance_page_ek1"  >
	<div id="_bg__customer_accountmaintenance_page_ek2"  >

	<div id="nav_bar_ek18"  >
		<div id="caccmainnavbar1"  ></div>
		<div id="wsb_ek7" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek13" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek12"  >
		<div id="caccmainnavbar2"  ></div>
		<div id="home_ek12" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account_ek3" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions_ek3" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money_ek3" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills_ek3" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance_ek3" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>
		</div>

	</div>
	<div id="transmoneyform"  >
		<div id="ctransmoneycontainers"  ></div>
		<?php if($conn->query($queryUpdate)){ // Checks if the table is successfully updated.
				$conn->query($logQuery); // Insert log from customerlogs table...
		?>
		<div id="sentinfo" >
			Your record has been updated.
		</div>
		<?php } else { ?>
		<div id="sentinfo" >
			Please try again.
		</div>
		<?php } ?>		
	</div>

	</div>

</div>

<?php @include "footer.php"; ?>
	