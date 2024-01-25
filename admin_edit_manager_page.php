<?php @include "header.php";
	include "validate_admin.php"; // check if admin is logged in...
	include "session_timeout.php"; // Session timeout...
	include "connect.php";
	
	if(!isset($_SESSION)) {
		session_start();
	}
	
	if (isset($_GET["ID"])) {
        $_SESSION["ID"] = $_GET["ID"];
    }
	
	$querySelect = "SELECT * FROM Manager WHERE ID=".$_SESSION["ID"];
	$result = $conn->query($querySelect);
	$row = $result->fetch_assoc();
	
 ?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_admin_add_manager_page_ek1"  >
	<div id="_bg__admin_add_manager_page_ek2"  >

	<div id="nav_bar_ek2"  >
		<div id="aaddmanagernavbar1"  ></div>
		<div id="wall_street_bank_ek2" >
			Wall Street Bank
		</div>
		<div id="logout_ek2" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek2"  >
		<div id="aaddmanagernavbar2"  ></div>
		<div id="home_ek2" >
			<a style="text-decoration:none" href='admin_home_page.php'>Home</a>
		</div>
		<div id="managerlist_ek32" >
			<a  style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
		</div>

		<div id="add_manager_ek23" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		<div id="manage_customers_ek2" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>
		<div id="act_logs" >
			<a style="text-decoration:none" href='admin_activity_logs_page.php'>Activity Logs</a>
		</div>

	</div>
	
	<div id="form_ek1"  >
		<form class="addManagerForm" action="admin_edit_manager_done_page.php" method="post">
		<div id="aaddmanagercontainer"  ></div>
		<div id="first_name__ek1" >
			First Name:
		</div>
		<div id="aaddmanagerfnamebox"  >
			<input type="text" id="addmanagerfname" name="addmanagerfname" value="<?=$row["Firstname"]; ?>" required >
		</div>
		<div id="last_name__ek1" >
			Last Name:
		</div>
		<div id="aaddmanagerlnamebox"  >
			<input type="text" id="addmanagerlname" name="addmanagerlname" value="<?=$row["LastName"]; ?>" required>
		</div>
		<div id="manager_id_" >
			Manager ID:
		</div>
		<div id="aaddmanageridbox"  >
			<input type="text" id="addmanagerid" name="addmanagerid" value="<?=$row["ManagerID"]; ?>" required>
		</div>
		<div id="password__ek1" >
			Password:
		</div>
		<div id="aaddmanagerpassbox"  >
			<input type="password" id="addmanagerpass" name="addmanagerpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
			title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		</div>
		<div id="confirm_password_" >
			Confirm Password:
		</div>

		<div id="aaddmanagerconpassbox"  >
			<input type="password" id="addmanagerconpass" name="addmanagerconpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
			title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		</div>
		<div id="email_id" >
			Email Address:
		</div>
		<div id="email_idbox1"  >
			<input type="text" id="addemailid" name="addemailid" value="<?=$row["Email"]; ?>" required>
		</div>
		<div id="aaddmanagerbtn">
			<button class="button" id="btnSumbit" type="submit">Submit</button>
		</div>
		<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
		<script type="text/javascript">
			$(function () {
				$("#btnSumbit").click(function () {
					var password = $("#addmanagerpass").val();					
					var confirmPassword = $("#addmanagerconpass").val();
					if (password != confirmPassword) { // check if the password is matched...
						alert("Passwords do not match.");
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