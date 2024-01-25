<?php @include "header.php"; 
	include "validate_admin.php"; // checks if admin is logged in...
	include "connect.php"; // connects to database...
	include "session_timeout.php"; // login time expires...
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_admin_manage_customers_page_ek1"  >
	<div id="_bg__admin_manage_customers_page_ek2"  >

	<div id="nav_bar_ek1"  >
		<div id="amanagecusnavbar1"  ></div>
		<div id="wall_street_bank_ek1" >
			Wall Street Bank
		</div>
		<div id="logout_ek1" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek1"  >
		<div id="amanagecusnavbar2"  ></div>
		<div id="home_ek1" >
			<a style="text-decoration:none" href='admin_home_page.php'>Home</a>
		</div>
		<div id="managerlist_ek3" >
			<a style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
		</div>

		<div id="add_manager_ek1" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		<div id="manage_customers_ek1" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>
		<div id="act_logs" >
			<a style="text-decoration:none" href='admin_activity_logs_page.php'>Activity Logs</a>
		</div>

	</div>

	
	<div id="flex-container">
 		<?php
			$queryCustomerDisplay = "SELECT * FROM Customer";
            $result = $conn->query($queryCustomerDisplay);
            if ($result->num_rows > 0) { // display the customer table...?>
                <table id="transactions">
                    <tr>
						<th>Customer ID.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
						<th>Account No.</th>
						<th>Option</th>
                    </tr>
			  <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {// display the customer table... ?>
                    <tr>
						<td><?php echo $row["custID"]; ?></td>
                        <td><?php echo $row["FirstName"]; ?></td>
						<td><?php echo $row["LastName"]; ?></td>
						<td><?php echo $row["AccNo"]; ?></td>
						<td><a href="admin_edit_customer_info_page.php?custID=<?php echo $row["custID"] ?>">Edit Profile</a> <br> 
						<a href="admin_customer_transactions_page.php?custID=<?php echo $row["custID"] ?>">Transactions</a></td>
					</tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            $conn->close(); // database connection is close... ?>
    </div>

</div>
</div>

<?php @include "footer.php"; ?>