<?php @include "header.php";
	include "validate_admin.php"; // checks if the admin is login
	include "connect.php"; // connects to the database...
	include "session_timeout.php"; // session timeout...
	
	// Avoid Multiple Session...
	if(!isset($_SESSION)) {
		session_start();
	}
	// Get the custID from the Session
	if (isset($_GET["custID"])) {
        $_SESSION["custID"] = $_GET["custID"];
    }
	
	$queryDisplayCustID = "SELECT * FROM Customer WHERE custID =".$_SESSION["custID"];
	$sqlDisplayCustID= $conn->query($queryDisplayCustID); 
	$rowDisplayCustID = $sqlDisplayCustID->fetch_assoc();
	$displayCustID = $rowDisplayCustID["custID"]; // Fetch the custID from the Customer Table...
	$sqlPassbookDisplay = "SELECT * From passbook$displayCustID";
	
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

	<div id="flex-container">
	<?php
            $result = $conn->query($sqlPassbookDisplay);
            if ($result->num_rows > 0) { //Display the passbook table... ?>
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
            // output data of each row
            while($row = $result->fetch_assoc()) { // display the passbook table... ?>
                    <tr>
						<td><?php echo $row["custID"]; ?></td>
						<td><?php echo $row["AccNo"]; ?></td>
                        <td>
                            <?php
                                $time = strtotime($row["trans_date"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);// Time Format... 
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