<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <?php
            for ($i=0; $i<=20; $i++) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".base_convert($i, 10, 2)."</td>";
                echo "<td>".base_convert($i, 10, 8)."</td>";
                echo "<td>".base_convert($i, 10, 16)."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>