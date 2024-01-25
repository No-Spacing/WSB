<?php @include "header.php"; 
	include "validate_customer.php";
	include "session_timeout.php";
	include "connect.php";
	
	if(!isset($_SESSION)) {
        session_start();
    }
	
	$username = $_SESSION['Username'];
		
	$sql0 = "SELECT * FROM Customer WHERE UserName='".$username."';";
	$result = $conn->query($sql0);
	


	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){	
			$acno = $row["AccNo"];	
		}
	}	
	
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
	<form class="transfermoneyform" action="customer_transfermoney_action.php" method="post">
		<div id="ctransmoneycontainer"  ></div>
		<div id="receiver_first_name_" >
			Receiver First Name:
		</div>
		<div id="ctransmoneyfname"  >
			<input type="text" id="ctransfname" name="ctransfname" required>
		</div>
		<div id="receiver_last_name_" >
			Receiver Last Name:
		</div>
		<div id="ctransmoneylname"  >
			<input type="text" id="ctranslname" name="ctranslname" required>
		</div>
		<div id="receiver_account_no_" >
			Receiver Account No:
		</div>
		<div id="ctransmoneyaccountno"  >
			<input type="text" id="ctransaccno" name="ctransaccno" required>
		</div>
		
		<div id="enter_amount__in_php__" >
			Enter Amount (in PHP):
		</div>
		<div id="ctransmoneyamount"  >
			<input type="number" id="ctransamount" name="ctransamount" required>
		</div>
		<div id="enter_your_password_" >
			Enter Your Password:
		</div>
		<div id="ctransmoneypass"  >
			<input type="password" id="ctranspass" name="ctranspass" required>
		</div>
		<div id="ctransmoneybtn"  >
			<button class="button" type="submit" id="btnSubmit" name="btnSubmit" >Submit</button>
		</div>
		
		<script src="jquery.md5.js"></script>
		<script src="jquery-3.5.1.min.js" ></script>
		<script>
			$(function () {
				$("#btnSubmit").click(function () { 
					var accNo = $("#ctransaccno").val();
					var verifyAccNo = "<?php echo $acno; ?>";						
					if (accNo == verifyAccNo) {
						alert("You can't transfer to your own account");							
						return false;
					}
				return true;
				});
			});		
		</script>
		
	</form>	

	</div>
</div>
</div>






<?php @include "footer.php"; ?>