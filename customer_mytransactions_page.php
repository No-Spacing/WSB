<?php @include "header.php"; 
	include "validate_customer.php";
	include "session_timeout.php";; //checks if the customer is logged in...
	include "connect.php"; // connects to the database...
	
	
	if(!isset($_SESSION)){ // avoid multiple session warning...
		session_start();
	}
	
	
	$username = $_SESSION['Username'];
	$queryDisplayCustID = "SELECT custID FROM Customer Where UserName='$username'";
	$sqlDisplayCustID = $conn->query($queryDisplayCustID);
	$rowDisplayCustID = $sqlDisplayCustID->fetch_assoc();
	$displayCustID = $rowDisplayCustID["custID"];
	$sqlPassbookDisplay = "SELECT * FROM passbook$displayCustID";
	
	
?>

<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />
<div id="page_customer_mytransactions_page_ek1"  >
	<div id="_bg__customer_mytransactions_page_ek2"  >

	<div id="nav_bar_ek20"  >
		<div id="cmytransnavbar1"  ></div>
		<div id="wsb_ek9" >
			<a style="text-decoration:none" href='customer_home_page.php' >WSB</a>
		</div>
	
		<div id="logout_ek15" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek14"  >
		<div id="cmytransnavbar2"  ></div>
		<div id="home_ek14" >
			<a style="text-decoration:none" href='customer_home_page.php'>Home</a>
		</div>
		<div id="my_account_ek5" >
			<a style="text-decoration:none" href='customer_myaccount_page.php'>My Account</a>
		</div>
		<div id="my_transactions_ek5" >
			<a style="text-decoration:none" href='customer_mytransactions_page.php'>My Transactions</a>
		</div>
		<div id="transfer_money_ek5" >
			<a style="text-decoration:none" href='customer_transfermoney_page.php'>Transfer Money</a>
		</div>
		<div id="pay_bills_ek5" >
			<a style="text-decoration:none" href='customer_paybills_page.php'>Pay Bills</a>
		</div>
		<div id="account_maintenance_ek5" >
			<a style="text-decoration:none" href='customer_accountmaintenance_page.php'>Account Maintenance</a>
		</div>
	</div>
	
	<div id="flex-container">
 		<?php
            $result = $conn->query($sqlPassbookDisplay);
            if ($result->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
						<th>Customer ID.</th>
                        <th>AccNo</th>
                        <th>Transaction Date</th>
                        <th>Remarks</th>
                        <th>Deposit</th>
                        <th>Withdraw</th>
						<th>Balance</th>
                    </tr>
			  <?php
            // output data of each columns
            while($row = $result->fetch_assoc()) {?>
                    <tr>
						<td><?php echo $row["custID"]; ?></td>
						<td><?php echo $row["AccNo"]; ?></td>
                        <td>
                            <?php
                                $time = strtotime($row["trans_date"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                             ?>
                        </td>
                        <td><?php echo $row["remarks"]; ?></td>
                        <td><?php echo number_format($row["deposit"]); ?></td>
                        <td><?php echo number_format($row["withdraw"]); ?></td>
                        <td><?php echo number_format($row["balance"]); ?></td>
                    </tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            $conn->close(); ?>
    </div>
	</div>
</div>
   
   
   
    



<?php @include "footer.php"; ?>