<?php

	include ("components/header.php");
	if(!isset($_SESSION['cart'])){
		echo "<script>
            location.assign('product');
            </script>";
	}
?>

<?php
	include ("components/header_1.php");
?>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Checkout
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
            
                <?php
                // Guest Customer
                if(!isset($_SESSION['sessemail'])){
                ?>
                <div class="bor10 flex-w flex-col-m p-lr-90 p-tb-10 p-lr-90-lg w-full-md w-full" style="">
					<form  method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
						Already Have An Account?
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="custemail" required placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="custpassword" required placeholder="Password">
							<img class="how-pos4 pointer-none" src="images/icons/password.png"  width="20px"  alt="ICON">
						</div>

						<button type="submit" name="userlogin" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Login
						</button>
					</form>
                    <h4 class="mtext-105 cl2 txt-center p-tb-30">
						OR Proceed as Guest Checkout
                    </h4>
				</div>
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    
                    <form method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
						Billing Details
						</h4>
                        <input type="hidden" name="custid" value="12">

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="userfirstname" placeholder="First Name">
							<img class="how-pos4 pointer-none" src="images/icons/user.png" width="25px" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="userlastname" placeholder="Last Name">
							<img class="how-pos4 pointer-none" src="images/icons/user.png" width="25px" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="useremail" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="tel" name="userphone" placeholder="Phone Number">
							<img class="how-pos4 pointer-none" src="images/icons/phone.png"  width="20px"  alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
                            <textarea class="stext-111 cl2 size-116 p-l-10 p-tb-10" required type="text" name="custaddress" placeholder="Address"></textarea>
						</div>

						<button type="submit" name="placeorder" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Place Order</button>
					</form>
                </div>
                
                <?php
                // logged in
                }else{
                ?>
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form method="post">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Billing Details
                        </h4>
                        <input type="hidden" name="custid" value="<?php echo $_SESSION['sessid'] ?>">

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="userfirstname" placeholder="First Name" value="<?php echo $_SESSION['sessfname'] ?>">
                            <img class="how-pos4 pointer-none" src="images/icons/user.png" width="25px" alt="ICON">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="userlastname" placeholder="Last Name" value="<?php echo $_SESSION['sesslname'] ?>">
                            <img class="how-pos4 pointer-none" src="images/icons/user.png" width="25px" alt="ICON">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="useremail" placeholder="Your Email Address" value="<?php echo $_SESSION['sessemail'] ?>">
                            <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="tel" name="userphone" placeholder="Phone Number" value="<?php echo $_SESSION['sessphone'] ?>">
                            <img class="how-pos4 pointer-none" src="images/icons/phone.png"  width="20px"  alt="ICON">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <textarea class="stext-111 cl2 size-116 p-l-10 p-tb-10" required type="text" name="custaddress" placeholder="Address"><?php if(!empty($_SESSION['sessaddress'])){ echo $_SESSION['sessaddress']; }?></textarea>
                            
                        </div>

                        <button type="submit" name="placeorder" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Place Order
                        </button>
                    </form>
                </div>

                <?php
                }
                ?>
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Your Cart
                    </h4>
                <?php
                    $carttotalfooter = 0;
                    if(isset($_SESSION['cart'])){
                ?>
                    <div class="header-cart-content flex-w">
                        <ul class="header-cart-wrapitem w-full">
                            <?php
                                foreach($_SESSION['cart'] as $cartData){
                                $cartData['orderqty'] *   $cartData['prodprice']
                            ?>
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo $prodimgref.$cartData['prodimg']?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="product-detail?pid=<?php echo $cartData['prodid']?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        <?php echo $cartData['prodname']?>
                                    </a>

                                    <span class="header-cart-item-info">
                                        <?php echo $cartData['orderqty']?> x Rs. <?php echo $cartData['prodprice']?>
                                    </span>
                                    <span class="header-cart-item-info">
                                        <?php  $carttotalprod = $cartData['orderqty'] *   $cartData['prodprice'];
                                        echo 'Rs. ' . $carttotalprod ;?>
                                    </span>
                                </div>
                                <div class="p-lr-5 pointer hov-cl1 trans-04 " style="width:20px;">
                                    <a href="?deletecart=<?php echo  $cartData['prodid']?>"class="cl2"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </li>
                            <?php 
                                $carttotalfooter += $carttotalprod;
                                }
                            ?>
                        </ul>
                        
                        <div class="w-full">
                            <div class="header-cart-total w-full p-tb-40">
                                Total: <?php echo 'Rs. ' . $carttotalfooter; ?>
                            </div>
                        </div>
                    </div>
                <?php 
                }
                ?>
                </div>
				

				
			</div>
		</div>
	</section>	
	




<?php
	include ("components/footer.php");
?>