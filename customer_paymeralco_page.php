<?php @include "header.php";
	include "validate_customer.php";
	include "session_timeout.php"; ?>
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

	<div id="cmeralcoform"  >
		<div id="cmeralcocontainer"  ></div>
		<form class="cmeralcoform" action="customer_paymeralco_action.php" method="post" >
		
		<img src="skins/meralco_icon2.png" id="meralco_icon2" />
		<div id="customer_account_number__can__" >
			Customer Account Number (CAN):
		</div>
		<div id="cmeralcoaccountno"  >
			<input type="text" id="cpaymeralcoaccno" name="cpaymeralcoaccno" required>
		</div>
		<div id="amount__ek1" >
			Amount:
		</div>
		<div id="cmeralcoamount"  >
			<input type="number" id="cpaymeralcoamount" name="cpaymeralcoamount" required>
		</div>
		<div id="email_address__ek5" >
			Email Address:
		</div>
		<div id="cmeralcoemail"  >
			<input type="text" id="cpaymeralcoemail" name="cpaymeralcoemail" required>
		</div>
		<div id="pin__ek2" >
			PIN:
		</div>
		<div id="cmeralcopinbox"  >
			<input type="password" id="cpaymeralcopin" name="cpaymeralcopin" required>
		</div>
		<div id="cpaymeralcobtn"  >
			<button class="button" type="submit">Submit</button>
		</div>
		</form>

	</div>
</div>
</div>








<?php @include "footer.php"; ?>