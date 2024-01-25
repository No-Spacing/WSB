<?php @include "header.php";
	include "validate_admin.php";
	include "session_timeout.php";
	include "connect.php";
	
	$fname = mysqli_real_escape_string($conn, $_POST["addmanagerfname"]);
	$lname = mysqli_real_escape_string($conn, $_POST["addmanagerlname"]);
	$managerId = mysqli_real_escape_string($conn, $_POST["addmanagerid"]);
	$managerPass = mysqli_real_escape_string($conn, $_POST["addmanagerpass"]);
	$email = mysqli_real_escape_string($conn, $_POST["addemailid"]);
	$hashPassword = md5 ($managerPass);
	
	if(!isset($_SESSION)) {
		session_start();
	}
	
	$idManager = $_SESSION["ID"];
	
	$querySelect = "SELECT * FROM Manager WHERE ID <> '$idManager'";
	$result = $conn->query($querySelect);
	$row = $result->fetch_assoc();
	//$id = $row['ManagerID'];
	//$emailCheck = $row["Email"];
	

		
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
		<?php if($managerId === $row['ManagerID']){ ?>
				<div id="sentinfo" >
						Manager ID already exist.
				</div>
		<?php } else if ($email === $row["Email"]) { ?>
				<div id="sentinfo" >
						Email already exist.
				</div>
		<?php } else { 
				$queryUpdate = "UPDATE Manager SET ID = '$idManager', 
				Firstname = '$fname',
				LastName = '$lname',
				ManagerID = '$managerId',
				Password = '$hashPassword',
				Email = '$email'
				WHERE ID = '$idManager'";
				$conn->query($queryUpdate);
				$queryLogs = "INSERT INTO adminLogs VALUES('admin','','Admin Edit Manager',NOW())";
				$conn->query($queryLogs);

		?>
				<div id="sentinfo" >
						Success.
				</div>
		<?php } ?>
		
	</div>

</div>
</div>

<?php @include "footer.php"; ?>
		