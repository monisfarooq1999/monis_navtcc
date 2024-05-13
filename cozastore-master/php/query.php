<?php
include("config.php");
session_start();
// session_unset();
//user  Add User
if(isset($_POST['userregister'])){
    $userfirstname = $_POST['userfirstname'];
    $userlastname = $_POST['userlastname'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphone'];
    $userpassword = $_POST['userpass'];
    $userrole = "customer";
    $query = $pdocon->prepare("INSERT INTO `user`(`firstname`, `lastname`, `useremail`, `userphone`, `userpass`,userrole) VALUES (:ufname,:ulname,:uemail,:uphone,:upass,:urole)");
    $query->bindParam("ufname",$userfirstname);
    $query->bindParam("ulname",$userlastname);
    $query->bindParam("uemail",$useremail);
    $query->bindParam("uphone",$userphone);
    $query->bindParam("upass",$userpassword);
    $query->bindParam("urole",$userrole);
    $query->execute();
    echo "<script>alert('User Registration Successful Added');
    location.assign(login.php)</script>";
    }
    
if(isset($_POST['userlogin'])){
    $useremail = $_POST['custemail'];
    $userpassword = $_POST['custpassword'];
    $query = $pdocon->prepare("SELECT * FROM user WHERE useremail=:ue && userpass=:up");
    $query->bindParam("ue",$useremail);
    $query->bindParam("up",$userpassword);
    $query->execute();
    $userData = $query->FETCH(PDO::FETCH_ASSOC);
    if($userData){
        $_SESSION['sessid'] = $userData['userid'];
        $_SESSION['sessfname'] = $userData['firstname'];
        $_SESSION['sesslname'] = $userData['lastname'];
        $_SESSION['sessemail'] = $userData['useremail'];
        $_SESSION['sessphone'] = $userData['userphone'];
        $_SESSION['sessrole'] = $userData['userrole'];
        $_SESSION['sesspass'] = $userData['userpass'];
        if($_SESSION['sessrole'] == "user" || $_SESSION['sessrole'] == "customer" ){
            echo "<script>alert('User Login Successful');
            location.assign('my-account.php');
            </script>";
        }
        elseif($_SESSION['sessrole'] == "admin" ){
            echo "<script>alert('Admin Login Successful');
            location.assign('../dashboard/')</script>";
        }
    }
}
?>