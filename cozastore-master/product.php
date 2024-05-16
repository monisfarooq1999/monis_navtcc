<?php
	@include ("components/header.php");
?>
<?php
	@include ("components/header_4.php");


if(isset($_GET['cid'])){
    $catstringid = $_GET['cid'];
    $query = $pdocon->prepare("SELECT * FROM categories WHERE catid=:pid");
    $query->bindParam("pid",$catstringid);
    $query->execute();
    $catData = $query->fetch(PDO::FETCH_ASSOC);


?>
	<!-- Product With Cat ID -->
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			<?php echo $catData['catName']?>
		</h2>
	</section>	
	
	<div class="bg0 m-t-60 p-b-140">
		<div class="container">
			<div class="row isotope-grid">
            <?php
                $query = $pdocon->query("SELECT `products`.*, `categories`.`catname`
                FROM `products` 
                    INNER JOIN `categories` ON `products`.`productcatid` = `categories`.`catid`  WHERE `productcatid` = $catstringid;");
                $prorow = $query ->fetchAll(PDO::FETCH_ASSOC);
                foreach($prorow as $values){
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $values['catname']?>">
					<!-- Block2 -->
					<?php
						include ("components/product-card.php")
					?>
				</div>

            <?php }?>
			</div>
			<!-- Load more
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->
			
		</div>
	</div>
<?php
}else{

?>

	<!-- All Product -->
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Shop
		</h2>
	</section>
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
	<?php
		include ("components/product-grid-cat-filter.php");
	?>
		</div>
	</section>
<?php

}
	@include ("components/footer.php");
?>