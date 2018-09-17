<?php

require_once "../controladores/stock.controlador.php";
require_once "../modelos/stock.modelo.php";


class TablaStock{

  /*=============================================
  MOSTRAR LA TABLA DE Stock
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;
    //traigo el total de stocks existentes
 	$dias = ControladorStock::ctrMostrarStock($item, $valor);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($dias); $i++){
	


		 	$acciones="<button class='btn btn-warning btnEditarStock' id_dia='".$dias[$i]['id_dia']."' data-toggle='modal' data-target='#modalEditarStock'><Span class = 'glyphicon glyphicon-pencil'> </ span></button>";

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$dias[$i]["dia"].'",
				      "'.$dias[$i]["stock"].'",
				      
				      "'.$acciones.'"    
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1); //quita el ultimo caracter; la coma al final

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE STOCK
=============================================*/ 
$activar = new TablaStock();
$activar -> mostrarTabla();