<?php
@include "header.php";
	include "validate_customer.php";
	include "session_timeout.php";
	include "connect.php";
	
	if(!isset($_SESSION)) {
        session_start();
    }

	
	
	$username = $_SESSION['Username'];
	$sqlShowCust = "Select * From Customer WHERE Username='".$username."'";
	
	$fname= mysqli_real_escape_string($conn, $_POST["ctransfname"]);
	$lname = mysqli_real_escape_string($conn, $_POST["ctranslname"]);
	$can = mysqli_real_escape_string($conn, $_POST["ctransaccno"]);
	$amount = mysqli_real_escape_string($conn, $_POST["ctransamount"]);
	$password = mysqli_real_escape_string($conn, $_POST["ctranspass"]);
	
	$result = $conn->query($sqlShowCust);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$acno = $row["AccNo"];
			$custID = $row["custID"];
			$userFName = $row["FirstName"];
			$userLName = $row["LastName"];
			$userEmail = $row["Email"];
		}
	}
	

	
	$sqlTransferToCustAccNo = "SELECT AccNo FROM Customer WHERE AccNo='$can'";
	$resultTransferToAccNo= $conn->query($sqlTransferToCustAccNo);
	$belowLimit = 50000;
	$aboveLimit = 100;

?>

<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_transfermoney_page_ek1"  >
	<div id="_bg__customer_transfermoney_page_ek2"  >

	<div id="nav_bar_ek19"  >
		<div id="rectangle_1"  ></div>
		<div id="wsb_ek8" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek14" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek13"  >
		<div id="rectangle_8"  ></div>
		<div id="home_ek13" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account_ek4" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions_ek4" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money_ek4" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills_ek4" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance_ek4" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>
		</div>

	</div>

	<div id="transmoneyform"  >
		<div id="ctransmoneycontainers"  ></div>
		<?php 
			if(mysqli_num_rows($resultTransferToAccNo) > 0){
				$sql_pass = "SELECT * FROM customer WHERE UserName='$username'";
				$checkpass = $conn->query($sql_pass);
				$rowPass = $checkpass->fetch_assoc();
				
				$sqlTransferToCustID = "SELECT * FROM Customer WHERE AccNo='$can'";
				$resultTransferToCustID= $conn->query($sqlTransferToCustID);
				$rowTransferToCustID = $resultTransferToCustID->fetch_assoc();
				$transferCustID = $rowTransferToCustID["custID"];
				$transferEmail = $rowTransferToCustID["Email"];
							
				$sqlTransferPassbook = "SELECT balance FROM passbook".$transferCustID." ORDER BY trans_date DESC LIMIT 1";
				$resultTransferPassbook = $conn->query($sqlTransferPassbook);
				$rowTransferPassbook = $resultTransferPassbook->fetch_assoc();
				$transferBalance = $rowTransferPassbook["balance"];	
	
				$sqlPassbook = "SELECT balance FROM passbook".$custID." ORDER BY trans_date DESC LIMIT 1";
				$resultPassbook = $conn->query($sqlPassbook);
				$rowPassbook = $resultPassbook->fetch_assoc();
				$balance = $rowPassbook["balance"];				
				
				if ($rowPass["Password"] === md5($password)) {
					if($amount > $belowLimit){ ?>
						<div id="sentinfo" >
							You can only Transfer <?php echo $belowLimit ?> Below.
						</div>
<?php				} else if($amount < $aboveLimit) { ?>
						<div id="sentinfo" >
							You can only Transfer <?php echo $aboveLimit ?> Above.
						</div>
<?php				} else { ?>
<?php					if($amount > $balance){ ?>
							<div id="sentinfo" >
								Insufficient Balance. Your Current Balance is <?php echo $balance; ?>
							</div>	

<?php 					} else { 
			
							$final_balance = $balance - $amount;
							$sqlUpdatePassbook = "INSERT INTO passbook".$custID." VALUES (NULL, NULL, NOW(),'Transfer Money To $fname $lname', 0, $amount, $final_balance)";	
							$conn->query($sqlUpdatePassbook);		
		
							$transferFinalBalance = $transferBalance + $amount;
							$sqlUpdatePassbook1 = "INSERT INTO passbook".$transferCustID." VALUES (NULL, NULL, NOW(),'Recieve Money From $userFName $userLName', $amount, 0, $transferFinalBalance)";	
							$conn->query($sqlUpdatePassbook1);
		
							$sqlUpdateProfileBalance = "UPDATE Customer SET Balance=".$final_balance." WHERE AccNo=$acno";
							$conn->query($sqlUpdateProfileBalance);
							$sqlUpdateProfileBalance1 = "UPDATE Customer SET Balance=".$transferFinalBalance." WHERE custID=$transferCustID";
							$conn->query($sqlUpdateProfileBalance1);
							
							$subject = "Recieve Money from $userFName $userLName";
							$message = "Sender Name: $userFName $userLName
										\nSender Account No.: $acno
										\nAmount Recieve: $amount
										\nDate/Time: ".date("Y-m-d H:i:s").
										"\n\nEmail Receipt Sent To: $transferEmail";
							$sender = "From: wallstreetbank.99@gmail.com";		
							mail($transferEmail, $subject, $message, $sender);
							
							$subject1 = "Transfer Money to $fname $lname";
							$message1 = "Reciever Account No.: $fname $lname
										\nReciever Name: $can
										\nAmount Transfer: $amount
										\nDate/Time: ".date("Y-m-d H:i:s").
										"\nEmail Receipt Sent To: $transferEmail";
							$sender1 = "From: wallstreetbank.99@gmail.com";		
							mail($userEmail, $subject1, $message1, $sender1); ?>	
							<div id="sentinfo" >
								<?php echo $amount; ?> Pesos has been sent to <?= $fname." ".$lname; ?>.
							</div>
<?php 					} ?>					
<?php 				}	?>
<?php			} else { ?>	  
					<div id="sentinfo" >
						Incorrect Password.
					</div>			  
<?php 			} 
			} else { ?>
				<div id="sentinfo" >
					Account Number does not exist.
				</div>
<?php 		} ?>

			
	</div>
</div>
</div>


<?php @include "footer.php"; ?>