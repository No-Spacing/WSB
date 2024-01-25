<?php @include "header.php";
		include "validate_customer.php";
	include "session_timeout.php"; 
	include "connect.php"; // connects to the database...
	if(!isset($_SESSION)) { // AVOID Multiple Session...
        session_start();
    }
	
	

	$username = $_SESSION['Username'];
		
	$sql0 = "SELECT * FROM Customer WHERE UserName='".$username."';"; //Fetch the colums from the Customer table...
	$result = $conn->query($sql0);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){ 
			$email = $row["Email"];
			$phno = $row["Phone"];
			$cus_uname = $row["UserName"];
			$cus_pwd = $row["Password"];		
		}
	}
		
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

	<div id="accountmaintenanceform"  >
	<form class="accountmaintenanceform" action="customer_accountmaintenance_action.php" method="post">
		<div id="caccountmaincontainer"  ></div>
		<div id="email_address__ek6" >
			Edit Here.
		</div>

		<div id="mobile_number_" >
			Mobile Number:
		</div>
		<div id="caccmainphoneno"  >
			<input type="text" id="cnumber" name="cnumber" value="<?php echo $phno ?>">
		</div>
		<div id="password__ek6" >
			Old Password:
		</div>
		<div id="cpassaccmain"  >
			<input type="password" id="cpass" name="cpass" required>
		</div>
		<div id="confirm_password__ek2" >
			New Password:
		</div>
		<div id="cconpassaccmain"  >	
			<input type="password" id="cconpass" name="cconpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
			title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		</div>
		<div id="caccmainbtn"  >
			<button class="button" type="submit" id="btnSubmit" name="btnSubmit">Save</button>
		</div> 
		
		<script src="jquery.md5.js"></script>
		<script src="jquery-3.5.1.min.js" ></script>
		<script>
			$(function () {
				$("#btnSubmit").click(function () { 
					var password = $("#cpass").val();
					var hash = md5(password);
					var sqlHash = "<?php echo $cus_pwd ?>";
					if (sqlHash != hash) {
						alert("Incorrect Old Password");							
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