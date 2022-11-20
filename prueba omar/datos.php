<?php
    $nombre = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if ($nombre == 'omar' && $contraseña == '123') {
        $_SESSION['usuario2'] = $nombre;
        setcookie('nombre', 'omar', time() + 60 * 60 * 24 * 365);
        header('Location: index.php');
    } else {
        echo 'Usuario o contraseña incorrectos';
    }

    
?>