<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
	<div class="container">
		<div class="row">
		<?php
			$query = $pdocon->query(" SELECT * FROM categories");
			$cat_row = $query->fetchAll(PDO::FETCH_ASSOC);
				foreach($cat_row as $cat_row){

		?>
			<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="<?php echo  $catimgref.$cat_row['catImg']?>" alt="<?php echo  $cat_row['catName']?>">

					<a href="product.php?cid=<?php echo  $cat_row['catid']?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3" target="_blank">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
							<?php echo  $cat_row['catName']?>
							</span>

							<span class="block1-info stext-102 trans-04">
								Spring 2018
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

		<?php } ?>
			

			
		</div>
	</div>
</div>