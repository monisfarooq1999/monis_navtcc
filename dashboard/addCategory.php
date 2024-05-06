<?php
@include ('components/header.php')

?>

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add Category</h6>
                    <form enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Category Name" class="form-control" name="catName" id="categoryName" required>
                            
                        </div>
                        <div class="mb-3">
                            <label for="CategoryImg" class="form-label">Category Image<span style="color:red;"> *</span></label>
                            <input type="file" class="form-control" id="CategoryImg" name="cimage" required accept="image/jpg, image/gif, image/png, image/webp, image/jpeg" >
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary" name="addCategory">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php
@include ('components/footer.php')

?>