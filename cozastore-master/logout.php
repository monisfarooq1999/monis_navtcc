<?php
	session_start();
    unset($_SESSION['sessemail']);
    echo "<script>
    alert('User Logout');
    location.assign('account-login.php')</script>";
?>