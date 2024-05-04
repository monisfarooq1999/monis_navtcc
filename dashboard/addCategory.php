<?php
@include ('components/header.php')

?>

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add Category</h6>
                    <form>
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name<span>*</span></label>
                            <input type="text" placeholder="Category Name" class="form-control" id="categoryName" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="CategoryImg" class="form-label">Category Image</label>
                            <input type="file" class="form-control" id="CategoryImg" required>
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php
@include ('components/footer.php')

?>