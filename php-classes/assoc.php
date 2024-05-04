<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Classes</title>
</head>
<body>
    <?php
        $x = "<h1>This is Associative Array with For Each Loop PHP Class</h1>";
        echo $x;
        $assoc = [
            [
                "Name" => "Monis",
                "Course" => "Full Stack Development",
                "Joining Date" => "2024-04-29"
            ],
            [
                "Name" => "Monis",
                "Course" => "Full Stack Development",
                "Joining Date" => "2024-04-29"
            ],
            [
                "Name" => "Monis",
                "Course" => "Full Stack Development",
                "Joining Date" => "2024-04-29"
            ],
            [
                "Name" => "Monis",
                "Course" => "Full Stack Development",
                "Joining Date" => "2024-04-29"
            ]
        ]
    ?>
    <table border=1>
        <thead>
            <tr>
            <?php
                foreach($assoc as $key => $val){
                    echo "<th><strong>" . $key . "</strong></th>";
                }
            ?>
            </tr>
        </thead>
        <tbody>
            <tr>
    <?php
        foreach($assoc as $key => $val){
            echo "<td style='padding:20px;'>" . $val . "</td>";
        }
    ?>      
            </tr>
        </tbody>
    </table>
</body>
</html>