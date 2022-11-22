<?php
    require_once 'preguntaTest.php';
    require_once 'preguntaVF.php';
    class juegoPreguntas{
        private $preguntas;
        private $puntuacion;

        public function __construct(){
            $this->preguntas = array();
            $this->puntuacion = 0;
        }
        // metodos
        public function cargarPreguntas($rutaFichero){
            // cargar preguntas desde el fichero
            $fichero = fopen($rutaFichero, 'r');
            while(!feof($fichero)){
                $linea = fgets($fichero);
                $datos = explode(';', $linea);
                if($datos[0] == '[test]'){
                    $datos[6] = str_replace("\n", '', $datos[6]);
                    $pregunta = new preguntaTest($datos[1], [$datos[2], $datos[3], $datos[4], $datos[5]], $datos[6]);
                    $this->preguntas[] = $pregunta;
                } else if($datos[0] == '[vf]'){
                    $datos[2] = str_replace("\n", '', $datos[2]);
                    $pregunta = new preguntaVF($datos[1], $datos[2]);
                    $this->preguntas[] = $pregunta;
                }
            }
        }
        public function jugar(){
            // jugar al juego
            foreach($this->preguntas as $pregunta){
                $pregunta->preguntar();
            }
        }
        public function corregir($respuestas) {
            foreach ($this->preguntas as $key => $pregunta) {
                $this->puntuacion += $pregunta->responder($respuestas[$key]);
            }
            // guardar la puntuacion en una cookie
            setcookie('puntuacion', $this->puntuacion, time() + 3600);
            return $this->puntuacion;
        }
        public function numPreguntas(){
            return count($this->preguntas);
        }
    }
?>