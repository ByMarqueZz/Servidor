<?php
    class Usuario {
        private $us;
        private $pw;
        private $nombre;
        private $perfil;

        public function __construct($us='', $pw='', $nombre='', $perfil='') {
            $this->us = $us;
            $this->pw = $pw;
            $this->nombre = $nombre;
            $this->perfil = $perfil;
            $this->estado = false;
        }
        // Getters
        public function getUs() {
            return $this->us;
        }
        public function getPw() {
            return $this->pw;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getPerfil() {
            return $this->perfil;
        }
        // Setters
        public function setUs($us) {
            $this->us = $us;
        }
        public function setPw($pw) {
            $this->pw = $pw;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setPerfil($perfil) {
            $this->perfil = $perfil;
        }
        // Métodos
        public function login($us, $pw) {
            $isLogin = false;
            $file = fopen('usuarios.txt', 'r');
            while (!feof($file)) {
                $linea = fgets($file);
                $datos = explode(';', $linea);
                if ($datos[0] == $us && $datos[1] == $pw) {
                    $this->us = $datos[0];
                    $this->pw = $datos[1];
                    $this->nombre = $datos[2];
                    $this->perfil = $datos[3];
                    $this->estado = true;
                    $isLogin = true;
                }
            }
            return $isLogin;
        }
        // registrar usuario
        public function registrar($us, $pw, $nombre, $perfil) {
            $isRegister = false;
            $file = fopen('usuarios.txt', 'a');
            $linea = "\n" . $us . ';' . $pw . ';' . $nombre . ';' . $perfil;
            if (fwrite($file, $linea)) {
                $isRegister = true;
            }
            fclose($file);
            return $isRegister;
        }
        // cerrar sesión
        public function logout() {
            $this->us = '';
            $this->pw = '';
            $this->nombre = '';
            $this->perfil = '';
            $this->estado = false;
            session_destroy();
        }
        // esta logueado
        public function isLogin() {
            return $this->estado;
        }
    }
    
?>