<?php
require_once "ingrediente.php";
class receta{
	private $ingredientes;
	private $proceso;
	private $numComensales;
	
	public function __construct($p,$nComensales=1){
		$this->ingredientes = array();
		$this->proceso = $p;
		$this->numComensales = $nComensales;
	}
	
	public function addIngrediente($i){
		array_push($this->ingredientes,$i);
	}
	
	public function creaReceta($nComensales){
		foreach($this->ingredientes as $i)
			$i->calcularCant($nComensales);
		$this->numComensales = $nComensales;
	}
	
	public function __toString(){
		$str =  "<h3>Ingredientes</h3>";
		$str .= "<ul>";
		foreach($this->ingredientes as $i)
			$str .= "<li>$i</li>";
		$str .= "</ul>";
		$str .= "<h3>Proceso</h3>";
		$str .= "<p>" . $this->proceso . "</p>";
		return $str;
	}
}
?>