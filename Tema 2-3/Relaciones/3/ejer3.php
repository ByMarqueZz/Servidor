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
        $numeros = array();
        for($i=0; $i<=10; $i++) {
            array_push($numeros, round(rand(0, 1), 0));
        }
        
        foreach($numeros as $numero) {
            echo $numero;
        }
        
        $numeros_opuestos = array();
        foreach($numeros as $numero) {
            if($numero == 0) {
                array_push($numeros_opuestos, 1);
            }else{
                array_push($numeros_opuestos, 0);
            }
        }
        
        echo "<br>";
        
        foreach($numeros_opuestos as $numero) {
            echo $numero;
        }
    ?>
</body>
</html>