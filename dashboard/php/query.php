<?php
include("config.php");
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
?>