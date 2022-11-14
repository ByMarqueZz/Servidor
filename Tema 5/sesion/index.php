<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- formulario inicio de sesion usuario contraseña -->
    <form action="#" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" id="contraseña">
        <input type="submit" value="Iniciar sesión">
    </form>
    <a href="./registrate.php">Registrate</a>
    <!-- utiliza el metodo logout -->
    <a href="./logout.php">Cerrar sesión</a>
    <?php
        // Inicio de sesión
        session_start();
        // Si se envía el formulario
        if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
            // Incluir la clase Usuario
            include 'class.php';
            // Crear un objeto Usuario
            $usuario = new Usuario();
            // Si el usuario existe
            if ($usuario->login($_POST['usuario'], $_POST['contraseña'])) {
                // Crear la sesión
                $_SESSION['usuario'] = $_POST['usuario'];
                echo 'Has iniciado sesión';
            } else {
                // Mostrar mensaje de error
                echo 'Usuario o contraseña incorrectos';
            }
        }
        var_dump($_SESSION);
    ?>
</body>
</html>