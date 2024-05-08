<?php
@include ('components/header.php');
if(isset($_GET['cid'])){
    $catstringid = $_GET['cid'];
    $query = $pdocon->prepare("SELECT * FROM categories WHERE catid=:pid");
    $query->bindParam("pid",$catstringid);
    $query->execute();
    $catData = $query->fetch(PDO::FETCH_ASSOC);
}

?>

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update Category</h6>
                    <form enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <input type="hidden" value="<?php echo $catData['catid']?>" name="catID">
                            <label for="categoryName" class="form-label">Category Name<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Category Name" class="form-control" name="catName" id="categoryName" required value="<?php echo  $catData['catName']?>">
                        </div>
                        <div class="mb-3">
                            
                            <label for="CategoryImg" class="form-label">Category Image<span style="color:red;"> *</span></label>
                            <input type="file" class="form-control" id="CategoryImg" name="cimage"  accept="image/jpg, image/gif, image/png, image/webp, image/jpeg">
                            <img src="<?php echo  $catimgref.$catData['catImg'];?>" alt="" width="50px">
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary" name="editCategory">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php
@include ('components/footer.php');

?>