<?php @include "header.php"; ?>

<?php

include "connect.php";

$acno = mysqli_real_escape_string($conn, $_POST["craccno"]);
$cus_uname = mysqli_real_escape_string($conn, $_POST["cruserid"]);
$cus_pwd = mysqli_real_escape_string($conn, $_POST["crpass"]);

/*
$sql0 = "SELECT * FROM customer WHERE AccNo = '$acno'";
$result = $conn->query($sql0);
$row = $result->fetch_assoc();
$id = $row["custID"];
*/



$hashPassword = md5($cus_pwd);

$sqlUpdate = "UPDATE Customer SET UserName = '$cus_uname', Password = '$hashPassword' WHERE AccNo = '$acno'";

$sqlUserID = "SELECT UserName FROM Customer WHERE UserName = '$cus_uname';";
$sqlAccNo = "SELECT AccNo FROM Customer WHERE AccNo = '$acno';";

$sqlAccNo1 = "SELECT Username FROM Customer WHERE AccNo = '$acno'";
$resultAccNo1 = $conn->query($sqlAccNo1);
$rowAccNo1 = $resultAccNo1->fetch_assoc();

$resultUserID = $conn->query($sqlUserID);
$resultAccNo = $conn->query($sqlAccNo);
	

?>




<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer__registered_page_ek1"  >
	<div id="_bg__customer__registered_page_ek2"  >

	<div id="nav_bar_ek12"  >
		<div id="cregednavbar1"  ></div>
		<div id="wsb_ek1" >
			<a style="text-decoration:none" href='main_page.php' >WSB</a>
		</div>
	
		<a href='customer_login_page.php' ><img src="skins/loginbtn_ek1.png" id="loginbtn_ek1" /></a>
	</div>

	<div id="login_form_ek3"  >
	<?php 
		if(mysqli_num_rows($resultAccNo) > 0){
			if($rowAccNo1['Username'] ===''){ 
				if(mysqli_num_rows($resultUserID) > 0){ ?>
					<div id="cregedcontainer"  ></div>		
					<div id="your_online_banking_account_has_been_registered_" >
						 User ID already taken.
					</div>
		<?php	} else { $conn->query($sqlUpdate); ?>
					<div id="cregedcontainer"  ></div>		
					<div id="your_online_banking_account_has_been_registered_" >
						Your Online Banking account has been registered.					
					</div>
			<?php } } else { ?>
						<div id="cregedcontainer"  ></div>		
						<div id="your_online_banking_account_has_been_registered_" >
							Account Already Registered.
						</div>
	<?php 			} 
		} else { ?>
			<div id="cregedcontainer"  ></div>		
					<div id="your_online_banking_account_has_been_registered_" >
						Account Number does NOT Exist.
					</div>	
		<?php } ?>
	</div>
</div>
</div>




<?php @include "footer.php"; ?>