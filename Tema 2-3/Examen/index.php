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
        margin: 0 auto;
        text-align: center;
       }
       table {
        text-align: center;
        margin: 0 auto;
       }
    </style>
    <?php include('./datos.php');?>
</head>
<body>
    <form action="index.php" method="get">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">
        <br><br>
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña">
        <br><br>
        <input type="submit" value="Acceder">
    </form>
    <?php
        // Primero comprobamos si se ha enviado el formulario
        if (isset($_GET['usuario'])) {
            try {
                // Comprobamos si ha iniciado sesión correctamente
                // Si lo hace llama a las demas funciones para pintar
                // Por pantalla los libros y datos
                // Si no lo hace salta la excepción de usuario no existente
                $sesion = login($_GET['usuario'], $_GET['contraseña'], $usuarios);
                if ($sesion == 1) {
                    echo "<br><br>";
                    escribeUsuario($_GET['usuario'], $usuarios);
                    echo "<br><br>";
                    escribePrestamos($_GET['usuario'], $libros, $prestamos, $usuarios);
                } else {
                    throw new Exception("ERROR DEL SISTEMA: Usuario o contraseña incorrecta.<br>");
                }
            } catch (Exception $e) {
                echo "Excepción capturada: ", $e->getMessage();
            }
        }
    ?>
</body>
</html>