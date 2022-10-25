<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
    <form enctype="multipart/form-data" action="./procesar.php" method="POST">
        <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
        <input type="hidden" name="MAX_FILE_SIZE" value="40000" />
        <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
        Enviar este fichero: <input name="fichero_usuario" type="file" />
        <br><br>
        Caracter: <input type="text" name="caracter"/>
        <input type="submit" value="Enviar fichero" />
    </form>
</body>
</html>