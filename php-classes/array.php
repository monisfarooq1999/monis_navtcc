<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Classes</title>
</head>
<body>
<?php
$x = "<h1>This is Array with For Loop PHP Class</h1>";
echo $x;
$arr = ["full stack" , "game development" , "java" , "python advance"];
echo $arr[0] . "<br>";
// var_dump ($arr);
?>

<ul>
<?php
for($i = 0; $i < count($arr); $i++) {
    ?>
    <li><?php echo $arr[$i] ?></li>
<?php
}

?>
</ul>

<table border=1 style="border-collapse: collapse; width: 300px;">
    <thead>
        <tr>
            <th>Value of Array</th>
            <th>Index of Array</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i = 0; $i < count($arr); $i++) {
            ?>
            <tr>
                <td>
                    <?php echo $arr[$i] ?>
                </td>
                <td>
                    <?php echo $i ?>
                </td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>
</body>
</html>