<?php
@include ('components/header.php');
?>

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row  bg-light rounded  mx-0">
            <div class="col-md-12 p-4 ">
            <h6 class="mb-4">All Categories</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Image</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $pdocon->query(" SELECT * FROM categories");
                            $cat_row = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($cat_row as $cat_row){

                            ?>
                                    <tr>
                                        <td scope="row"><?php echo $cat_row['catid']?></td>
                                        <td><?php echo  $cat_row['catName']?></td>
                                        <td><img src="<?php echo  $catimgref.$cat_row['catImg'];?>" alt="" width="50px"></td>
                                        <td><a href="updatecategory.php?cid=<?php echo $cat_row['catid'] ?>" class="btn btn-info">Edit</a></td>
                                        <td><a href="?deleteKey=<?php echo $cat_row['catid'] ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->


<?php
@include ('components/footer.php');
?>