<?php @include "header.php";
include "validate_admin.php";
include "connect.php";
include "session_timeout.php";

if(!isset($_SESSION)) {
        session_start();
}

$admin = $_SESSION['Admin'];

$fname = mysqli_real_escape_string($conn, $_POST["addmanagerfname"]);
$lname = mysqli_real_escape_string($conn, $_POST["addmanagerlname"]);
$managerId = mysqli_real_escape_string($conn, $_POST["addmanagerid"]);
$managerPass = mysqli_real_escape_string($conn, $_POST["addmanagerpass"]);
$email = mysqli_real_escape_string($conn, $_POST["addemailid"]);
$hashPassword = md5 ($managerPass);

$selectQuery = "SELECT * FROM Manager WHERE ManagerID = '$managerId'";
$result = $conn->query($selectQuery);

$selectQuery1 = "SELECT Email FROM Manager WHERE Email='$email'";
$result1 = $conn->query($selectQuery1);


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
		<div id="managerlist_ek3" >
			<a style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
		</div>
		<div id="add_manager_ek2" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		<div id="manage_customers_ek2" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>
		<div id="act_logs" >
			<a style="text-decoration:none" href='admin_activity_logs_page.php'>Activity Logs</a>
		</div>

	</div>
	<div id="transmoneyforM"  >
		<div id="ctransmoneycontainers"  ></div>
		<?php if(mysqli_num_rows($result) >= 1) { ?>
				<div id="sentinfo" >
						Manager ID already exist.
				</div>
		<?php } else {
			
				if(mysqli_num_rows($result1) >= 1) { ?>
					<div id="sentinfo" >
						Email already exist.
					</div>
		<?php 	} else { 
					$insertToManager = "INSERT INTO Manager VALUES(0,'$managerId','$fname','$lname','$email','$hashPassword')";
					$logQuery = "INSERT INTO AdminLogs VALUES('$admin','', 'Add Manager. Name: $fname $lname', NOW())";
					$conn->query($insertToManager);
					$conn->query($logQuery);
					$conn->close();
					$subject = "Manager Credentials";
					$message = "Here is your Username: $managerId Password: $managerPass";
					$sender = "From: wallstreetbank.99@gmail.com";		
					mail($email, $subject, $message, $sender); // send email from the customer...
						
		?>
					<div id="sentinfo" >
						Manager <?php echo "$fname $lname" ?> has been created.
					</div>
		<?php } } ?>
		
		
		
	</div>

</div>
</div>

<?php @include "footer.php"; ?>