<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- formulario de registro -->
    <form action="#" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" id="contraseña">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="perfil">Perfil</label>
        <input type="text" name="perfil" id="perfil">
        <input type="submit" value="Registrarse">
    </form>
    <a href="./index.php">Inciar sesión</a>
    <?php
        // Inicio de sesión
        session_start();
        // Si se envía el formulario
        if (isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['nombre']) && isset($_POST['perfil'])) {
            // Incluir la clase Usuario
            include 'class.php';
            // Crear un objeto Usuario
            $usuario = new Usuario();
            // Si el usuario existe
            if ($usuario->registrar($_POST['usuario'], $_POST['contraseña'], $_POST['nombre'], $_POST['perfil'])) {
                // Crear la sesión
                $_SESSION['usuario'] = $_POST['usuario'];
            }
        }
    ?>
</body>
</html>