<?php
//Clase recetaPDF que sirve para generar el documento PDF con la receta
include_once "fpdf.php";

class recetaPDF extends FPDF{
	
	public function __construct(){
		parent::__construct("P","mm","A4");
	}
	
	public function crearCarta($nombre,$nComensales){
		$this->SetFont('Arial','',16);
		$this->write(5,'Estimado amigo/a ' . $nombre . ', te envio esta receta para que la elabores con tus seres queridos. Esta pensada para ' . $nComensales .' comensales');
	}
	
	public function crearIngredientes($cantidad,$unidad,$nombre){
		$this->SetFont('Arial','',16);
		$this->write(5,'Lista de ingredientes:');
		$this->Ln();
		for ($i=0;$i<count($cantidad);$i++){
			$this->write(5, $cantidad[$i] . " " . $unidad[$i] . " de " . $nombre[$i]);
			$this->Ln();
		}
	}
	
	public function crearPreparacion($texto){
		
	}
}
?>