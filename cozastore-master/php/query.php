<?php
include("config.php");
//user  Add User
if(isset($_POST['userregister'])){
    $userfirstname = $_POST['userfirstname'];
    $userlastname = $_POST['userlastname'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphone'];
    $userpassword = $_POST['userpass'];
    $query = $pdocon->prepare("INSERT INTO `user`(`firstname`, `lastname`, `useremail`, `userphone`, `userpass`) VALUES (:ufname,:ulname,:uemail,:uphone,:upass)");
    $query->bindParam("ufname",$userfirstname);
    $query->bindParam("ulname",$userlastname);
    $query->bindParam("uemail",$useremail);
    $query->bindParam("uphone",$userphone);
    $query->bindParam("upass",$userpassword);
    $query->execute();
    echo "<script>alert('User Registration Successful Added')
    location.assign(login.php)</script>";
    }
    

?>