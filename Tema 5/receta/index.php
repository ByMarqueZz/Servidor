<html>
 <head>
  <title>Ejemplo de uso de recetas orientadas a objetos</title>
  <meta charset="UTF-8" />
  <script language="javascript">
  <!--
	function addingrediente(){
		//Creamos tres objetos option para los select Cantidad, Unidad y Nombre de ingrediente
		var optCant = document.createElement('option');
		var optUnid = document.createElement('option');
		var optNomb = document.createElement('option');
		//Referenciamos a los tres select de los ingredientes
		var selectCant=document.getElementById('cantidad');
		var selectUni=document.getElementById('unidad');
		var selectNomb=document.getElementById('nombre');
		//Referenciamos a los tres cuadros de texto del ingrediente a añadir
		var textCant=document.getElementById('cant');
		var selectUnid=document.getElementById('unid');
		var textNomb=document.getElementById('nomb');

		if(textCant.value.trim() == '' || textNomb.value.trim() == ''){
			alert('Por favor, introduce una cantidad, unidad y nombre de ingrediente');
		}else{
			//Damos los valores al option Cantidad (value y etiqueta)
			optCant.value = textCant.value;
			optCant.innerHTML = textCant.value;
			//Damos los valores al option Unidades (value y etiqueta)			
			optUnid.value = selectUnid.value;
			optUnid.innerHTML = selectUnid.value;
			//Damos los valores al option Nombre (value y etiqueta)			
			optNomb.value = textNomb.value;
			optNomb.innerHTML = textNomb.value;
			//Añadimos cada option al select correspondiente
			selectCant.appendChild(optCant);
			selectUni.appendChild(optUnid);
			selectNomb.appendChild(optNomb);
			//Borramos el contenido de los campos de texto
			textCant.value='';
			//textNombre.value='';
			textNomb.value='';
		}
	}
	
	function envia(){
		var f=document.getElementById('formulario');
		var preparacion=document.getElementById('preparacion');
		var comensales=document.getElementById('comensales');
		if(preparacion.value.trim()==''){
			alert('Por favor, Explica cómo se hace la receta');
		}else{
			if(comensales.value.trim()==''){
				alert('Por favor, dime para cuantos comensales quieres la receta');
				comensales.focus();
			}else{
				var selectCant=document.getElementById('cantidad');
				var selectUni=document.getElementById('unidad');
				var selectNomb=document.getElementById('nombre');
				if(selectCant.length==0){
					alert('Por favor, añade algún ingrediente');
				}else{
					for(i=0;i<selectCant.length;i++){
						selectCant.options[i].selected=true;
						selectUni.options[i].selected=true;
						selectNomb.options[i].selected=true;
					}
					f.submit();
				}
			}
		}
	}
  -->
  </script>
  <style>
	textarea{
		width: 608px;
		height: 100px;
	}
	.select {
		width: 200px;
		height: 100px;
	}
  </style>
 </head>
 
 <body>
  <h1>Crear Receta</h1>
  <form action="procesaPDF.php" method="get" id="formulario">
	<label>Ingrediente: (Cantidad, unidad, nombre)</label><br />
	<input type="text" name="cant" id="cant" />
	<select name="unid" id="unid">
	 <option value="gr">Gramos<option>
	 <option value="Kg">KiloGramos<option>
	 <option value="pizca">Pizca<option>
	 <option value="">unidades/piezas<option>
	</select>
	<input type="text" name="nomb" id="nomb" />
	<input type="button" value="Añadir" onclick="javascript: addingrediente();" /><br />
	<select multiple="multiple" name="cantidad[]" id="cantidad" class="select">
	</select>
	<select multiple="multiple" name="unidad[]" id="unidad" class="select">
	</select>
	<select multiple="multiple" name="nombre[]" id="nombre" class="select">
	</select><br />
	<br /><label>Preparación</label><br />
	<textarea name="preparacion" id="preparacion">
	</textarea><br /><br />
	<label>Generar la receta para: </label>
	<input type="text" name="comensales" id="comensales" />
	<label>comensales y enviarla a:</label>
	<input type="text" name="destinatario" id="destinatario" /><br />
	<input type="button" value="Ver receta" onClick="javascript:envia();"/>
  </form>
<?php
	if(isset($_GET["cant"])){
		echo "<h1>Receta para " . $_GET["comensales"] . " comensales</h1>";
		include_once "receta.php";
		$r = new receta($_GET["preparacion"]);
		foreach($_GET["cantidad"] as $k => $v){
			$i = new ingrediente($v,$_GET["unidad"][$k],$_GET["nombre"][$k]);
			$r->addingrediente($i);
		}
		$r->creaReceta($_GET["comensales"]);
		echo $r;
	}
?>
 </body>
</html>