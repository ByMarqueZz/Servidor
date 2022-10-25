<?php
	echo "<h1>Crea aquí tu archivo XML</h1>";
	echo "<br />";
	echo "<b>Consideraciones a tener en cuenta:</b>";
	echo "<ul>";
	echo "<li>Puede no haber profesores asignados a una asignatura. En ese caso no se crea el nodo correspondiente.</li>";
	echo "<li>RECORDATORIO php: Si no hay profes, el array no existe. Que no es lo mismo a que esté vacío. Usa isset.</li>";
	echo "<li>Guarda el fichero en la misma carpeta del script con el nombre <i>asignaturas.xml</i>. Después, lo muestras en el navegador</li>";
	echo "<li><b>Versión 1.0</b>: Crea un archivo XML nuevo por cada ejecución del script.</li>";
	echo "<li><b>Versión 2.0</b>: Ir acumulando asignaturas en el XML cuando se llame al script. Para ello, deberás comprobar si existe el archivo para abrirlo, cargarlo en un objeto simpleXML y añadir la nueva asignatura.</li>";
	echo "</ul>";
	echo "<a href='#' onclick='history.go(-1);'>Ir atrás</a>";

	/*PROGRAMA HECHO POR JUAN ANTONIO MÁRQUEZ Y OMAR QNEIBY */


	function creaXML() {
			/*
			Se encarga de abrir y escribir el archivo XML
			*/
			if(file_exists("./asignaturas.xml")) {
				// Si existe leemos el xml y lo guardamos en un SimpleXMLElement
				$string = file_get_contents('./asignaturas.xml');
				$sxe = new SimpleXMLElement($string);

			} else {
				$string = <<<XML
				<asignaturas>
				</asignaturas>
				XML;
				
				$sxe = new SimpleXMLElement($string);
			}
			// Se añaden los hijos junto con el dato de la asignatura
			$asignatura = $sxe->addChild('asignatura');
			$asignatura->addChild('codigo', $_POST['codigo']);
			$asignatura->addChild('nombre', $_POST['nombre']);
			$asignatura->addChild('duracion', $_POST['duracion']);
			$asignatura->addChild('tipo', $_POST['tipo']);
			// Llamamos a la función para ver si existen profesores a guardar
			$profesores = guardaProfesores();
			// Profesores Titulares
			if(!empty($profesores[0])) {
				for ($i=0;$i<count($profesores[0]);$i++) {
					$profesoresT = $asignatura->addChild('profesoresT');
					$profesoresT->addChild('dni', $profesores[0][$i][0]);
					$profesoresT->addChild('nombre', $profesores[0][$i][1]);
					$profesoresT->addChild('apellidos', $profesores[0][$i][2]);
				}
			}
			// Profesores de Prácticas
			if(!empty($profesores[1])) {
				for ($i=0;$i<count($profesores[1]);$i++) {
					$profesoresP = $asignatura->addChild('profesoresP');
					$profesoresP->addChild('dni', $profesores[1][$i][0]);
					$profesoresP->addChild('nombre', $profesores[1][$i][1]);
					$profesoresP->addChild('apellidos', $profesores[1][$i][2]);
				}				
			}
			// Guardamos el archivo
			$sxe->asXML('asignaturas.xml');
	}

	function guardaProfesores() {
		/*
		Guarda los profesores ya ordenados en dos arrays
		y a su vez los devuelve en un array principal
		*/
		$profesoresT = array();
		$profesoresP = array();
		if(isset($_POST['titDNI'])) {
			for ($i=0;$i<count($_POST['titDNI']);$i++) {
				// añadimos al array todos los profesores titulares
				array_push($profesoresT, array($_POST['titDNI'][$i], $_POST['titNombre'][$i], $_POST['titApellidos'][$i]));
			}
		}
		if(isset($_POST['pracDNI'])) {
			for ($i=0;$i<count($_POST['pracDNI']);$i++) {
				array_push($profesoresP, array($_POST['pracDNI'][$i], $_POST['pracNombre'][$i], $_POST['pracApellidos'][$i]));
			}
		}
		return array($profesoresT, $profesoresP);
	}

	function escribeXML($xml){
		/*
		Pinta por pantalla el xml pasado por parámetro
		*/
		echo "<ul>";
		foreach($xml as $k=>$v){
			if($v->children()){
				echo "<li>" . $k . "</li>";
				escribeXML($v);
			}else{
				echo "<li>" . $k . "=" . $v . "</li>";
				
			}
		}
		echo "</ul>";
	}

	creaXML();
	$xml = simplexml_load_file("./asignaturas.xml");
	escribeXML($xml);
?>