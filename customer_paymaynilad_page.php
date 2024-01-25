<?php @include "header.php"; 
	include "validate_customer.php"; // checks if the customer is logged in...
	include "session_timeout.php";
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_paymaynilad_page_ek1"  >
	<div id="_bg__customer_paymaynilad_page_ek2"  >

	<div id="nav_bar_ek15"  >
		<div id="cmayniladnavbar1"  ></div>
		<div id="wsb_ek4" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>

		<div id="logout_ek10" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek9"  >
		<div id="cmayniladnavbar2"  ></div>
		<div id="home_ek9" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>
		</div>

	</div>

	<div id="cmayniladform"  >
	<form class="cmayniladform" action="customer_paymaynilad_action.php" method="post">
		<div id="cmayniladcontainer"  ></div>
		<img src="skins/maynilad_icon2.png" id="maynilad_icon2" />
		<div id="contract_account_number__8_digit__" >
			Contract Account Number (8-Digit):
		</div>
		<div id="xmayniladaccnobox"  >
			<input type="text" id="cpaymayniladaccno" name="cpaymayniladaccno" required>
		</div>
		<div id="account_name_" >
			Account Name:
		</div>
		<div id="cmayniladaccnamebox"  >
			<input type="text" id="cpaymayniladaccname" name="cpaymayniladaccname" required>
		</div>
		<div id="amount_" >
			Amount:
		</div>
		<div id="cmayniladamountbox"  >
			<input type="number" id="cpaymayniladamount" name="cpaymayniladamount" required>
		</div>
		<div id="email_address__ek4" >
			Email Address:
		</div>
		<div id="cmaynilademailbox"  >
			<input type="text" id="cpaymaynilademail" name="cpaymaynilademail" required>
		</div>
		<div id="pin__ek1" >
			PIN:
		</div>
		<div id="cmayniladpinbox"  >
			<input type="password" id="cpaymayniladpin" name="cpaymayniladpin" required>
		</div>
		<div id="cmayniladbtn"  >
			<button class="button" type="submit">Submit</button>;
		</div>
	
	</form>
	</div>
</div>
</div>








<?php @include "footer.php"; ?>