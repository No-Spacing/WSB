<?php
include "connect.php"; // connects to the database...
include "validate_admin.php"; // checks if admin is login...
include "session_timeout.php"; // login time expires...


// Avoid Multiple Session
if(!isset($_SESSION)) {
		session_start();
}

// Gets the CustID from the Session...	
if (isset($_GET["custID"])) {
        $_SESSION["custID"] = $_GET["custID"];
}

$admin = $_SESSION['Admin'];

// Get the inputs from admin_edit_customer_info_page.php...
$fname = mysqli_real_escape_string($conn, $_POST["admineditfname"]);
$lname = mysqli_real_escape_string($conn, $_POST["admineditlname"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$dob = mysqli_real_escape_string($conn, $_POST["admineditdbirth"]);
$address = mysqli_real_escape_string($conn, $_POST["adminedithomeadd"]);
$phno = mysqli_real_escape_string($conn, $_POST["admineditphonenum"]);
$balance = mysqli_real_escape_string($conn, $_POST["admineditcurrbal"]);
$pin = mysqli_real_escape_string($conn, $_POST["admineditpinnum"]);
$username = mysqli_real_escape_string($conn, $_POST["adminedituserid"]);
$hashPin = md5($pin);

$queryUpdateCustomer = "UPDATE Customer SET
						FirstName = '$fname',
						LastName = '$lname',
						Gender = '$gender',
						DoB = '$dob',
						Address = '$address',					
						Phone = '$phno',
						PIN = '$hashPin',
						UserName = '$username'
						WHERE custID = ".$_SESSION["custID"];
					
$querySelect = "SELECT * FROM Customer WHERE CustID = ".$_SESSION["custID"];
$result = $conn->query($querySelect);
$row = $result->fetch_assoc();
$accNo = $row['AccNo'];

$logQuery = "INSERT INTO adminLogs VALUES('$admin', '$accNo', 'Edit Customer Info.', NOW())"; 
					
?>


<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_admin_edit_customer_info_page_ek1"  >
	<div id="_bg__admin_edit_customer_info_page_ek2"  ></div>

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
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
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

	</div>

	<div id="transmoneyform"  >
		<div id="ctransmoneycontainers"  ></div>	
			<div id="sentinfo" >
				Mr/Ms <?php echo $fname. " " .$lname ?> bank account has been updated.	
				<?php 
					$conn->query($queryUpdateCustomer); //checks if the Customer Table is Updated...
					$conn->query($logQuery); // Insert Logs to AdminLogs table...	
				?>
			</div>	
		
	</div>

</div>
<?php @include "footer.php"; ?>

