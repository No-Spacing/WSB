<?php @include "header.php";
	include "validate_manager.php";
	include "connect.php";
	include "session_timeout.php";
	if(!isset($_SESSION)) {
		session_start();
	}
	
	if (isset($_GET["custID"])) {
        $_SESSION["custID"] = $_GET["custID"];
    }
	
	$queryShowCustomer = "SELECT * FROM Customer WHERE custID=".$_SESSION["custID"];
	$resultShowCustomer = $conn->query($queryShowCustomer);
	$row = $resultShowCustomer->fetch_assoc();
	
	

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

	<div id="customer_info"  >
		<div id="mcusinfocontainer"  ></div>
		<div id="name_" >
			Name: <?php echo $row["FirstName"] . " " . $row["LastName"]; ?>
		</div>
		<div id="gender__ek1" >
			Gender: <?php echo $row["Gender"]; ?>
		</div>
		<div id="account_no_" >
			Account No: <?php echo $row["AccNo"]; ?>
		</div>
		<div id="balance__php__" >
			Balance (PHP): <?php echo number_format($row["Balance"]); ?>
		</div>
		<div id="date_of_birth__ek1" >
			Date of Birth: <?php echo $row["DoB"]; ?>
		</div>
		<div id="email_address__ek1" >
			Email Address: <?php echo $row["Email"]; ?>
		</div>
		<div id="phone_no___ek1" >
			Phone No.: <?php echo $row["Phone"]; ?>
		</div>
		<div id="home_address__ek1" >
			Home Address: <?php echo $row["Address"]; ?>
		</div>
		<div id="user_id_" >
			Username: <?php echo $row["UserName"]; ?>
		</div>


	</div>

	<div id="customer_deposit"  >
	<form class="customer_deposit" action="manager_customer_info_action.php" method="post">
		<div id="depositcontainer"  ></div>
		<div id="deposit_00" >
			Deposit:
		</div>
		<div id="deposit_01"  >
			<input type="number" id="deposit_01" name="deposit_01" required>
		</div>
		<div id="deposit_02"  >
			<button type="submit" class="depositbtn" id="depositsubmit" >Submit</button>
		</div>
	</form>
	</div>
</div>
</div>












<?php @include "footer.php"; ?>