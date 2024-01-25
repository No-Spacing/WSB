<?php
	@include "header.php";
	include "validate_customer.php";
	include "session_timeout.php";
	include "connect.php";
	
	
    if(!isset($_SESSION)) {
        session_start();
    }

	
	
	$username = $_SESSION['Username'];
	$sqlShowCust = "Select AccNo, custID From Customer WHERE Username='".$username."'";
	$can = mysqli_real_escape_string($conn, $_POST["cpaymeralcoaccno"]);
	$amount = mysqli_real_escape_string($conn, $_POST["cpaymeralcoamount"]);
	$email = mysqli_real_escape_string($conn, $_POST["cpaymeralcoemail"]);
	$pin = mysqli_real_escape_string($conn, $_POST["cpaymeralcopin"]);
	
	$result = $conn->query($sqlShowCust);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$acno = $row["AccNo"];
			$custID = $row["custID"];
		}
	}	
	
    $sqlPassbook = "SELECT balance FROM passbook".$custID." ORDER BY trans_date DESC LIMIT 1";
	$result = $conn->query($sqlPassbook);
    $row = $result->fetch_assoc();
    $balance = $row["balance"];
	$hashPin = md5($pin);
	$belowLimit = 1000;
	$aboveLimit = 100;
	$sql_pin = "SELECT * FROM customer WHERE UserName='$username'";
	$checkpin = $conn->query($sql_pin);
	$row = $checkpin->fetch_assoc();
	

		
?>

<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_paymeralco_page_ek1"  >
	<div id="_bg__customer_paymeralco_page_ek2"  >

	<div id="nav_bar_ek16"  >
		<div id="cpaymeralconavbar1"  ></div>
		<div id="wsb_ek5" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek11" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek10"  >
		<div id="cpaymeralconavbar2"  ></div>
		<div id="home_ek10" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account_ek1" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions_ek1" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money_ek1" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills_ek1" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance_ek1" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>
		</div>

	</div>
	
	<div id="transmoneyform"  >
		<div id="ctransmoneycontainers"  ></div>
		
		<?php if ($row['PIN'] === $hashPin) { 
					if($amount > $belowLimit){ ?>	
						<div id="sentinfo" >
							
							You can only Transfer <?php echo $belowLimit ?> Below.
						</div>
		<?php 		} else if($amount < $aboveLimit ) { ?>
						<div id="sentinfo" >
								You can only Transfer <?php echo $aboveLimit ?> Above.
						</div>	
		<?php 		} else {	
							if($amount > $balance){   ?>
								<div id="sentinfo" >
									Insufficient Balance. Your current balance is <?php echo $balance; ?>
								</div>
		<?php 				} else { 
								$final_balance = $balance - $amount;		
								$sqlUpdatePassbook = "INSERT INTO passbook".$custID." VALUES (NULL, NULL, NOW(),'Pay Bills To Meralco ($can)', 0, $amount, $final_balance)";	
								$conn->query($sqlUpdatePassbook);
								$sqlUpdateProfileBalance = "UPDATE Customer SET Balance=".$final_balance." WHERE AccNo=$acno";
								$conn->query($sqlUpdateProfileBalance);	
								$subject = "Pay to Meralco";
								$message = "Biller Name: Meralco
										\nAmount Paid: $amount
										\nMeralco Account Number: $can 
										\nDate/Time: ".date("Y-m-d H:i:s").
										"\n\nEmail Receipt Sent To: $email";
								$sender = "From: wallstreetbank.99@gmail.com";		
								mail($email, $subject, $message, $sender); ?>
								<div id="sentinfo" >
									You sent <?php echo $amount; ?> pesos to Maynilad. <?php  ?>
								</div>
			<?php			}	?>		
			<?php	} 
				} else { ?>
					<div id="sentinfo" >
						Incorrect Pin.
					</div>
		<?php 	} ?>
		
	</div>
</div>
</div>

<?php @include "footer.php"; ?>
