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
    function isValid($password) {
        if(strlen($password) < 6 || strlen($password) > 15) {
            return false;
        }

        $contador_numeros = 0;
        $contador_mayusculas = 0;
        $contador_minuscula = 0;
        $contador_no_alfanumerico = 0;
        for($i=0; $i<strlen($password); $i++) {
            if(is_numeric($password[$i])) {
                $contador_numeros++;
                continue;
            }elseif(!ctype_alnum($password[$i])) {
                $contador_no_alfanumerico++;
                continue;
            }elseif($password[$i] === strtoupper($password[$i])) {
                $contador_mayusculas++;
            }else{
                $contador_minuscula++;
            }
        }

        if($contador_numeros > 0 && $contador_mayusculas > 0 && $contador_minuscula > 0 && $contador_alfanumerico > 0) {
            return true;
        }else{
            return false;
        }

    }

    echo isValid("123#Akdkd45");
    ?>
</body>
</html>