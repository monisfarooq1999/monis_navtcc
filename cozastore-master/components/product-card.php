<div class="block2">
    <a href="product-detail.php?pid=<?php echo  $values['productid']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
        <div class="block2-pic hov-img0">
            <img src="<?php echo $prodimgref.$values['productimg']?>" alt="<?php echo $values['productname']?>">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a>
        </div>
    </a>
    <div class="block2-txt flex-w flex-t p-t-14">
        <div class="block2-txt-child1 flex-col-l ">
            <a href="product-detail.php?pid=<?php echo  $values['productid']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
            <?php echo $values['productname']?>
            </a>
            <?php
            if($values['productsaleprice'] > '0' ){
            ?>
                <span class="stext-105 cl3 sale_price">
                Rs. <?php echo $values['productsaleprice']?> <s class="stext-105 cl3 reg_price">Rs. <?php echo $values['productregprice']?>
                </s>
                </span>
            <?php 
            }else{ ?>

            <span class="stext-105 cl3 price">
            Rs. <?php echo $values['productregprice']?>
            </span>
            <?php }?>
        </div>

        <div class="block2-txt-child2 flex-r p-t-3">
            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
            </a>
        </div>
    </div>
</div>