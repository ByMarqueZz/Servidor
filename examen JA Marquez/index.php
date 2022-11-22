<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego preguntas</title>
</head>
<body>
    <h1>Juego de preguntas OO</h1>
    <?php
        if (isset($_COOKIE['puntuacion'])) {
            echo "<p>Última puntuación: " . $_COOKIE['puntuacion'] . "</p>";
        } else {
            echo "<p>No has jugado todavía</p>";
        }
    ?>
    <form action="procesar.php" method="post">
        <?php
            require 'juegoPreguntas.php';
            $juego = new juegoPreguntas('juego.txt');
            $juego->cargarPreguntas('juego.txt');
            $juego->jugar();
        ?>
        <input type="submit" value="Enviar respuestas">
    </form>
</body>
</html>