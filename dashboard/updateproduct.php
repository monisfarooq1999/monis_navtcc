<?php
@include ('components/header.php');
if(isset($_GET['pid'])){
    $prodstringid = $_GET['pid'];
    $query = $pdocon->prepare("SELECT * FROM products WHERE productid=:pid");
    $query->bindParam("pid",$prodstringid);
    $query->execute();
    $prodData = $query->fetch(PDO::FETCH_ASSOC);
}
?>

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update Product</h6>
                    <form enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <input type="hidden" value="<?php echo $prodData['productid']?>" name="prodid">
                            <label for="productName" class="form-label">Product Name<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Product Name" class="form-control" name="prodName" id="productName" value="<?php echo  $prodData['productname']?>" required>
                            
                        </div>
                        <div class="mb-3">
                            <label for="productDesc" class="form-label">Product Description<span style="color:red;"> *</span></label>
                            <textarea type="text" placeholder="Product Description" class="form-control" name="prodDesc" id="productDesc" value="" required><?php echo  $prodData['productdesc']?></textarea>
                            
                        </div>
                        <div class="row bg-light rounded mx-0">
                        <div class="mb-3 col-md-6 p-0">
                            <label for="productregPrice" class="form-label">Product Regular Price<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Product Regular Price" class="form-control" name="prodregprice" id="productregPrice" required value="<?php echo  $prodData['productregprice']?>"></input>
                            
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="productsalePrice" class="form-label">Product Sale Price</label>
                            <input type="text" placeholder="Product Sale Price" class="form-control" name="prodsaleprice" id="productsalePrice" value="<?php echo  $prodData['productsaleprice']?>"></input>
                            
                        </div>
                        </div>
                        <div class="row bg-light rounded mx-0">
                            <div class="mb-3 col-md-6 p-0">
                                <label for="productqty" class="form-label">Product Quantity<span style="color:red;"> *</span></label>
                                <input type="number" placeholder="Product Quantity" class="form-control" name="prodqty" id="productqty" required  value="<?php echo  $prodData['productqty']?>"></input>
                                
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="productCat" class="form-label">Product Category</label>
                                <select type="text" placeholder="Product Category" class="form-control" name="prodcat" id="productCat" >
                                <?php
                                $query = $pdocon->query(" SELECT `products`.*, `categories`.`catName`
                                FROM `products` 
                                INNER JOIN `categories` ON `products`.`productcatid` = `categories`.`catid`;");
                                    $prodrow = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($prodrow as $prodrow){
                                        ?>
                                <option  value="<?php echo  $prodrow['productcatid']?>" ><?php echo  $prodrow['catName']?></option>
                                <?php
                                    }
                                    $selectedProductCatId = $prodrow['productcatid'];
                                    $query = $pdocon->query("SELECT * FROM categories WHERE catid != $selectedProductCatId");
                                    $catotherrow = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($catotherrow as $cat_row){
                                    ?>
                                        <option value="<?php echo  $cat_row['catid']?>"><?php echo  $cat_row['catName']?></option>
                            <?php
                                }
                            ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ProductImg" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="ProductImg" name="prodimage"  accept="image/jpg, image/gif, image/png, image/webp, image/jpeg" >
                            <img src="<?php echo  $prodimgref.$prodData['productimg'];?>" alt="" width="50px">
                        </div>
                        <button type="submit" class="btn btn-primary" name="updateProduct">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php
@include ('components/footer.php')

?>