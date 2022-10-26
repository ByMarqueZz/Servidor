<?php
    // crear la clase perro con los atributos raza, color y nombre
    class Perro {
        private $tamaño;
        private $raza;
        private $color;
        private $nombre;
        // constructor
        public function __construct($tamaño, $raza, $color, $nombre) {
            try {
                if(count($nombre > 21)) {
                    throw new Exception("El nombre del perro no puede tener más de 21 caracteres");
                }
                $this->tamaño = $tamaño;
                $this->raza = $raza;
                $this->color = $color;
                $this->nombre = $nombre;
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        // getters
        public function getRaza() {
            return $this->raza;
        }
        public function getColor() {
            return $this->color;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getTamaño() {
            return $this->tamaño;
        }
        // setters
        public function setRaza($raza) {
            $this->raza = $raza;
        }
        public function setColor($color) {
            $this->color = $color;
        }
        public function setNombre($nombre) {
            try {
                if(count($nombre > 21)) {
                    throw new Exception("El nombre del perro no puede tener más de 21 caracteres");
                }
                $this->nombre = $nombre;
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        public function setTamaño($tamaño) {
            $this->tamaño = $tamaño;
        }
        // método speak
        public function speak() {
            echo 'Guau, guau';
        }
        // método mostrar_propiedades
        public function mostrar_propiedades() {
            echo 'Tamaño: ' . $this->tamaño . '<br />';
            echo 'Raza: ' . $this->raza . '<br />';
            echo 'Color: ' . $this->color . '<br />';
            echo 'Nombre: ' . $this->nombre . '<br />';
        }
    }
    // creamos los perros
    $labrador = new Perro(100.10, 'Labrador', 'Café', 'Firulais');
    $caniche = new Perro(30.12, 'Caniche', 'Blanco', 'Pirulí');
    $husky = new Perro(80.99, 'Husky', 'Blanco', 'Lobo');
    // añadir los perros a un array
    $perros = array($labrador, $caniche, $husky);
?>