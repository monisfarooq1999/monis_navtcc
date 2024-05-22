<?php
	include ("components/header.php");
	include ("components/header_4.php");
    if(isset($_GET['odr'])){
        $orderid = $_GET['odr'];
		$queryorder = $pdocon->prepare("SELECT * FROM `orders` WHERE  confirmationkeyodr = :odr");
		$queryorder->bindParam("odr",$orderid);
		$queryorder->execute();
        $odrdata = $queryorder->fetchAll(PDO::FETCH_ASSOC);
        $queryinvoice = $pdocon->prepare("SELECT * FROM `invoices` WHERE  confirmationkey = :odr");
		$queryinvoice->bindParam("odr",$orderid);
		$queryinvoice->execute();
		$invdata = $queryinvoice->fetch(PDO::FETCH_ASSOC);
	
?>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center m-b-20">
			Thank you For Your Order
		</h2>
        <h2 class="cl0 txt-center">
            <strong>
			Your Order Number is ODR#<?php echo $orderid ?>
            </strong>
		</h2>
	</section>
    <section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
                <div class="box bor10  col-md-6 account-details-wrapper m-t-40 p-lr-20 p-t-20 p-b-20">
                    <h3>Billing Information</h3>
                    <table class="table-my-orders wrap-table-my-orders m-t-20">
                        <tr class="table_row">
                            <td class="column-1">First Name:</td>
                            <td class="column-2"><?php echo $invdata['userfname'] ?></td>
                        </tr>
                        <tr class="table_row">
                            <td class="column-1">Last Name:</td>
                            <td class="column-2"><?php echo $invdata['userlname'] ?></td>
                        </tr>
                        <tr class="table_row">
                            <td class="column-1">Customer Email:</td>
                            <td class="column-2"><?php echo $invdata['custemail'] ?></td>
                        </tr>
                        <tr class="table_row">
                            <td class="column-1">Billing Phone:</td>
                            <td class="column-2"><?php echo $invdata['userphone'] ?></td>
                        </tr>
                        
                        <tr class="table_row">

                        </tr>

                    </table>
                </div>
                <div class="col-md-12 m-t-20 wrap-recent-orders bor10 p-lr-20 p-t-20 p-b-20">
                    <h2>Ordered Items</h2> 
                    <div class="wrap-table-my-orders m-t-20">
                        
                        <table class="table-my-orders">
                            <tr class="table_head">
                                <th class="column-1">Order #</th>
                                <th class="column-2">Item Name</th>
                                <th class="column-3">Item Quantity</th>
                                <th class="column-4">Item Total</th>
                            </tr>
                            <?php
                            foreach ($odrdata as $odrdata => $odrvalues) {
                            ?>
                            <tr class="table_row">
                                <td class="column-1">ODR - <?php echo $orderid ?></td>
                                <td class="column-2"><?php echo $odrvalues['itemname'] ?></td>
                                <td class="column-3"><?php echo $odrvalues['itemqty'] ?></td>
                                <td class="column-4">Rs. <?php echo $odrvalues['itemprice'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr class="table_row">
                                <td class="text-right" colspan="3">
                                    Order Total
                                </td>
                                <td>
                                    <?php echo $invdata['totalamount'] ?>
                                </td>
                            </tr>

                        </table>

                        
                    </div>
                </div>

               
            </div>
        </div>
    </section>

<?php
	}else{
		echo "<script>location.assign('product');</script>";
	}
	include ("components/footer.php");
?>