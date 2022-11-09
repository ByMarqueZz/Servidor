<?php
include_once "recetaPDF.php";

$r = new recetaPDF();
$r->AddPage();
$r->crearCarta($_GET["destinatario"],$_GET["comensales"]);
$r->crearIngredientes($_GET["cantidad"],$_GET["unidad"],$_GET["nombre"]);
$r->crearPreparacion($_GET["preparacion"]);
$r->Output();
?>