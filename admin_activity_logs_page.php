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
		<div id="home11" >
			<a style="text-decoration:none" href='admin_home_page.php'>Home</a>
		</div>
        <div id="managerlist_ek3" >
            <a style="text-decoration:none" href='admin_manager_list_page.php'>Manager List</a>
        </div>
		<div id="add_manager11" >
			<a style="text-decoration:none" href='admin_add_manager_page.php'>Add Manager</a>
		</div>
		<div id="manage_customers11" >
			<a style="text-decoration:none" href='admin_manage_customers_page.php'>Manage Customers</a>
		</div>
		<div id="act_log11" >
			<a  href='admin_activity_logs_page.php'>Activity Logs</a>
		</div>

	</div>
    <div id = "admin1">ADMIN LOGS</div>
	<div id ="admin">
	<?php
			$queryAdminLogs = "SELECT * FROM adminLogs";
            $resultAdminLogs = $conn->query($queryAdminLogs);
            if ($resultAdminLogs->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
						<th>Admin ID.</th>
                        <th>Account No.</th>
                        <th>Description</th>
                        <th>Date/Time</th>
                    </tr>
			  <?php
            // output data of each columns
            while($rowAdminLogs = $resultAdminLogs->fetch_assoc()) {?>
                    <tr>
						<td><?php echo $rowAdminLogs["AdminID"]; ?></td>
						<td><?php echo $rowAdminLogs["AccNo"]; ?></td>
						<td><?php echo $rowAdminLogs["Description"]; ?></td>
                        <td>
                            <?php
                                $time = strtotime($rowAdminLogs["Date"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                             ?>
                        </td>
                    </tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> No results found :(</p>
            <?php } ?>		
	</div>

    <div id = "manager1">MANAGER LOGS</div>
    <div id ="manager">
    <?php
			$queryAdminLogs = "SELECT * FROM managerLogs";
            $resultAdminLogs = $conn->query($queryAdminLogs);
            if ($resultAdminLogs->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
						<th>Manager ID.</th>
                        <th>Account No.</th>
                        <th>Description</th>
                        <th>Date/Time</th>
                    </tr>
			  <?php
            // output data of each columns
            while($rowAdminLogs = $resultAdminLogs->fetch_assoc()) {?>
                    <tr>
						<td><?php echo $rowAdminLogs["ManagerID"]; ?></td>
						<td><?php echo $rowAdminLogs["AccNo"]; ?></td>
						<td><?php echo $rowAdminLogs["Description"]; ?></td>
                        <td>
                            <?php
                                $time = strtotime($rowAdminLogs["Date"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                             ?>
                        </td>
                    </tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> No results found :(</p>
            <?php } ?>	
    </div>
    
    <div id = "customer1">CUSTOMER LOGS</div>
    <div id ="customer">
    <?php
			$queryAdminLogs = "SELECT * FROM customerLogs";
            $resultAdminLogs = $conn->query($queryAdminLogs);
            if ($resultAdminLogs->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
                        <th>Account No.</th>
                        <th>Description</th>
                        <th>Date/Time</th>
                    </tr>
			  <?php
            // output data of each columns
            while($rowAdminLogs = $resultAdminLogs->fetch_assoc()) {?>
                    <tr>
						<td><?php echo $rowAdminLogs["AccNo"]; ?></td>
						<td><?php echo $rowAdminLogs["Description"]; ?></td>
                        <td>
                            <?php
                                $time = strtotime($rowAdminLogs["Date"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                             ?>
                        </td>
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