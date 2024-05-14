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


//user  update User
if(isset($_POST['updatedetails'])){
    $userid = $_POST['userid'];
    $userfirstname = $_POST['firstname'];
    $userlastname = $_POST['lastname'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphone'];
    $query = $pdocon->prepare("UPDATE user SET firstname = :ufname, lastname = :ulname,  userphone = :uphone, useremail = :uemail WHERE userid = :uid");
    $query->bindParam("uid",$userid);
    $query->bindParam("ufname",$userfirstname);
    $query->bindParam("ulname",$userlastname);
    $query->bindParam("uemail",$useremail);
    $query->bindParam("uphone",$userphone);
    $query->execute();
    // Update session data if the update was successful
    if ($query->rowCount() > 0) {
        $_SESSION['firstname'] = $userfirstname;
        $_SESSION['lastname'] = $userlastname;
        $_SESSION['useremail'] = $useremail;
        $_SESSION['userphone'] = $userphone;
        echo "<script>alert('User Update Successful');
        location.assign('my-account.php')</script>";
    } else {
        echo "<script>alert('User Update Failed');
        location.assign('my-account.php')</script>";
    }
}

// user logins
    
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
        elseif($_SESSION['sessrole'] == "admin" || $_SESSION['sessrole'] == "superadmin" || $_SESSION['sessrole'] == "shop_manager" || $_SESSION['sessrole'] == "sales_person" ){
            echo "<script>alert('Admin Login Successful');
            location.assign('../dashboard/')</script>";
        }
    }
}
?>