<?php
@include ('components/header.php');
if(isset($_GET['uid'])){
    $userstringid = $_GET['uid'];
    $query = $pdocon->prepare("SELECT * FROM user WHERE userid = :uid");
    $query->bindParam("uid",$userstringid);
    $query->execute();
    $userData = $query->fetch(PDO::FETCH_ASSOC);
}

?>

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update User</h6>
                    <form method="post">
                    <input type="hidden" value="<?php echo $userData['userid']?>" name="userID">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="First Name" class="form-control" name="userfirstname" id="firstName" required value="<?php echo $userData['firstname']?>">
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name<span style="color:red;"> *</span></label>
                            <input type="text" placeholder="Last Name" class="form-control" name="userlastname" id="lastName" required value="<?php echo $userData['lastname']?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userEmail" class="form-label">Email<span style="color:red;"> *</span></label>
                            <input required type="email" class="form-control" name="useremail" placeholder="Your Email Address" value="<?php echo $userData['useremail']?>">
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userphone" class="form-label">Phone Number<span style="color:red;"> *</span></label>
                            <input required type="tel" class="form-control" name="userphone" placeholder="Phone Number" value="<?php echo $userData['userphone']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="userpass" placeholder="Password">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            
                            
                            <label for="userRole" class="form-label">User Role<span style="color:red;"> *</span></label>
                        
                            <select type="text" class="form-control" name="userrole" id="userRole" >
                                <option selected hidden value="<?php echo $userData['userrole']?>"><?php echo $userData['userrole']?></option>
                                <option value="admin">Admin</option>
                                <option value="customer">Customer</option>
                                <option value="shop_manager">Shop Manager</option>
                                <option value="sales_person">Sales Person</option>
                            
                            </select>
                                
                        </div>
                    </div>
                        
                        <button type="submit" class="btn btn-primary" name="updateuser">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php
@include ('components/footer.php');

?>