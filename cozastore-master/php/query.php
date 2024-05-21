<?php
include("config.php");
session_start();
// session_unset();

$catimgref = "../dashboard/img/category/";
$prodimgref = "../dashboard/img/product/";
//user  Add User
if(isset($_POST['userregister'])){
    $userfirstname = $_POST['userfirstname'];
    $userlastname = $_POST['userlastname'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphone'];
    $userpassword = $_POST['userpass'];
    $userrole = "customer";
    
    $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);
    $query = $pdocon->prepare("INSERT INTO `user`(`firstname`, `lastname`, `useremail`, `userphone`, `userpass`,userrole) VALUES (:ufname,:ulname,:uemail,:uphone,:upass,:urole)");
    $query->bindParam("ufname",$userfirstname);
    $query->bindParam("ulname",$userlastname);
    $query->bindParam("uemail",$useremail);
    $query->bindParam("uphone",$userphone);
    $query->bindParam("upass", $hashedPassword , PDO::PARAM_STR);
    $query->bindParam("urole",$userrole);
    $query->execute();
    echo "<script>alert('User Registration Successful Added');
    location.assign(account-login.php)</script>";
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
    // if ($query->rowCount() > 0) {
    //     $_SESSION['firstname'] = $userfirstname;
    //     $_SESSION['lastname'] = $userlastname;
    //     $_SESSION['useremail'] = $useremail;
    //     $_SESSION['userphone'] = $userphone;
    //     echo "<script>alert('User Update Successful');
    //     location.assign('my-account.php')</script>";
    // } else {
    //     echo "<script>alert('User Update Failed');
    //     location.assign('my-account.php')</script>";
    // }
}

// user logins
    
if(isset($_POST['userlogin'])){
    $useremail = $_POST['custemail'];
    $userpassword = $_POST['custpassword'];
    $query = $pdocon->prepare("SELECT * FROM user WHERE useremail=:ue");
    $query->bindParam("ue",$useremail);
    $query->execute();
    $userData = $query->FETCH(PDO::FETCH_ASSOC);
    if($userData){
        // Verify the provided password against the hashed password stored in the database
        if(password_verify($userpassword, $userData['userpass'])){
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
        }else{
            echo "<script>alert('Incorrect password');</script>";
        }
        
    }else{
        echo "<script>alert('User Not Found');</script>";
    }
}


//user  update User Password
if(isset($_POST['updatePassword'])){
    $oldPass = $_POST['oldPass'];
    $newuserpass = $_POST['newPass'];
    $retypenewpass = $_POST['matchnewPass'];
    if($retypenewpass == $newuserpass){
        $hashedPassword = password_hash($newuserpass, PASSWORD_DEFAULT);
        $querycheck = $pdocon->prepare("SELECT userpass FROM user WHERE userid=:ui");
        $querycheck->bindParam("ui",$_SESSION['sessid']);
        $querycheck->execute();
        $userData = $querycheck->FETCH(PDO::FETCH_ASSOC);
        if(password_verify($oldPass, $userData['userpass'])){
            $queryupdate = $pdocon->prepare("UPDATE user SET userpass = :upass WHERE userid = :ui ");
            $queryupdate->bindParam("ui",$_SESSION['sessid']);
            $queryupdate->bindParam("upass", $hashedPassword, PDO::PARAM_STR);
            $queryupdate->execute();
            echo "<script>alert('New Password Is Updated');</script>";
        }else{
            echo "<script>alert('Old Password Is Wrong');</script>";
        }
    }else{
        echo "<script>alert('Re-Type Password does not match');</script>";
    }
}


// Cart Handling
if(isset($_POST['addToCart'])){
    $prodid = $_POST['prodid'];
    $prodname = $_POST['prodname'];
    
    if(!empty( $_POST['prodsaleprice'])){
        $prodprice = $_POST['prodsaleprice'];
        $prodregprice = $_POST['prodregprice'];
    }else{
        $prodprice = $_POST['prodprice'];   
    }
        $prodimg = $_POST['prodimg'];
        $orderqty = $_POST['orderqty'];
    if(isset( $_SESSION['cart'])){
        // Update Cart
        $prod_found = false;
        foreach($_SESSION['cart'] as $key => $values){
            if($values['prodid'] == $prodid){
                $_SESSION['cart'][$key]['orderqty'] += $orderqty;
                $prod_found = true;
                echo "<script>alert('Product quantity updated in the cart');</script>";
                break;
            }
        }
        // Add New Cart
        if(!$prod_found){
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count]
            = array("prodid" => $prodid, "prodname" => $prodname, "prodprice" => $prodprice, "prodimg" => $prodimg, "orderqty" => $orderqty);
        echo "<script>alert('New Product Added to Cart')</script>";
        }
    }else{
            $_SESSION['cart'][0] = array("prodid" => $prodid, "prodname" => $prodname, "prodprice" => $prodprice, "prodimg" => $prodimg, "orderqty" => $orderqty);
            echo "<script>alert('Product Added to Cart');</script>";
        }
    
}


// Update Cart Quantity From Cart Page
if(isset($_POST['updatecartqty'])){
    $prodids = $_POST['prodid'];
    $newqtys = $_POST['cartqty'];

    // Ensure both arrays have the same number of elements
    if(count($prodids) == count($newqtys)) {
        for($i = 0; $i < count($prodids); $i++) {
            $prodid = $prodids[$i];
            $newqty = $newqtys[$i];

            // Loop through the cart and update the quantities
            foreach($_SESSION['cart'] as $key => $values){
                if($values['prodid'] == $prodid){
                    // Debugging alert before updating the quantity
                    echo "<script>console.log('Product quantity before update: " . $_SESSION['cart'][$key]['orderqty'] . "');</script>";

                    // Update the quantity
                    $_SESSION['cart'][$key]['orderqty'] = $newqty;

                    // Debugging alert after updating the quantity
                    echo "<script>console.log('Product quantity updated for prodid: " . $prodid . ". New qty: " . $newqty . "');</script>";
                    break;
                }
            }
        }

        echo "<script>alert('Cart updated successfully');</script>";
    } else {
        echo "<script>alert('Error: Mismatched product and quantity data');</script>";
    }
}

// Remove From Cart

if(isset($_GET['deletecart'])){
    $cartdelid = $_GET['deletecart'];
    foreach($_SESSION['cart'] as $key => $values){
        if($values['prodid'] == $cartdelid){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>alert('Product Removed From Cart');
            locatio.assign('shoping-cart')</script>";
        }
    }
}

//Review  Add Review
if(isset($_POST['reviewpost'])){
    $fromuserid = $_POST['fromuserid'];
    $pordid = $_POST['prodid'];
    $reviewrating = $_POST['rating'];
    $review = $_POST['review'];
    $fromname = $_POST['fromname'];
    $fromemail = $_POST['fromemail'];
    $query = $pdocon->prepare("INSERT INTO `product_review`(`fromname`, `fromemail`, `review`, `reviewrating`, `prodfor`, `fromuserid`) VALUES (:fromname,:fromemail,:review,:reviewrating,:prodfor,:fromuserid)");
    $query->bindParam("fromname",$fromname);
    $query->bindParam("fromemail",$fromemail);
    $query->bindParam("review",$review);
    $query->bindParam("reviewrating",$reviewrating);
    $query->bindParam("prodfor", $pordid);
    $query->bindParam("fromuserid", $fromuserid);
    $query->execute();

    echo '<script>alert("Thank you for your Review");</script>';
}

// Delete User Review
if(isset($_GET['deletereview'])){
    $reviewdelid = $_GET['deletereview'];
    $prodid = $_GET['pid'];
    $query= $pdocon->prepare("DELETE FROM product_review Where reviewid = :rid");
    $query->bindParam("rid", $reviewdelid);
    $query->execute();
    echo "<script>alert('Review Deleted');
    location.assign('product-detail?pid=" . $prodid ."');
    </script>";
}

// Place Order

?>

