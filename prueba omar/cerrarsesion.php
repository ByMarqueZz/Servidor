<?php
    session_start();
    // borrar la cookie
    setcookie('nombre', 'omar', time() - 60 * 60 * 24 * 365);
    session_destroy();
    include './index.php';
?>