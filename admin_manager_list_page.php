<?php @include "header.php";
	include "validate_admin.php"; // check if admin is logged in...
	include "session_timeout.php"; // Session timeout...
	include "connect.php"; // connects to the database...
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
			<a  href='admin_manager_list_page.php'>Manager List</a>
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
	
	<div id="flex-container">
 		<?php
			$queryCustomerDisplay = "SELECT * FROM Manager";
            $result = $conn->query($queryCustomerDisplay);
            if ($result->num_rows > 0) { // display the customer table...?>
                <table id="transactions">
                    <tr>
						<th>Manager ID.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
						<th>Email.</th>
						<th>Option</th>
                    </tr>
			  <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {// display the customer table... ?>
                    <tr>
						<td><?php echo $row["ManagerID"]; ?></td>
                        <td><?php echo $row["Firstname"]; ?></td>
						<td><?php echo $row["LastName"]; ?></td>
						<td><?php echo $row["Email"]; ?></td>
						<td><a href="admin_edit_manager_page.php?ID=<?php echo $row["ID"] ?>">Edit Profile</a></td>
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