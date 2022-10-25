<?php
    header("Content-disposition: attachment; filename=descarga.txt");
    header('Content-Type: application/force-download');
    readfile("./archivos/cambiado.txt");
?>