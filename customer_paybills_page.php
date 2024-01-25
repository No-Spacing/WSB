<?php @include "header.php"; 
	include "validate_customer.php";
	include "session_timeout.php";// checks if the customer is logged in...
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_paybills_page_ek1"  >
	<div id="_bg__customer_paybills_page_ek2"  >

	<div id="nav_bar_ek17"  >
		<div id="cpaybillsnavbar1"  ></div>
		<div id="wsb_ek6" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek12" >
			<a style="text-decoration:none" href="logout_action.php" onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek11"  >
		<div id="cpaybillsnavbar2"  ></div>
		<div id="home_ek11" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account_ek2" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions_ek2" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money_ek2" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills_ek2" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance_ek2" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>	
		</div>

	</div>

	<div id="icons"  >
		<a href='customer_paymeralco_page.php' ><img src="skins/meralco_icon1.png" id="meralco_icon1" /></a>
		<img src="skins/line_1.png" id="line_1" />
		<a href='customer_paymaynilad_page.php' ><img src="skins/maynilad_icon1.png" id="maynilad_icon1" /></a>

	</div>
</div>
</div>

<?php @include "footer.php"; ?>