<?php @include "header.php";
	include "validate_admin.php"; // checks if admin is logged in...
	include "connect.php"; // connects to the database...
	include "session_timeout.php"; // login time expires...
	
	// Avoid Multiple Session...
	if(!isset($_SESSION)) {
		session_start();
	}
	
	// Get value from the session named custID...
	if (isset($_GET["custID"])) {
        $_SESSION["custID"] = $_GET["custID"];
    }
	
	$queryShowCustomer = "SELECT * FROM Customer WHERE custID = ".$_SESSION["custID"];
	$resultShowCustomer = $conn->query($queryShowCustomer);
	$row = $resultShowCustomer->fetch_assoc(); //fetch a specific colums from customer table...
	$gender = $row["Gender"];
	
	
 ?>


		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_admin_edit_customer_info_page_ek1"  >
	<div id="_bg__admin_edit_customer_info_page_ek2"  >

	<div id="nav_bar"  >
		<div id="aeditcusnavbar1"  ></div>
		<div id="wall_street_bank" >
			Wall Street Bank
		</div>
		<div id="logout" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar"  >
		<div id="aeditcusnavbar2"  ></div>
		<div id="home" >
			<a style="text-decoration:none" href='admin_home_page.php'>Home</a>
		</div>
		<div id="managerlist_ek3" >
			<a style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
		</div>

		<div id="add_manager" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		<div id="manage_customers" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>
		<div id="act_logs" >
			<a style="text-decoration:none" href='admin_activity_logs_page.php'>Activity Logs</a>
		</div>

	</div>

	<div id="form1"  >
	<form class="form" action="admin_edit_customer_info_action.php" method="post">
		<div id="aeditcuscontainer"  ></div>
		<div id="first_name_" >
			First Name: 
		</div>
		<div id="aeditcusfname"  >
			<input type="text" id="admineditfname" name="admineditfname" value= "<?php echo $row["FirstName"]; ?>">
		</div>
		<div id="last_name_" >
			Last Name:
		</div>
		<div id="aeditcuslname"  >
			<input type="text" id="admineditlname" name="admineditlname" value= "<?php echo $row["LastName"]; ?>">
		</div>
		<div id="gender_" >
			Gender:
		</div>
		<div id="male" >
			Male
		</div>
		<div id="aeditcusmale"  >
			<input type="radio" name="gender" value="Male" <?php echo ($gender== 'Male') ?  "checked" : "" ; ?> > 
		</div>
		<div id="other" >
			Other
		</div>
		<div id="aeditcusother"  >
			<input type="radio" name="gender" value="Others" <?php echo ($gender== 'Others') ?  "checked" : "" ; ?> > 
		</div>
		<div id="female" >
			Female
		</div>
		<div id="aeditcusfemale"  >
			<input type="radio" name="gender" value="Female" <?php echo ($gender== 'Female') ?  "checked" : "" ; ?> > 
		</div>
		<div id="date_of_birth_" >
			Date of Birth:
		</div>
		<div id="aeditcusdobbox"  >
			<input type="date" id="admineditdbirth" name="admineditdbirth" value= "<?php echo $row["DoB"]; ?>" >
		</div>
		<div id="home_address_" >
			Home Address:
		</div>
		<div id="aeditcushomebox"  >
			<input type="text" id="adminedithomeadd" name="adminedithomeadd" value= "<?php echo $row["Address"]; ?>" >
		</div>
		<div id="email_address_" >
			Email Address:
		</div>
		<div id="aeditcusemailbox"  >
			<!--<input type="text" id="admineditemailadd" name="admineditemailadd" value= "" >-->
			<?php echo $row["Email"]; ?>
		</div>
		<div id="phone_no__" >
			Phone No.:
		</div>
		<div id="aeditcusphonenobox"  >
			<input type="number" id="admineditphonenum" name="admineditphonenum" value= "<?php echo $row["Phone"]; ?>" >
		</div>
		<div id="current_balance_" >
			Current Balance:
		</div>
		<div id="aeditcuscurbalbox"  >
			<input type="number" id="admineditcurrbal" name="admineditcurrbal" value= "<?php echo $row["Balance"]; ?>" >
		</div>
		<div id="account_no__" >
			Account No.:
		</div>
		<div id="aeditcusaccnobox"  >
			<?php echo $row["AccNo"]; ?>
		</div>
		<div id="pin_no__" >
			PIN No.:
		</div>
		<div id="aeditcuspinbox"  >
			<input type="number" id="admineditpinnum" name="admineditpinnum" required>
		</div>
		<div id="user_i_d__" >
			Username:
		</div>
		<div id="aeditcususeridbox"  >
			<input type="text" id="adminedituserid" name="adminedituserid" value= "<?php echo $row["UserName"]; ?>" >
		</div>
		<div id="aeditcusbtn"  >
			<button class="button" id="admineditsubmit" type="submit">Submit</button>
		</div>
	</form>
	</div>

	<div id="edit_email"  >
	<form class="form" action="admin_edit_email_action.php" method="post">
		<div id="emailcontainer"  ></div>
		<div id="email_00" >
			Email Add:
		</div>
		<div id="email_01"  >
			<input type="text" id="email_01" name="email_01" required>
		</div>
		<div id="email_02"  >
			<button type="submit" class="emailbtn" id="emailsubmit" >Submit</button>
		</div>
		
	</form>
	</div>

</div>
</div>


<?php @include "footer.php"; ?>