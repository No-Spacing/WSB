<?php @include "header.php"; 
	include "validate_manager.php";
	include "session_timeout.php";
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_manager_add_customer_page_ek1"  >
	<div id="_bg__manager_add_customer_page_ek2"  >

	<div id="nav_bar_ek8"  >
		<div id="maddcusnavbar1"  ></div>
		<div id="wall_street_bank_ek8" >
			Wall Street Bank
		</div>
		<div id="logout_ek8" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek7"  >
		<div id="maddcusnavbar2"  ></div>
		<div id="home_ek7" >
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
		</div>
		<div id="add_customer_ek3" >
			<a style="text-decoration:none" href='manager_add_customer_page.php'>Add Customer</a>
		</div>
		<div id="manage_customers_ek7" >
			<a style="text-decoration:none" href='manager_manage_customers_page.php'>Manage Customers</a>
		</div>


	</div>
	<form class="add_customer_form" action="manager_add_customer_action.php" method="post">
	<div id="form_ek2"  >
		<div id="maddcuscontainer"  ></div>
		<div id="first_name__ek2" >
			First Name:
		</div>
		<div id="maddcusfname"  >
			<input type="text" id="addfname" name="addfname" required>
		</div>
		<div id="last_name__ek2" >
			Last Name:
		</div>
		<div id="maddcuslname"  >
			<input type="text" id="addlname" name="addlname" required>
		</div>
		<div id="gender__ek2" >
			Gender:
		</div>
		<div id="male_ek1" >
			Male
		</div>
		<div id="maddcusmale"  >
			<input type="radio" name="gender" value="Male" required> 
		</div>
		<div id="other_ek1" >
			Other
		</div>
		<div id="maddcusother"  >
			<input type="radio" name="gender" value="Others" required> 
		</div>
		<div id="female_ek1" >
			Female
		</div>
		<div id="maddcusfemale"  >
			<input type="radio" name="gender" value="Female" required> 
		</div>
		<div id="date_of_birth__ek2" >
			Date of Birth:
		</div>
		<div id="maddcusdobbox"  >
			<input type="date" id="dbirth" name="dbirth" required>
		</div>
		<div id="home_address__ek2" >
			Home Address:
		</div>
		<div id="maddcushomebox"  >
			<input type="text" id="homeadd" name="homeadd" required>
		</div>
		<div id="email_address__ek2" >
			Email Address:
		</div>
		<div id="maddcusemailbox"  >
			<input type="text" id="emailadd" name="emailadd" required>
		</div>
		<div id="phone_no___ek2" >
			Phone No.:
		</div>
		<div id="maddcusphonebox"  >
			<input type="text" id="phonenum" name="phonenum" required>
		</div>
		<div id="current_balance__ek1" >
			Deposit:
		</div>
		<div id="maddcuscurbalbox"  >
			<input type="number" id="currbal" name="currbal" required>
		</div>
		<div id="pin_no___ek1" >
			PIN No.:
		</div>
		<div id="maddcuspinbox"  >
			<input type="number" id="pinnum" name="pinnum" required>
		</div>

		<div id="maddcusbtn"  >
			<button type="submit" class="button" id="addsubmit" >Submit</button>
		</div>
	
	</div>
	</form>
</div>
</div>













<?php @include "footer.php"; ?>