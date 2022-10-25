<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <hr>
    <h1>Boletín de notas</h1>
    <hr>
    <table>
        <?php
            $mediaTotalArray = array();
            include ("array.php");
            echo "<tr>";
            echo "<td>Asignatura</td>";
            echo "<td>Trimestre 1</td>";
            echo "<td>Trimestre 2</td>";
            echo "<td>Trimestre 3</td>";
            echo "<td>Media</td>";
            echo "</tr>";
            // Recorremos el array pintando la clave y los valores
            foreach ($contenido as $clave => $valor) {
                echo "<tr>";
                echo "<td>$clave</td>";
                // Pintamos y sumamos las notas para la media
                $suma = 0;
                foreach ($valor as $i) {
                    echo "<td>$i</td>";
                    $suma += $i;
                }
                $media = round((($suma) / count($valor)), 2);
                echo "<td>".$media."</td>";
                echo "</tr>";
                // Añadimos la media a un array para calcular la media total
                array_push($mediaTotalArray, $media);
            }
        ?>
    </table>
    <?php
        // Calculamos la media total sumando todas las medias y dividiendolas
        // entre la longitud del array de las medias 
        $suma = 0;
        foreach ($mediaTotalArray as $j) {
            $suma += $j;
        }
        $mediaTotal = round($suma / count($mediaTotalArray), 2);
        echo "<h2>La media total es $mediaTotal</h2>";
    ?>
</body>
</html>
