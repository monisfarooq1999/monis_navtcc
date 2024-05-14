<?php
include("config.php");
session_start();
// session_unset();
$catimgref = "img/category/";
$prodimgref = "img/product/";

//category add
if(isset($_POST['addCategory'])){
    $catName = $_POST['catName'];
    $catimg = $_FILES['cimage']['name'];
    $tmpcatimg = $_FILES['cimage']['tmp_name'];
    $extension = pathinfo($catimg,PATHINFO_EXTENSION);
    $desimg = "img/category/".$catimg;
    if(move_uploaded_file($tmpcatimg,$desimg)){
        $query = $pdocon->prepare("INSERT INTO `categories`(`catName`, `catImg`) VALUES (:pname,:pimage)");
        $query->bindParam("pname",$catName);
        $query->bindParam("pimage",$catimg);
        $query->execute();
        echo "<script>alert('Category Added')</script>";
    }
    else{
        echo "<script>alert('Error')</script>";
    }
}

//category update
if(isset($_POST['editCategory'])){
    $catId = $_POST['catID'];
    $catName = $_POST['catName'];
    if(!empty( $_FILES['cimage']['name'])){
        $catimg = $_FILES['cimage']['name'];
        $tmpcatimg = $_FILES['cimage']['tmp_name'];
        $extension = pathinfo($catimg,PATHINFO_EXTENSION);
        $desimg = "img/category/".$catimg;
        if(move_uploaded_file($tmpcatimg,$desimg)){
            $query = $pdocon->prepare("UPDATE categories SET catName = :pname , catImg = :pimage WHERE catid = :pid");
            $query->bindParam("pid",$catId);
            $query->bindParam("pname",$catName);
            $query->bindParam("pimage",$catimg);
            $query->execute();
            echo "<script>alert('Category Updated');
            location.assign('listcategory.php');
            </script>";
        }
        else{
            echo "<script>alert('Error')</script>";
        }
    }
    else{
        $query = $pdocon->prepare("UPDATE categories SET catName = :pname WHERE catid = :pid");
        $query->bindParam("pid",$catId);
        $query->bindParam("pname",$catName);
        $query->execute();
        echo "<script>alert('Category Updated without image');
        location.assign('listcategory.php');
        </script>";

    }
}

//category delete
if(isset($_GET['deleteKey'])){
    $catId = $_GET['deleteKey'];
    $query = $pdocon->prepare("DELETE FROM  categories WHERE catid = :pid");
    $query->bindParam("pid",$catId);
    $query->execute();
    echo "<script>alert('Category Deleted');
    location.assign('listcategory.php');
    </script>";
}



//Add product
if(isset($_POST['addProduct'])){
$productName = $_POST['prodName'];
$productregPrice = $_POST['prodregprice'];
$productsalePrice = $_POST['prodsaleprice'];
$productDescription = $_POST['prodDesc'];
$productQuantity = $_POST['prodqty'];
$productCatid = $_POST['prodcat'];
$productImageName = $_FILES['prodimage']["name"];
$productTmpName = $_FILES['prodimage']["tmp_name"];
$extension = pathinfo($productImageName,PATHINFO_EXTENSION);
$desig = "img/product/".$productImageName;
    if(move_uploaded_file($productTmpName,$desig)){
        if(!empty( $_POST['prodsaleprice'])){
        $query = $pdocon->prepare("INSERT INTO `products`(`productname`, `productqty`, `productregprice`,`productsaleprice`, `productdesc`, `productimg`, `productcatid`) VALUES(:pn,:pq,:prp,:psp,:pd,:pi,:pc)");
        $query->bindParam("pn", $productName);
        $query->bindParam("pq", $productQuantity);
        $query->bindParam("prp", $productregPrice);
        $query->bindParam("psp", $productsalePrice);
        $query->bindParam("pd", $productDescription);
        $query->bindParam("pi", $productImageName);
        $query->bindParam("pc", $productCatid);
        $query->execute();
        echo "<script>alert('product added successfully')
        location.assign('listproducts.php')</script>";
        }
        else{
            $query = $pdocon->prepare("INSERT INTO `products`(`productname`, `productqty`, `productregprice`, `productdesc`, `productimg`, `productcatid`) VALUES(:pn,:pq,:prp,:pd,:pi,:pc)");
            $query->bindParam("pn", $productName);
            $query->bindParam("pq", $productQuantity);
            $query->bindParam("prp", $productregPrice);
            $query->bindParam("pd", $productDescription);
            $query->bindParam("pi", $productImageName);
            $query->bindParam("pc", $productCatid);
            $query->execute();
            echo "<script>alert('product Updated successfully')
            location.assign('listproducts.php')</script>";
        }

    }else
    {
        echo "<script>alert('invalid file type')</script>";
    
    }

}

//Update product
if(isset($_POST['updateProduct'])){
    $prodId = $_POST['prodid'];
    $productName = $_POST['prodName'];
    $productregPrice = $_POST['prodregprice'];
    $productsalePrice = $_POST['prodsaleprice'];
    $productDescription = $_POST['prodDesc'];
    $productQuantity = $_POST['prodqty'];
    $productCatid = $_POST['prodcat'];
    if(!empty( $_FILES['prodimage']['name'])){
        $productImageName = $_FILES['prodimage']["name"];
        $productTmpName = $_FILES['prodimage']["tmp_name"];
        $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
        $desig = "img/product/".$productImageName;
        if(move_uploaded_file($productTmpName,$desig)){
            if(!empty( $_POST['prodsaleprice'])){
            $query = $pdocon->prepare("UPDATE `products` SET productname = :pn, productqty = :pq , productregprice = :prp , productsaleprice = :psp , productdesc = :pd , productimg = :pi , productcatid = :pc WHERE productid = :pid");
            $query->bindParam("pid", $prodId);
            $query->bindParam("pn", $productName);
            $query->bindParam("pq", $productQuantity);
            $query->bindParam("prp", $productregPrice);
            $query->bindParam("psp", $productsalePrice);
            $query->bindParam("pd", $productDescription);
            $query->bindParam("pi", $productImageName);
            $query->bindParam("pc", $productCatid);
            $query->execute();
            echo "<script>alert('product Updated successfully')
            location.assign('listproducts.php')</script>";
            }
            else{
                $query = $pdocon->prepare("UPDATE `products` SET productname = :pn, productqty = :pq , productregprice = :prp , productdesc = :pd , productimg = :pi , productcatid = :pc WHERE productid = :pid");
                $query->bindParam("pid", $prodId);
                $query->bindParam("pn", $productName);
                $query->bindParam("pq", $productQuantity);
                $query->bindParam("prp", $productregPrice);
                $query->bindParam("pd", $productDescription);
                $query->bindParam("pi", $productImageName);
                $query->bindParam("pc", $productCatid);
                $query->execute();
                echo "<script>alert('product Updated successfully')
                location.assign('listproducts.php')</script>";
            }
    
        }
        else
        {
            echo "<script>alert('invalid file type')</script>";
        
        }
    
    }
    else{
        if(!empty( $_POST['prodsaleprice'])){
            $query = $pdocon->prepare("UPDATE `products` SET productname = :pn, productqty = :pq , productregprice = :prp , productsaleprice = :psp , productdesc = :pd , productcatid = :pc WHERE productid = :pid");
            $query->bindParam("pid", $prodId);
            $query->bindParam("pn", $productName);
            $query->bindParam("pq", $productQuantity);
            $query->bindParam("prp", $productregPrice);
            $query->bindParam("psp", $productsalePrice);
            $query->bindParam("pd", $productDescription);
            $query->bindParam("pc", $productCatid);
            $query->execute();
            echo "<script>alert('Product Updated without image');
            location.assign('listproducts.php');
            </script>";
        }
        else{
            $query = $pdocon->prepare("UPDATE `products` SET productname = :pn, productqty = :pq , productregprice = :prp , productdesc = :pd , productcatid = :pc WHERE productid = :pid");
            $query->bindParam("pid", $prodId);
            $query->bindParam("pn", $productName);
            $query->bindParam("pq", $productQuantity);
            $query->bindParam("prp", $productregPrice);
            $query->bindParam("pd", $productDescription);
            $query->bindParam("pc", $productCatid);
            $query->execute();
            echo "<script>alert('Product Updated without image');
            location.assign('listproducts.php');
            </script>";
        }
    }
}
    

//delete product
if(isset($_GET['prodeleteKey'])){
    $proid = $_GET['prodeleteKey'];
    $query= $pdocon->prepare("DELETE FROM products Where productid = :pid");
    $query->bindParam("pid", $proid);
    $query->execute();
    echo "<script>alert('Product Deleted');
    location.assign('listproducts.php')
    </script>";

}



//Add User
if(isset($_POST['adduser'])){
    $firstName = $_POST['userfirstname'];
    $lastName = $_POST['userlastname'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphone'];
    $userpass = $_POST['userpass'];
    $userrole = $_POST['userrole'];
    
    $query = $pdocon->prepare("INSERT INTO `user`(`firstname`, `lastname`, `useremail`,`userphone`, `userpass`, `userrole`) VALUES(:fn,:ln,:uem,:uph,:upass,:urole)");
    $query->bindParam("fn", $firstName);
    $query->bindParam("ln", $lastName);
    $query->bindParam("uem", $useremail);
    $query->bindParam("uph", $userphone);
    $query->bindParam("upass", $userpass);
    $query->bindParam("urole", $userrole);
    $query->execute();
    echo "<script>alert('User added successfully')
    location.assign('listusers.php')</script>";
            
    
}

//Update User
if(isset($_POST['updateuser'])){
    $userID = $_POST['userID'];
    $firstName = $_POST['userfirstname'];
    $lastName = $_POST['userlastname'];
    $useremail = $_POST['useremail'];
    $userphone = $_POST['userphone'];
    $userpass = $_POST['userpass'];
    $userrole = $_POST['userrole'];

    $query_role = $pdocon->prepare("SELECT userrole FROM user WHERE userid = :uid");
    $query_role->bindParam("uid", $userID);
    $query_role->execute();
    $user_role = $query_role->fetchColumn();

    if ($user_role == 'superadmin' && $_SESSION['sessrole'] != 'superadmin') {
        echo "<script>alert('Super Admin cannot be edited.');
        location.assign('listusers.php')</script>";
    } else {
        if (!empty($_POST['userpass'])) {
            $query = $pdocon->prepare("UPDATE `user` SET firstname = :fn, lastname = :ln, useremail = :uem, userphone = :uph, userpass = :upass, userrole = :urole  WHERE userid = :uid");
            $query->bindParam("upass", $userpass);
        } else {
            $query = $pdocon->prepare("UPDATE `user` SET firstname = :fn, lastname = :ln, useremail = :uem, userphone = :uph, userrole = :urole  WHERE userid = :uid");
        }

        $query->bindParam("uid", $userID);
        $query->bindParam("fn", $firstName);
        $query->bindParam("ln", $lastName);
        $query->bindParam("uem", $useremail);
        $query->bindParam("uph", $userphone);
        $query->bindParam("urole", $userrole);
        $query->execute();
        echo "<script>alert('User Updated successfully');
        location.assign('listusers.php')</script>";
    }
}


//delete User
if (isset($_GET['userdeleteKey'])) {
    $userid = $_GET['userdeleteKey'];
    $query_role = $pdocon->prepare("SELECT userrole FROM user WHERE userid = :uid");
    $query_role->bindParam("uid", $userid);
    $query_role->execute();
    $user_role = $query_role->fetchColumn();

    if ($user_role === 'superadmin') {
        echo "<script>alert('Super Admin cannot be deleted.');
        location.assign('listusers.php')</script>";
    } else {
        $query_delete = $pdocon->prepare("DELETE FROM user WHERE userid = :uid");
        $query_delete->bindParam("uid", $userid);
        $query_delete->execute();
        echo "<script>alert('User Deleted');
        location.assign('listusers.php')</script>";
    }
}


?>