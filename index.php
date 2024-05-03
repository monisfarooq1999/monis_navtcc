<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Class</title>
</head>
<body>
<?php 
$x = "<h1>This is First PHP Class</h1>";
echo $x
?>

<h2>Table of 2 using for loop</h2>
<div
    class="table-responsive"
>
    <table
        class="table table-primary" border=1
    >

        <tbody>
        <?php
            for($m = 1 ; $m <= 10 ; $m++){
        ?>
            <tr class="">
                <td scope="row">2</td>
                <td>x</td>
                <td><?php echo $m ?></td>
                <td>=</td>
                <td><?php echo $m*2 ?></td>
            </tr>
        <?php
            };
        ?>
        </tbody>
    </table>
</div>



</body>
</html>