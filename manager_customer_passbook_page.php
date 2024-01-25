<?php @include "header.php";
	include "connect.php";
	include "validate_manager.php";
	include "session_timeout.php";
	if(!isset($_SESSION)) {
		session_start();
	}
	
	if (isset($_GET["custID"])) {
        $_SESSION["custID"] = $_GET["custID"];
    }
	
	$queryDisplayCustID = "SELECT custID From Customer Where custID='".$_SESSION["custID"]."'";
	$sqlDisplayCustID = $conn->query($queryDisplayCustID);
	$rowDisplayCustID = $sqlDisplayCustID->fetch_assoc();
	$displayCustID = $rowDisplayCustID["custID"];
	$sqlPassbookDisplay = "SELECT * From passbook$displayCustID";

?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_manager_customer_info_page_ek1"  >
	<div id="_bg__manager_customer_info_page_ek2"  >

	<div id="nav_bar_ek6"  >
		<div id="mcusinfonavbar1"  ></div>
		<div id="wall_street_bank_ek6" >
			Wall Street Bank
		</div>
		<div id="logout_ek6" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek5"  >
		<div id="mcusinfonavbar2"  ></div>
		<div id="home_ek5" >
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
		</div>
		<div id="add_customer_ek1" >
			<a style="text-decoration:none" href='manager_add_customer_page.php'>Add Customer</a>
		</div>
		<div id="manage_customers_ek5" >
			<a style="text-decoration:none" href='manager_manage_customers_page.php'>Manage Customers</a>
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
            // output data of each row
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