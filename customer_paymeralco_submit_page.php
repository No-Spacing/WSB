<?php @include "header.php";
	include "validate_customer.php"; ?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_paymeralco_page_ek1"  >
	<div id="_bg__customer_paymeralco_page_ek2"  >

	<div id="nav_bar_ek16"  >
		<div id="cpaymeralconavbar1"  ></div>
		<div id="wsb_ek5" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek11" >
			<a style="text-decoration:none" href='log_out.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
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
		<div id="sentinfo" >
			You sent 10000 pesos to Meralco.
		</div>
	</div>
</div>
</div>








<?php @include "footer.php"; ?>