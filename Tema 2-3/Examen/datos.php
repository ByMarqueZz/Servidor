<?php
    // Array donde se guardan todos los usuarios
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
            "fecha_fin" => "2022-10-14"),
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

    // Funciones
    function login($usu, $pw, $usuarios) {
        // Recorremos los usuarios y si coincide con el nombre
        // Recorremos sus datos para acceder a la contraseña
        // En caso de que no inicie sesión saltamos la excepción
        try{
            if(empty($pw)) {
                throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.<br>");
            }
            $login = false;
            foreach ($usuarios as $nombre_usu => $array) {
                if ($usu == $nombre_usu) {
                    if ($pw == $array['contraseña']) {
                        $login = true;
                    }
                }
            }
            return $login;
        }catch (Exception $e) {
            echo "Excepción capturada: ", $e->getMessage();
        }
        
    }

    function escribeUsuario($usu, $usuarios) {
        // Recorremos los usuarios y si coincide con el nombre
        // Recorremos sus datos para pintarlos por pantalla
        // En caso de que no exista saltamos la excepción
        try {
            $usuarioExiste = false;
            foreach ($usuarios as $nombre_usu => $array) {
                if ($usu == $nombre_usu) {
                    $usuarioExiste = true;
                    echo "<ul>";
                    echo "<li>".$array['apellido1']." ".$array['apellido2'].", ".$array['nombre']." ( ".$array['edad']." años)</li>";
                    echo "<li> Está con nosotros desde el ".$array['fecha_alta']."</li>";
                    echo "</ul>";
                }
            }
            if ($usuarioExiste == false) {
                throw new Exception("ERROR DEL SISTEMA: El usuario no existe.<br>");
            }
        }catch (Exception $e) {
            echo "Excepción capturada: ", $e->getMessage();
        }
    }

    function escribePrestamos($usu, $libros, $prestamos, $usuarios) {
        // Recorremos los usuarios para buscar los libros prestados
        // Pintamos los datos en una tabla
        // En caso de que no exista saltamos la excepción
        try {
            $usuarioExiste = false;
            foreach ($usuarios as $nombre_usu => $array) {
                if ($usu == $nombre_usu) {
                    $usuarioExiste = true;
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td colspan='5'>Prestamos realizados por $nombre_usu</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>ISBN</td>";
                    echo "<td>Título</td>";
                    echo "<td>Fecha de inicio</td>";
                    echo "<td>Fecha de fin</td>";
                    echo "<td>Retrasado</td>";
                    echo "</tr>";
                    foreach ($prestamos as $prestamo) {
                        if ($prestamo['usuario'] == $usu) {
                            echo "<tr>";
                            echo "<td>".$prestamo['ISBN']."</td>";
                            echo "<td>".$libros[$prestamo['ISBN']]['titulo']."</td>";
                            echo "<td>".$prestamo['fecha_ini']."</td>";
                            echo "<td>".$prestamo['fecha_fin']."</td>";
                            echo $prestamo['fecha_fin']>'2022-10-11'?'<td>NO</td>':'<td>SI</td>';
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                }
            }
            if ($usuarioExiste == false) {
                throw new Exception("ERROR DEL SISTEMA: El usuario no existe.<br>");
            }
        } catch (Exception $e) {
            echo "Excepción capturada: ", $e->getMessage();
        }
    }
?>