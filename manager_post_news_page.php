<?php @include "header.php"; 
	include "validate_manager.php";
?>
		<link rel="StyleSheet" href="admin_edit_customer_info_page.css" />

<div id="page_manager_post_news_page_ek1"  >
	<div id="_bg__manager_post_news_page_ek2"  >

	<div id="nav_bar_ek5"  >
		<div id="mpostnewsnavbar1"  ></div>
		<div id="wall_street_bank_ek5" >
			Wall Street Bank
		</div>
		<div id="logout_ek5" >
			<a style="text-decoration:none" href='logout_action.php' onclick="return confirm('Are you sure?')" >LOGOUT</a>
		</div>

	</div>

	<div id="client_nav_bar_ek4"  >
		<div id="mpostnewsnavbar2"  ></div>
		<div id="home_ek4" >
			<a style="text-decoration:none" href='manager_home_page.php'>Home</a>
		</div>
		<div id="add_customer" >
			<a style="text-decoration:none" href='manager_add_customer_page.php'>Add Customer</a>
		</div>
		<div id="manage_customers_ek4" >
			<a style="text-decoration:none" href='manager_manage_customers_page.php'>Manage Customers</a>
		</div>


	</div>

	<div id="postform"  >
		<div id="rectangle_2"  ></div>
		<div id="news_headline_" >
			News Headline:
		</div>
		<div id="mpostnewsheadlinebox"  >
			<input type="text" id="mpostnews" name="mpostnews">
		</div>
		<div id="details_" >
			Details:
		</div>
		<div id="mpostnewsdetailsbox"  >
			<textarea id="mnewdetails"></textarea>
		</div>
		<div id="mpostnewssubmitbtn"  >
			<a href="#" class="button" id="mpostbtn">Submit</a>
		</div>
	

	</div>

	<div id="deleteform"  >
		<div id="rectangle_2_ek1"  ></div>
		<div id="enter_the_news_headline_you_want_to_delete_" >
			Enter The News Headline You Want To Delete:
		</div>
		<div id="mpostnewsdeletebox"  >
			<input type="text" id="mdeletenews" name="mdeletenews">
		</div>
		<div id="mpostnewsdeletebtn"  >
			<a href="#" class="button" id="mdeletebtn">Submit</a>
		</div>

	</div>
</div>
</div>
















<?php @include "footer.php"; ?>