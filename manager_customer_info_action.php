<?php @include "header.php";
	include "validate_manager.php"; // Validate the manager if he's logged in or not.
	include "connect.php"; //Initiate Connection to Database...
	include "session_timeout.php";
/* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
if(!isset($_SESSION)){
	session_start();
}

	$amount = mysqli_real_escape_string($conn, $_POST["deposit_01"]); // Get The Inputs from manager_customer_info_page.php
	$username = $_SESSION["custID"]; //Get the Value from session named custID
	
	$sqlShowCust = "Select * From Customer WHERE custID=".$username;
	$result = $conn->query($sqlShowCust);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){ // Fetch the columns from customer table...
			$custID = $row["custID"];
			$accno = $row["AccNo"];
			$name = $row["FirstName"]. " " . $row["LastName"];
			$email = $row["Email"];
		}
	}
	
	$sqlPassbook = "SELECT balance FROM passbook".$custID." ORDER BY trans_date DESC LIMIT 1";
    $result = $conn->query($sqlPassbook);
    $row = $result->fetch_assoc();
    $balance = $row["balance"]; // fetch balance from customer table...
	$transferFinalBalance = $balance + $amount;
	$sqlUpdatePassbook1 = "INSERT INTO passbook".$custID." VALUES (NULL, NULL, NOW(),'Recieved Money From BANK', $amount, 0, $transferFinalBalance)";
	
	$sqlUpdateProfileBalance = "UPDATE Customer SET Balance=".$transferFinalBalance." WHERE custID=$custID";
	
	$limit = 1000;
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
		<?php 
			if($amount > $limit){
			?>
				<div id="sentinfo" >
						You can only Transfer <?php echo $limit ?> Below.
				</div>
			
<?php		} else {
				if ($conn->query($sqlUpdatePassbook1)){ //Check of the Query is Succeeded... ?>
					<div id="sentinfo" >
						<?php echo $amount; ?> Pesos Deposited to <?php echo $name;  ?>.
						<?php $conn->query($sqlUpdateProfileBalance);//Update the balance from Customer...  
								$subject = "Bank Deposit";
								$message = "Your $amount Pesos deposit from bank has been sent to your account($accno).";
								$sender = "From: wallstreetbank.99@gmail.com";		
								mail($email, $subject, $message, $sender); // send email from the customer...				
						?>
					</div>
<?php 			} else { ?>
					<div id="sentinfo" >
						Failed to Transfer. Please Try Again.
					</div>
<?php 			} 
			} ?>
	</div>
</div>
</div>












<?php @include "footer.php"; ?>