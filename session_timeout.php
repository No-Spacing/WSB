<?php
    if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        header("location:logout_action.php?sessionExpired=true");
        exit();
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
	
?>
