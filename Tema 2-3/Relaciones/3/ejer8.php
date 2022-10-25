<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $datos = array(
            "primero" => array(101, "Juan Antonio", "Marquez", 666555444, 10/03/2003),
            "segundo" => array(120, "Antonio", "Marquez2", 666553131, 10/03/2004),
            "tercero" => array(122, "Antonio Juan", "Marquez3", 661553131, 10/03/2024)
        );

        function mostrarDatos($array) {
            foreach($array as $profesor) {
                foreach($profesor as $dato) {
                    echo $dato."<br>";
                }
            }
        }
        
        array_map(mostrarDatos($datos), $datos);


    ?>
</body>
</html>