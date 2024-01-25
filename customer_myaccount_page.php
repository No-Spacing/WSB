<?php @include "header.php"; 
	include "validate_customer.php";
	include "session_timeout.php";
	include "connect.php"; // connects to the database...
	if(!isset($_SESSION)) { // Avoid Multiple Session Warning...
        session_start();
    }
	
	

	$username = $_SESSION['Username']; // get the value from the session named Username...
		
	$sql0 = "SELECT * FROM Customer WHERE UserName='".$username."';";
	$result = $conn->query($sql0);
	if($result->num_rows > 0){ // fetch the columns from customer table...
		while($row = $result->fetch_assoc()){
			$fname = $row["FirstName"];
			$lname = $row["LastName"];
			$gender = $row["Gender"];
			$dob = $row["DoB"]; 
			$address = $row["Address"];		
			$email = $row["Email"];
			$phno = $row["Phone"];
			$balance = $row["Balance"];
			$acno = $row["AccNo"];     
			$pin = $row["PIN"];
			$cus_uname = $row["UserName"];
			$cus_pwd = $row["Password"];		
		}
	}
		

?>

<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_myaccount_page_ek1"  >
	<div id="_bg__customer_myaccount_page_ek2"  >

	<div id="nav_bar_ek21"  >
		<div id="cmyaccountnavbar1"  ></div>
		<div id="wsb_ek10" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek16" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek15"  >
		<div id="cmyaccountnavbar2"  ></div>
		<div id="home_ek15" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account_ek6" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions_ek6" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money_ek6" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills_ek6" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance_ek6" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>
		</div>

	</div>

		<div id="cmyaccountcontainer"  >
			<div id="cinfocontainer"  ></div>
			<div id="name__ek1" >
				Name: <?php echo $fname ." ". $lname;?>
			</div>
			<div id="gender__ek3" >
				Gender: <?php echo $gender;?>
			</div>
			<div id="account_no__ek1" >
				Account No: <?php echo $acno; ?>
			</div>
			<div id="balance__php___ek1" >
				Balance (PHP): <?php echo number_format($balance); ?>
			</div>
			<div id="date_of_birth__ek3" >
				Date of Birth: <?php echo $dob; ?>
			</div>
			<div id="email_address__ek7" >
				Email Address: <?php echo $email; ?>
			</div>
			<div id="phone_no___ek3" >
				Phone No.: <?php echo $phno; ?>
			</div>
			<div id="home_address__ek3" >
				Home Address: <?php echo $address; ?>
			</div>
			<div id="user_id__ek2" >
				User ID: <?php echo $cus_uname; ?>
			</div>

		</div>
	</div>
</div>



<?php @include "footer.php"; ?>