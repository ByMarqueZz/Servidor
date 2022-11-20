<?php
function comprobarSiInicia() {
        if(isset($_COOKIE['nombre'])) {
            $_SESSION['usuario2'] = $_COOKIE['nombre'];
        }
    }
?>