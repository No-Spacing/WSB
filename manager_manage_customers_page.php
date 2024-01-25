<?php @include "header.php"; 
	include "validate_manager.php";
	include "connect.php";
	include "session_timeout.php";
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_manager_manage_customers_page_ek1"  >
	<div id="_bg__manager_manage_customers_page_ek2"  >

	<div id="nav_bar_ek7"  >
		<div id="mmanagecusnavbar1"  ></div>
		<div id="wall_street_bank_ek7" >
			Wall Street Bank
		</div>
		<div id="logout_ek7" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek6"  >
		<div id="mmanagecusnavbar2"  ></div>
		<div id="home_ek6" >
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
		</div>
		<div id="add_customer_ek2" >
			<a style="text-decoration:none" href='manager_add_customer_page.php'>Add Customer</a>
		</div>
		<div id="manage_customers_ek6" >
			<a style="text-decoration:none" href='manager_manage_customers_page.php'>Manage Customers</a>
		</div>


	</div>




			<!-------------------------------------To Be Fixed-------------------------------------------->
	
	<div id="flex-container">
 		<?php
			$queryCustomerDisplay = "SELECT * FROM Customer";
            $result = $conn->query($queryCustomerDisplay);
            if ($result->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
						<th>Customer ID.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
						<th>Account No.</th>
						<th>Options</th>
                    </tr>
			  <?php
            // output data of each row
            while($row = $result->fetch_assoc()) {?>
                    <tr>
						<td><?php echo $row["custID"]; ?></td>
                        <td><?php echo $row["FirstName"]; ?></td>
						<td><?php echo $row["LastName"]; ?></td>
						<td><?php echo $row["AccNo"]; ?></td>
						<td><a href="manager_customer_info_page.php?custID=<?php echo $row["custID"] ?>">View/Deposit</a> <br> 
						<a href="manager_customer_passbook_page.php?custID=<?php echo $row["custID"] ?>">Passbook</a></td>
						
					</tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            $conn->close(); ?>
    </div>

			<!----------------------------------------Ends Here--------------------------------------------->

</div>
</div>




<?php @include "footer.php"; ?>