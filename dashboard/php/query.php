<?php
include("config.php");
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

?>