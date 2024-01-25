<?php @include "header.php";

	include "connect.php";
	 include "validate_customer.php"; // checks if the user is logged in...
	 include "session_timeout.php";
	 
	 
	 if(!isset($_SESSION)){
		 session_start();
	 }
	 $uname = $_SESSION['Username'];
	 
	 $querySelect = "SELECT * FROM Customer WHERE UserName='$uname'";
	 
	 $result = $conn->query($querySelect);
	 $row = $result->fetch_assoc();
	 $acno = $row["AccNo"];
	 $custID = $row["custID"];
	 $queryPassbook = "SELECT * FROM passbook".$custID." ORDER BY trans_date DESC LIMIT 1";
	 $resultPassbook = $conn->query($queryPassbook);
	 $rowPassbook = $resultPassbook->fetch_assoc();
	 
	 
 ?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_home_page_ek1"  >
	<div id="_bg__customer_home_page_ek2"  >

	<div id="chomenavbar"  >
		<div id="chomenavbar1"  ></div>
		<div id="wsb_ek11" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek17" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')">LOGOUT</a>
		</div>

	</div>

	<div id="chomenavbar2"  >
		<div id="chomenavbar2_ek1"  ></div>
		<div id="home_ek16" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account_ek7" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions_ek7" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money_ek7" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills_ek7" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance_ek7" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>
		</div>
		
		<div id="welcome"><h1>Welcome,</h1></div>
		<div id="nm"><h1><?=$row["FirstName"];?> <?= $row["LastName"];  ?></h1></div>
		<div id="rct"><h2>Your recent transaction is:</h2></div>
		<div id="val"><h2><?=$rowPassbook["remarks"] ?></h2></div>


	</div>
	</div> 
<?php @include "footer.php"; ?>