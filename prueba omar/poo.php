<?php
    // crea la clase usuario con los atributos usuario y contraseña
    class Usuario {
        private $usuario;
        private $contraseña;
        protected $dorsal;
        // constructor de la clase
        public function __construct() {
            $this->usuario = '';
            $this->contraseña = '';
            $this->setDorsal();
        }
        // getters y setters
        public function getUsuario() {
            return $this->usuario;
        }
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
        public function getContraseña() {
            return $this->contraseña;
        }
        public function setContraseña($contraseña) {
            $this->contraseña = $contraseña;
        }
        private function setDorsal() {
            // numero aleatorio entre el 1 y el 99
            $this->dorsal = rand(1, 99);
        }
        public function getDorsal() {
            return $this->dorsal;
        }
        public function isLogged() {
            if (isset($_SESSION['usuario2'])) {
                $this->setUsuario($_SESSION['usuario2']);
                $this->setContraseña('123');
            } else {
                return false;
            }
        }
    }
    // crea la clase equipo de futbol con los atributos nombre, ciudad y año de fundacion
    class EquipoFutbol {
        private $nombre;
        private $ciudad;
        private $añoFundacion;
        private $jugadores;
        // constructor de la clase
        public function __construct($nombre, $ciudad, $añoFundacion) {
            $this->nombre = $nombre;
            $this->ciudad = $ciudad;
            $this->añoFundacion = $añoFundacion;
            $this->jugadores = array();
        }
        // getters y setters
        public function getNombre() {
            return $this->nombre;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function getCiudad() {
            return $this->ciudad;
        }
        public function setCiudad($ciudad) {
            $this->ciudad = $ciudad;
        }
        public function getAñoFundacion() {
            return $this->añoFundacion;
        }
        public function setAñoFundacion($añoFundacion) {
            $this->añoFundacion = $añoFundacion;
        }
        public function getJugadores() {
            return $this->jugadores;
        }
        public function setJugadores($jugador) {
            array_push($this->jugadores, $jugador);
        }
    }
    
?>