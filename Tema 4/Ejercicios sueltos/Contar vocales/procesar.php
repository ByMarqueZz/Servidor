<?php
        $dir_subida = './archivos/';
        $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);

        // echo '<pre>';
        if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }

        print "</pre>";
        // Contamos cada caracter
        $fich = fopen("./archivos/".$_FILES['fichero_usuario']['name'], "r");
        $fich2 = fopen("./archivos/cambiado.txt", "w");
        if ($fich === False){
            echo "No se encuentra el fichero o no se pudo leer<br>";
        }else{
            $a = 0;
            $e = 0;
            $i = 0;
            $o = 0;
            $u = 0;
            while( !feof($fich) ){
                $car = strtolower(fgetc($fich));			
                if ($car == 'a') {
                    $a++;
                    fwrite($fich2, $_POST['caracter']);
                } elseif ($car == 'e') {
                    $e++;
                    fwrite($fich2, $_POST['caracter']);
                } elseif ($car == 'i') {
                    $i++;
                    fwrite($fich2, $_POST['caracter']);
                } elseif ($car == 'o') {
                    $o++;
                    fwrite($fich2, $_POST['caracter']);
                } elseif ($car == 'u') {
                    $u++;
                    fwrite($fich2, $_POST['caracter']);
                } else {
                    fwrite($fich2, $car);
                }
            }
            echo "Hay ".$a." a<br>";
            echo "Hay ".$e." e<br>";
            echo "Hay ".$i." i<br>";
            echo "Hay ".$o." o<br>";
            echo "Hay ".$u." u<br>";
            
        }
        fclose($fich);
        header('Location: ./descarga.php');
        // header("Content-disposition: attachment; filename=descarga.txt");
        // header('Content-Type: application/force-download');
        // readfile("./archivos/cambiado.txt");


    ?>