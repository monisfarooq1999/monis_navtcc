<?php
@include ('components/header.php');
?>

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Create Product</h6>
                    <form enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Product Name" class="form-control" name="prodName" id="productName" required>
                            
                        </div>
                        <div class="mb-3">
                            <label for="productDesc" class="form-label">Product Description<span style="color:red;"> *</span></label>
                            <textarea type="text" placeholder="Product Description" class="form-control" name="prodDesc" id="productDesc" required></textarea>
                            
                        </div>
                        <div class="row bg-light rounded mx-0">
                        <div class="mb-3 col-md-6 p-0">
                            <label for="productregPrice" class="form-label">Product Regular Price<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Product Regular Price" class="form-control" name="prodregprice" id="productregPrice" required></input>
                            
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="productsalePrice" class="form-label">Product Sale Price</label>
                            <input type="text" placeholder="Product Sale Price" class="form-control" name="prodsaleprice" id="productsalePrice" max=""></input>
                            
                        </div>
                        </div>
                        <div class="row bg-light rounded mx-0">
                            <div class="mb-3 col-md-6 p-0">
                                <label for="productqty" class="form-label">Product Quantity<span style="color:red;"> *</span></label>
                                <input type="number" placeholder="Product Quantity" class="form-control" name="prodqty" id="productqty" required></input>
                                
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="productCat" class="form-label">Product Category</label>
                                <select type="text" placeholder="Product Category" class="form-control" name="prodcat" id="productCat" >
                                <option selected hidden>Select Category</option>
                                <?php
                                    $query = $pdocon->query(" SELECT * FROM categories");
                                    $cat_row = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($cat_row as $cat_row){

                                    ?>
                                        <option value="<?php echo  $cat_row['catid']?>"><?php echo  $cat_row['catName']?></option>
                            <?php
                                }
                            ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ProductImg" class="form-label">Product Image<span style="color:red;"> *</span></label>
                            <input type="file" class="form-control" id="ProductImg" name="prodimage" required accept="image/jpg, image/gif, image/png, image/webp, image/jpeg" >
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php
@include ('components/footer.php')

?>