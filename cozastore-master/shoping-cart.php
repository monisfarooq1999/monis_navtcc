<?php
	@include ("components/header.php");
?>
<?php
	@include ("components/header_4.php");
?>
	<!-- breadcrumb -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Shopping Cart
		</h2>
		<div class="bread-crumb p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</section>	
		
<?php
	$carttotalfooter = 0;
	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
?>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
					<div class="m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-6"></th>
								</tr>
								<?php
									foreach ($_SESSION['cart'] as $key => $CartData) {
										$total = $CartData['orderqty'] * $CartData['prodprice'];
									
								?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="<?php echo $prodimgref.$CartData['prodimg']?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><a href="product-detail?pid=<?php echo $CartData['prodid']?>"><?php echo $CartData['prodname']?></a></td>
										<td class="column-3">Rs. <?php echo $CartData['prodprice']?></td>
										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>
												<input type="hidden" name="prodid[]" value="<?php echo  $CartData['prodid']?>">

												<input class="mtext-104 cl3 txt-center num-product" type="number" name="cartqty[]" value="<?php echo $CartData['orderqty']?>" min="1">

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>
										<td class="column-5">Rs. <?php echo $total ?></td>
										<td class="column-6">
											<a href="shoping-cart?deletecart=<?php echo  $CartData['prodid']?>"class="flex-c-m  cl0  bg3 bor0 hov-btn3 p-lr-10 p-tb-6 trans-04 pointer"><i class="zmdi zmdi-close"></i></a>
										</td>
									</tr>
								<?php
									$carttotalfooter += $total;
									}
								?>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<button class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" type="submit" name="updatecartqty">
								Update Cart
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									Rs. <?php echo $carttotalfooter; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									Rs. <?php echo $carttotalfooter; ?>
								</span>
							</div>
						</div>

						<a href="checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php
	}else{
?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92">
<h2 class="m-b-20">Your Cart is empty</h2>
<form action="product">
<button style="margin: 0 auto;" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">Go Back To Shop Page </button>
</form>
</section>
<?php
	}
?>
	
		


<?php
	@include ("components/footer.php");
?>