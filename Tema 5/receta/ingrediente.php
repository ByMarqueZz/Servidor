<?php
class ingrediente{
	private $cantidad;
	private $unidad;
	private $nombre;
	
	public function __construct($c,$u="",$n){
		$this->cantidad = $c;
		$this->unidad = $u;
		$this->nombre = $n;
	}
	
	public function getCant(){
		return $this->cantidad;
	}
	
	public function getNom(){
		return $this->nombre;
	}
	
	public function calcularCant($nComensales){
		$this->cantidad *= $nComensales;
	}
	
	public function __toString(){
		return $this->cantidad . " " . $this->unidad . " de " . $this->nombre;
	}
}
?>