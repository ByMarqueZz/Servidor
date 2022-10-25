<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(66, 220, 251);
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        #contenido {
            text-align: center;
            background-color: white;
            padding: 1%;
        }
        select {
            margin: 1%;
            min-width: 100px;
        }

    </style>
    <?php
        // Inicializo variables a cadena vacia para cuando aún no se ha enviado el formulario
        $codigo = '';
        $nombre = '';
        $duracion = '';
        $tipo = '';
        $profesores = array(); 
        include('./datosCentro.php');
        if (isset($_GET['buscar'])) {
            // Guardo en cada variable el valor del array de la asignatura que busques
            $codigo = $_GET['buscar'];
            $nombre = $datos['asignatura'][$_GET['buscar']]['nombre'];
            $duracion = $datos['asignatura'][$_GET['buscar']]['duracion'];
            $tipo = $datos['asignatura'][$_GET['buscar']]['tipo'];
            foreach($datos['asignatura'][$_GET['buscar']]['profesores'] as $valor){
                array_push($profesores, $valor);
            };
        }
        
        function changePos($num) {
            if ($num == '4' || $num == '') {
                $num = '1';
            } else {
                $num = intval($num) + 1;
                parse_str($num);
            }
            return $num;
        }

        function changeNeg($num) {
            if ($num == '1' || $num == '') {
                $num = '4';
            } else {
                $num = intval($num) - 1;
                parse_str($num);
            }
            // header("location: index.php?$_GET['buscar']=$num");
            return $num;
        }

        function check($value, $tipo) {
            // Marca la casilla del tipo que sea la asignatura
            return $tipo==$value?'checked':'';
        }
    ?>
</head>
<body>
    <h1>Consulta de asignaturas</h1>
    <form action="./index.php" method="get">
        <label for="buscar">Buscar por código: </label>
        <input type="text" name="buscar" id="buscar">
        <input type="submit" value="Enviar">
    </form>
    <br><br>
    <div id="contenido">
        <?php
        echo "<label for='codigo'>Código: </label>";
        echo "<input type='text' name='codigo' id='codigo' value='$codigo'>";
        echo "<br>";
        echo "<label for='nombre'>Nombre: </label>";
        echo "<input type='text' name='nombre' id='nombre' value='$nombre'>";
        echo "<br>";
        echo "<label for='duracion'>Duración: </label>";
        echo "<input type='text' name='duracion' id='duracion' value='$duracion'>";
        echo "<br>";
        echo "<label for='tipo'>Tipo: </label>";
        echo "<input type='radio' name='tipo' value='troncal' " .check('troncal', $tipo)."> Troncal";
        echo "<input type='radio' name='tipo' value='obligatoria' " .check('obligatoria', $tipo). "> Obligatoria";
        echo "<input type='radio' name='tipo' value='optativa' " .check('optativa', $tipo). "> Optativa";
        echo "<br>";
        ?>
        <br>
        Profesores Titulares: &nbsp&nbsp&nbsp&nbsp Profesores de Prácticas:
        <br>
        <select name="profesorTitular" multiple size="3">
            <?php
                foreach ($profesores as $valor) {
                    echo "<option value=''>".$valor['nombre']." ".$valor['apellidos']." ".$valor['dni']."</option>";
                }
            ?>
        </select>
        <select name="profesorPracticas" multiple size="3">
            <?php
                foreach ($profesores as $valor) {
                    echo "<option value=''>".$valor['nombre']." ".$valor['apellidos']." ".$valor['dni']."</option>";
                }
                
            ?>
        </select>
        <br><br>
        <input type="button" value="<=Ant" onclick="document.location.href=index.php?buscar='<?php echo changeNeg($_GET['buscar']);?>'">
        <input type="button" value="Sig=>" onclick="changePos($_GET['buscar'])">
    </div>
</body>
</html>