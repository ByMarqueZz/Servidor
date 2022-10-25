<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       form {
        border: 1px solid black;
        text-align: center;
        padding: 6%;
       }
       ul{
        margin-left: 40%;
       }
       table {
        text-align: center;
        margin: 0 auto;
       }
    </style>
</head>
<body>
    <form action="./index.php" method="get">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">
        <br><br>
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        include('./datos.php');

        if(isset($_GET["usuario"])) {
            if(login($_GET["usuario"], $_GET["contraseña"], $usuarios) == true) {
                escribeUsuario($_GET["usuario"], $usuarios);
                escribePrestamos($_GET["usuario"], $usuarios, $prestamos, $libros);
            }
        }
    ?>
</body>
</html>