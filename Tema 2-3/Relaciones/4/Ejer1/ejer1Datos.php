<?php
   $usuarios = array(
      array(
         "Nombre" => "paco",
         "Contraseña" => "paco"),
      array(
         "Nombre" => "pepe",
         "Contraseña" => "pepe123"),
      array(
         "Nombre" => "francisco",
         "Contraseña" => "miperro"));

   $condicion = False;
   foreach ($usuarios as $usuario) {
      if ($_POST['usuario'] == $usuario['Nombre'] && $_POST['contraseña'] == $usuario['Contraseña']) {
         $condicion = True;
      }
   }
   if ($condicion) {
      echo "Enhorabuena has iniciado sesión";
   } else {
      echo "Usuario y/o contraseña incorrecta";
   }
?>