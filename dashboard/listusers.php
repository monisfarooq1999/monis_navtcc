<?php
include("components/header.php");
?>
 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded pt-4 mx-0">
        <div class="col-md-12">
            <!-- Blank End -->
            <div class="row mb-4">
                <div class="col-md-6 d-flex">
                    <h6 class="align-content-center m-0">All Users</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="adduser.php" class="btn btn-success">Add New</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="px-5" colspan="2">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $pdocon->query("SELECT * FROM user ");
                        $userrow = $query ->fetchAll(PDO::FETCH_ASSOC);
                        foreach($userrow as $userrow){
                                ?>
                        <tr>
                        <?php if ($userrow['userrole'] != 'superadmin'){?>
                            <td scope="row"><?php echo $userrow['userid']?></td>
                            <td><?php echo $userrow['firstname']?></td>
                            <td><?php echo $userrow['lastname']?></td>
                            <td><?php echo $userrow['useremail']?></td>
                            <td><?php echo $userrow['userphone']?></td>
                            <td><?php echo $userrow['userrole']?></td>
                            
                            <td><a href="updateuser.php?uid=<?php echo $userrow['userid'] ?>" class="btn btn-success">Edit</a></td>
                            <td><a href="?userdeleteKey=<?php echo $userrow['userid'] ?>" class="btn btn-danger">Delete</a></td>
                            <?php }?>
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
<?php
include("components/footer.php");
?>