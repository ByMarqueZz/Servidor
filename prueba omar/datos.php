<?php
    $usuarios = array(
        "francisco" => array(
                        "contraseña" => "123456",
                        "nombre" => "Francisco",
                        "apellido1" => "Gonzalez",
                        "apellido2" => "Ruiz",
                        "edad" => 18,
                        "fecha_alta" => "2022-09-27"),
        "paco" => array(
                        "contraseña" => "paquito1",
                        "nombre" => "Paco",
                        "apellido1" => "Mondejar",
                        "apellido2" => "Perez",
                        "edad" => 22,
                        "fecha_alta" => "2021-05-27"),
        "marquez" => array(
                        "contraseña" => "Marquez1003",
                        "nombre" => "Juan Antonio",
                        "apellido1" => "Márquez",
                        "apellido2" => "Ruiz",
                        "edad" => 19,
                        "fecha_alta" => "2022-10-11")
    );
    // Array donde se guardan todos los libros
    $libros = array(
        "1234567890123" => array(
                            "numUnidades" => 2,
                            "titulo" => "Don quijote",
                            "editorial" => "El Libro",
                            "año_edicion" => 2002,
                            "autores" => array(
                                "nombre" => "Jose",
                                "apellido1" => "Piñero",
                                "apellido2" => "Piñero")),
        "2131523423424" => array(
                            "numUnidades" => 13,
                            "titulo" => "Harry Potter",
                            "editorial" => "Howargs",
                            "año_edicion" => 2007,
                            "autores" => array(
                                "nombre" => "Pepe",
                                "apellido1" => "Viyuela",
                                "apellido2" => "Martinez")),
        "75646464564562" => array(
                            "numUnidades" => 1,
                            "titulo" => "50 sombras de Grey",
                            "editorial" => "Casa del libro",
                            "año_edicion" => 2018,
                            "autores" => array(
                                "nombre" => "Francisco",
                                "apellido1" => "García",
                                "apellido2" => "García")),
        "99988794554121" => array(
                            "numUnidades" => 22,
                            "titulo" => "Diccionario español",
                            "editorial" => "Vox",
                            "año_edicion" => 2012,
                            "autores" => array(
                                "nombre" => "Alfredo",
                                "apellido1" => "Martínez",
                                "apellido2" => "Martínez")),
    );
    // Array donde se guardan todos los prestamos
    $prestamos = array(
        "0" => array(
            "ISBN" => "75646464564562",
            "usuario" => "marquez",
            "fecha_ini" => "2022-09-19",
            "fecha_fin" => "2022-10-24"),
        "1" => array(
            "ISBN" => "99988794554121",
            "usuario" => "marquez",
            "fecha_ini" => "2022-09-10",
            "fecha_fin" => "2022-10-01"),
        "2" => array(
            "ISBN" => "2131523423424",
            "usuario" => "paco",
            "fecha_ini" => "2021-09-10",
            "fecha_fin" => "2021-10-01")
    );

    function login($usu, $pw, $usuarios) {
        try {
            if (empty($pw)) {
                throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.");
            }
            $login = false;
            foreach($usuarios as $clave => $valor) {
                if ($usu == $clave) {
                    if($pw == $valor["contraseña"]) {
                        $login = true;
                    }
                } 
            }
            return $login;
        } catch (Exception $e){
            echo "Error encontrado: ", $e->getMessage();
        }
    } 

    function escribeUsuario($usu, $usuarios) {
        try {
            $login = false;
            foreach($usuarios as $clave => $valor) {
                if ($usu == $clave) {
                    $login = true;
                    $nombre = $valor['nombre'];
                    $apellido1 = $valor['apellido1'];
                    $apellido2 = $valor['apellido2'];
                    $edad = $valor['edad'];
                    $fecha = $valor['fecha_alta'];
                }
            }
            if ($login == false) {
                throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
            }
            echo "<ul><li>".$apellido1.' '.$apellido2.', '.$nombre.' ('.$edad.' años)</li><br>';
            echo "<li>Está con nosotros desde el ".$fecha."</li></ul><br>";

        } catch(Exception $e) {
            echo "Error encontrado: ", $e->getMessage();
        }
    }

    function escribePrestamos($usu, $usuarios, $prestamos, $libros) {
        try{
            $login = false;
            foreach($usuarios as $clave => $valor) {
                if ($usu == $clave) {
                    $login = true;
                }
            }
            if ($login == false) {
                throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
            }
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td colspan='5'>Prestamos realizados por $usu</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>ISBN</td>";
            echo "<td>Titulo</td>";
            echo "<td>Fecha de inicio</td>";
            echo "<td>Fecha de fin</td>";
            echo "<td>Retraso</td>";
            echo "</tr>";
            foreach ($prestamos as $array) {
                if ($usu == $array['usuario']) {
                    echo "<tr>";
                    echo "<td>".$array['ISBN']."</td>";
                    echo "<td>".$libros[$array['ISBN']]['titulo']."</td>";
                    echo "<td>".$array['fecha_ini']."</td>";
                    echo "<td>".$array['fecha_fin']."</td>";
                    echo $array['fecha_fin']<"2022-10-18"?"<td>SI</td>":"<td>NO</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }catch(Exception $e) {
            echo "Error encontrado: ", $e->getMessage();
        }
    }

    /*
    APUNTES
    */

    // foreach($valor as $dato => $value) {
    // }
    // for ($i=0;$i<10;$i++) {}
    // $funcion = () => $_GET['usuario']?echo 'hola': echo 'adios';
    // try{
    //     if ("a" != false) {
    //         throw new Exception("MENSAJE QUE TU QUIERAS");
    //     }
    // } catch(Exception $e) {
    //     echo "Mensaje de error", $e->getMessage();
    // }
?>