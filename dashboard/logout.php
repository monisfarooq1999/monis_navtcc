<?php
	session_start();
    session_unset();
    echo "<script>
    alert('Admin Logout');
    location.assign('../cozastore-master/account-login.php')</script>";
?>