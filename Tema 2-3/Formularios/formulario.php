<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="#00A9F8">
    <?php
        echo "Recepción del formulario<br>";
        echo "El elemento nombre tiene valor ".$_GET['nombre']."<br>";
        echo "Y encima es de ".$_GET['localidad'];

    ?>
</body>
</html>