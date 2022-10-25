<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dado1 = rand(1, 6);
        $dado2 = rand(1, 6);

        echo "El primer dado es $dado1<br>";
        echo "El segundo dado es $dado2<br>";

        if ($dado1 == $dado2) {
            echo "Los dados han sacado el mismo valor";
        } elseif ($dado1 < $dado2) {
            echo "La tirada mayor ha sido en la tirada 2";
        } else {
            echo "La tirada mayor ha sido en la tirada 1";
        }
    ?>
</body>
</html>