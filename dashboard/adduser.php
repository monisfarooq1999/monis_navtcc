<?php
@include ('components/header.php');
?>

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mx-0">
            <div class="col-md-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add User</h6>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name<span style="color:red;"> *</span></label>
                                <input type="text" placeholder="First Name" class="form-control" name="userfirstname" id="firstName" required>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name<span style="color:red;"> *</span></label>
                                <input type="text" placeholder="Last Name" class="form-control" name="userlastname" id="lastName" required>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="userEmail" class="form-label">Email<span style="color:red;"> *</span></label>
                                <input required type="email" class="form-control" name="useremail" placeholder="Your Email Address">
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="userphone" class="form-label">Phone Number<span style="color:red;"> *</span></label>
                                <input required type="tel" class="form-control" name="userphone" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password<span style="color:red;"> *</span></label>
                                <input required type="password" class="form-control" name="userpass" placeholder="Password">
                            </div>
                            <div class="col-md-6 mb-3">
                                
                                
                                <label for="userRole" class="form-label">User Role<span style="color:red;"> *</span></label>
                                <select  class="form-control" name="userrole" id="userRole" >
                                    <option selected hidden>Select Role</option>
                                    
                                    <option value="admin">Admin</option>
                                    <option value="customer">Customer</option>
                                    <option value="shop_manager">Shop Manager</option>
                                    <option value="sales_person">Sales Person</option>
                                    
                                </select>
                                    
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary" name="adduser">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php
@include ('components/footer.php')

?>