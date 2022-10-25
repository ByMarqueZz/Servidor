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
            for ($i=1; $i<=10; $i++) {
                echo "<tr>";
                echo "<td>Tabla del $i</td>";
                for ($j=0; $j<=10; $j++) {
                    echo "<td>$i x $j = ".$j*$i."</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>