<?php
include ('components/header.php');
if(!$_SESSION['sessemail'] ){
    echo "<script>
        location.assign('../cozastore-master/');
        </script>";
}
if($_SESSION['sessrole'] == "user" || $_SESSION['sessrole'] == "customer" ){
    echo "<script>
        location.assign('../cozastore-master/my-account.php');
        </script>";
}
@include ('components/widgets/sale_revenue_dash.php');
@include ('components/widgets/sale_chart_dash.php');
@include ('components/widgets/recent_sale_dash.php');
@include ('components/widgets/other_widgets.php');

?>

            





         




<?php
include ('components/footer.php')

?>