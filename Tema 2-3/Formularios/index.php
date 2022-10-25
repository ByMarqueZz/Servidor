<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="#00A9F8">
    <form action="./formulario.php" method="GET">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre">
        <br>
        <label for="localidad">Eres de goja?</label>
        <input type="radio" value="goja" name="localidad">
        <br>
        <label for="localidad">Eres de la almanjaya?</label>
        <input type="radio" value="la almanjaya" name="localidad">
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>