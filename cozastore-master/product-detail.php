<?php
	include ("components/header.php");
	include ("components/header_4.php");

	if(isset($_GET['pid'])){
		$prodstringid = $_GET['pid'];
		$queryprod = $pdocon->prepare("SELECT `products`.*, `categories`.`catname`
		FROM `products` 
			INNER JOIN `categories` ON `products`.`productcatid` = `categories`.`catid` WHERE  productid = :pid");
		$queryprod->bindParam("pid",$prodstringid);
		$queryprod->execute();
		$prodData = $queryprod->fetch(PDO::FETCH_ASSOC);
		$queryreview = $pdocon->prepare("SELECT `product_review`.*, `user`.`userid`, `products`.`productid`
		FROM `product_review` 
			LEFT JOIN `user` ON `product_review`.`fromuserid` = `user`.`userid` 
			LEFT JOIN `products` ON `product_review`.`prodfor` = `products`.`productid` WHERE prodfor = :pid;");
		$queryreview->bindParam("pid",$prodstringid);
		$queryreview->execute();
		$reviewData = $queryreview->fetchAll(PDO::FETCH_ASSOC);
	
	
	?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php?cid=<?php echo $prodData['productcatid'] ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo  $prodData['catname']?> 
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo  $prodData['productname']?> 
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?php echo $prodimgref.$prodData['productimg']?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo $prodimgref.$prodData['productimg']?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $prodimgref.$prodData['productimg']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo  $prodData['productname']?>
						</h4>

						<?php
						if($prodData['productsaleprice'] > '0' ){
						?>
							<span class="mtext-106 cl2 sale_price">
							Rs. <?php echo $prodData['productsaleprice']?> <s class="stext-105 cl3 reg_price">Rs. <?php echo $prodData['productregprice']?>
							</s>
							</span>
						<?php 
						}else{ ?>

						<span class="mtext-106 cl2 price">
						Rs. <?php echo $prodData['productregprice']?>
						</span>
						<?php }?>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $prodData['productdesc']?>
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<!-- <div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Red</option>
											<option>Blue</option>
											<option>White</option>
											<option>Grey</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div> -->

							<div class="flex-w flex-col-l p-b-10">
								<div class=" flex-w flex-m respon6-next">
									<form method="post" action="">
									<input type="hidden" name="prodid" value="<?php echo $prodData['productid']?>">
									<?php
									if($prodData['productsaleprice'] > '0' ){
									?>
										<input type="hidden" name="prodsaleprice" value="<?php echo $prodData['productsaleprice']?>">
										<input type="hidden" name="prodregprice" value="<?php echo $prodData['productregprice']?>">
									<?php
									}else{?>
										<input type="hidden" name="prodprice" value="<?php echo $prodData['productregprice']?>">
									<?php
									}
									?>
									<input type="hidden" name="prodname" value="<?php echo $prodData['productname']?>">
									<input type="hidden" name="prodimg" value="<?php echo $prodData['productimg']?>">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="orderqty" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" name="addToCart" type="submit">
											Add to cart
										</button>
									</form>
								</div>
							</div>	
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (<?php 
						$reviewCount = 0;
						if(isset($reviewData)){
							$reviewCount = count($reviewData);
							echo $reviewCount;
						}?>)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $prodData['productdesc']?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<?php
										foreach($reviewData as $reviewData){

										?>
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="images/avatar-01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														<?php echo $reviewData['fromname']?>
													</span>

													<span class="fs-18 cl11">
													<?php
													$reviewrating = $reviewData['reviewrating']; 
													$maxStars = 5;
													for ($i = 1; $i <= $maxStars; $i++) {
														if ($i <= $reviewrating) {
													?>
														<i class="zmdi zmdi-star"></i>
													<?php
														} else {
													?>
														<i class="zmdi zmdi-star-outline"></i>
													<?php
														}
													}
													?>
													</span>
												</div>

												<p class="stext-102 cl6">
													<?php echo $reviewData['review']?>
												</p>
												<?php
												if(isset($_SESSION['sessid'])){
													if($_SESSION['sessid'] == $reviewData['fromuserid']){
												?>
												<div class="flex-w flex-col-r">
													<a class="cl2" href="product-detail?pid=<?php echo $prodstringid?>&deletereview=<?php echo $reviewData['reviewid']?>">Delete Review</a>
												</div>

												<?php
													}
												}
												?>
												
											</div>
										</div>
										<?php
										}
										?>
										<!-- Add review -->
										<form class="w-full" method="post">
											<input type="hidden" name="prodid" value="<?php echo $prodData['productid']?>">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating" min="1" required>
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea required class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>
												
												<?php
												if(isset($_SESSION['sessid'])){
												?>
												<input type="hidden" name="fromuserid" value="<?php echo $_SESSION['sessid']?>">
												<input type="hidden" name="fromname" value="<?php echo $_SESSION['sessfname'] . ' ' . $_SESSION['sesslname']?>">
												<input type="hidden" name="fromemail" value="<?php echo $_SESSION['sessemail']?>">
												<?php
												}else{
												?>
												<input type="hidden" name="fromuserid" value="12">
												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input required class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="fromname">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input required class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="fromemail">
												</div>
												<?php
												}
												?>
											</div>

											<button type="submit" name="reviewpost" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php echo  $prodData['catname']?> 
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				<?php
				$catidprod = $prodData['productcatid'];
				$queryrelated = $pdocon->query("SELECT `products`.*, `categories`.`catname`
					FROM `products` 
						INNER JOIN `categories` ON `products`.`productcatid` = `categories`.`catid` WHERE productcatid = $catidprod AND productid != $prodstringid");
				if($queryrelated ->rowCount() > 0 ){
					$prorow = $queryrelated->fetchAll(PDO::FETCH_ASSOC);
				}else{
					$queryrelatedall = $pdocon->query("SELECT `products`.*, `categories`.`catname`
					FROM `products` 
						INNER JOIN `categories` ON `products`.`productcatid` = `categories`.`catid` WHERE productid != $prodstringid");
					
					$prorow = $queryrelatedall->fetchAll(PDO::FETCH_ASSOC);
				
				}
				foreach($prorow as $values){

				?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<?php
							include ("components/product-card.php")
						?>
					</div>
				<?php
				}
				?>
				</div>
			</div>
		</div>
	</section>
		

<?php
	}else{
		echo "Go Back to Shop Page";
	}
	include ("components/footer.php");
?>