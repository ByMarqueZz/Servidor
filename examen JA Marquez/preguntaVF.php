<?php
    require_once 'pregunta.php';
    class preguntaVF extends pregunta {
        private $enunciado;
        private $respuestaCorrecta;

        public function __construct($enunciado, $respuestaCorrecta){
            parent::__construct('[vf]');
            $this->enunciado = $enunciado;
            $this->respuestaCorrecta = $respuestaCorrecta;
        }
        // metodos
        public function preguntar(){
            echo "<b>". parent::getTipo() ."</b>$this->enunciado";
            echo "<label><b>Respuesta: </b></label>";
            echo "<select name='respuestas[]'>";
            echo "<option value='V'>Verdadero</option>";
            echo "<option value='F'>Falso</option>";
            echo "</select>";
            echo "<br><br>";
        }
        public function responder($respuesta){
            if($respuesta == $this->respuestaCorrecta){
                return 1;
            } else {
                return 0;
            }
        }
    }
?>