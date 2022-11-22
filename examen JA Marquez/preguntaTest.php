<?php
    require_once 'pregunta.php';
    class preguntaTest extends pregunta {
        private $enunciado;
        private $respuestas;
        private $respuestaCorrecta;

        public function __construct($enunciado, $respuestas, $respuestaCorrecta){
            parent::__construct('[test]');
            $this->enunciado = $enunciado;
            $this->respuestas = $respuestas;
            $this->respuestaCorrecta = $respuestaCorrecta;
        }
        // metodos
        public function preguntar(){
            echo "<b>". parent::getTipo() ."</b>$this->enunciado";
            echo "<ol>";
            foreach($this->respuestas as $respuesta){
                echo "<li>$respuesta</li>";
            }
            echo "</ol>";
            echo "<lavel><b>Respuesta: </b></label>";
            echo "<select name='respuestas[]'>";
            echo "<option value='1'>a</option>";
            echo "<option value='2'>b</option>";
            echo "<option value='3'>c</option>";
            echo "<option value='4'>d</option>";
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