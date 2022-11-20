<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    session_start();
    include 'comprueba.php';
    comprobarSiInicia();
    include 'poo.php';
    $usuario = new Usuario();
    $usuario->isLogged();
    echo $usuario->getContraseña();
?>
<body>
    <div id='header'>
        <p>Bienvenido <?php 
            echo $usuario->getUsuario();
        ?></p>
    </div>

    <div id='form'>
        <!-- formulario inicio de sesion usuario y contraseña -->
        <form action="datos.php" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario">
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña">
            <?php
                if(isset($_SESSION['usuario2'])) {
                    echo "<input type='submit' value='Iniciar sesión' disabled>";
                } else {
                    echo "<input type='submit' value='Iniciar sesión'>";
                }
            ?>
            
        </form>
        <a href="./instagram.php">insta</a>
        <a href="./cerrarsesion.php">cerrar session</a>
    </div>
</body>
</html>