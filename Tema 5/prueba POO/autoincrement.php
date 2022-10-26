<?php
    class Producto {
        private $id;
        private $nombre;
        private $precio;
        private static $contador = 0;
        // constructor
        public function __construct($nombre, $precio) {
            $this::$contador++;
            $this->id = $this::$contador;
            $this->nombre = $nombre;
            $this->precio = $precio;
        }
        // getters
        public function getId() {
            return $this->id;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getPrecio() {
            return $this->precio;
        }
        // setters
        public function setId($id) {
            $this->id = $id;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setPrecio($precio) {
            $this->precio = $precio;
        }

    }
    // instancia 10 objetos de la clase producto
    $productos = array();
    for ($i=0;$i<10;$i++) {
        $productos[$i] = new Producto("Producto ".($i+1), rand(1, 100));
    }
    // recorremos el array de objetos
    foreach ($productos as $producto) {
        echo $producto->getId() . ' - ' . $producto->getNombre() . ' - ' . $producto->getPrecio() . '<br />';
    }
?>