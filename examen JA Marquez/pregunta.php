<?php
    abstract class pregunta{
        protected $tipo;
        public function __construct($tipo){
            $this->tipo = $tipo;
        }
        public function getTipo(){
            return $this->tipo;
        }
        abstract public function preguntar();
        abstract public function responder($respuesta);
    }
?>