
<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<?php
                $carttotalfooter = 0;
                if(isset($_SESSION['cart'])){
            ?>
			<div class="header-cart-content flex-w js-pscroll">
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
							<a href="<?php echo $cartData['prodid']?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
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

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="checkout" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
            <?php 
                
            }else{
            ?>
            <section class="bg-img1 txt-center p-lr-15 p-tb-92 ">
            <h2 class="m-b-20">Your Cart is empty</h2>
            <form action="product">
                <button style="margin: 0 auto;" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">Go Back To Shop Page </button>
            </form>
            </section>
            <?php 
            }
            ?>
		</div>
	</div>