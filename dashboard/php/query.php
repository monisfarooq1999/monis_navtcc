<?php
include("config.php");
$catimgref = "img/category/";

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
?>