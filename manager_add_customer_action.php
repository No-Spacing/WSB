<?php @include "header.php";
include "validate_manager.php"; // Validate the manager if he's logged in or not.
include "connect.php"; //Initiate Connection to Database...
include "session_timeout.php";

// Start Session
if(!isset($_SESSION)) {
    session_start();
}

$managerID = $_SESSION['Manager']; // Get Value from session named Manager

// Get The Inputs from manager_add_customer_page.php
$fname = mysqli_real_escape_string($conn, $_POST["addfname"]);
$lname = mysqli_real_escape_string($conn, $_POST["addlname"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$dob = mysqli_real_escape_string($conn, $_POST["dbirth"]);
$address = mysqli_real_escape_string($conn, $_POST["homeadd"]);
$email = mysqli_real_escape_string($conn, $_POST["emailadd"]);
$phno = mysqli_real_escape_string($conn, $_POST["phonenum"]);
$balance = mysqli_real_escape_string($conn, $_POST["currbal"]);
$acno = rand(1000000000,9999999999);
$pin = mysqli_real_escape_string($conn, $_POST["pinnum"]);
$hashPin = md5($pin);

$queryCheckEmail = "SELECT * FROM Customer WHERE Email='$email'";
$sqlCheckEmail = $conn->query($queryCheckEmail); // Fetch Email Column from Customer Table...

$insertToCustomer = "INSERT INTO Customer (FirstName,LastName,Gender,DoB,Address,Email,Phone,Balance,AccNo,Pin, UserName, Password) 
				values('$fname','$lname','$gender','$dob','$address','$email','$phno','$balance','$acno','$hashPin','','')";

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

	<div id="transmoneyform"  >
		<div id="ctransmoneycontainers"  ></div>
		<?php if(mysqli_num_rows($sqlCheckEmail) >= 1){ // Check if there's duplicate email... ?>
				<div id="sentinfo" >
					Email Already Exist.
				</div>
		<?php } else {	
				$conn->query($insertToCustomer); // Insert Information to Customer Table...
				
				
				//Fetch the Specific Column from Customer Table...
				$queryCountCustomer = "SELECT * FROM Customer ORDER BY custID DESC LIMIT 1";
				$resultCountCustomer = $conn->query($queryCountCustomer);
				$countCustomer = $resultCountCustomer->fetch_assoc(); 
				$count = $countCustomer['custID'];
				
				$createPassbook = "CREATE TABLE passbook".$count."(
						custID INT,
						AccNo VARCHAR(255),
						trans_date DATETIME,
						remarks VARCHAR(255),
						deposit DOUBLE,
						withdraw DOUBLE,
						balance DOUBLE
						)";
				$conn->query($createPassbook); // Create table name passbook table...
				
				$insertToPassbook = "INSERT INTO passbook".$count."(custID, AccNo, trans_date, remarks, deposit, withdraw, balance) VALUES($count,'$acno', NOW(), 'Cash-In', $balance, '', $balance)";
				$conn->query($insertToPassbook); // Insert details to passbook table...
				
				$queryLog = "INSERT INTO ManagerLogs VALUES('$managerID','$acno', 'Manager Add Customer. Name: $fname $lname', NOW())";
				$conn->query($queryLog); // Insert Log to ManagerLogs table...
				
				// Sending details on your email...
				$email = "$email";
				$subject = "Your Personal Bank Account";
				$message = "Your account number $acno has been created.\nYou may use this account number to create your account online for easier and better services.\nName:$fname $lname\nPIN:$pin\ncustomer_register_page.php ";
				$sender = "From: wallstreetbank.99@gmail.com";
				mail($email, $subject, $message, $sender);
		?>
				<div id="sentinfo" >
					Mr/Ms <?php echo $fname ." ". $lname; ?> bank account has been registered.					
				</div>
		<?php } $conn->close(); ?>
	</div>
</div>
</div>


<?php @include "footer.php"; ?>