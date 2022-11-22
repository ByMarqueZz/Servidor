<?php
    require_once 'index.php';
    echo "Has acertado " . $juego->corregir($_POST['respuestas']) . " preguntas";
    echo "<br>";
    echo "<a href='index.php'>Volver a jugar</a>";
?>