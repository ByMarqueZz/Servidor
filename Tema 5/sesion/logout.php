<?php
    // Inicio de sesión
    session_start();
    // Incluir la clase Usuario
    include 'class.php';
    // Crear un objeto Usuario con el usuario de la sesión
    $usuario = new Usuario($_SESSION['usuario']);
    // Si el usuario existe
    $usuario->logout();
    header('Location: ./index.php');
?>