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
        $numeros = array();
        foreach($_GET as $clave => $valor) {
            array_push($numeros, $valor);
        }
        for ($i=$numeros[0]; $i<$numeros[1]; $i++) {
            echo $i;
        }
    ?>
</body>
</html>