<?php

require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";


class TablaVentas1{

  /*=============================================
  MOSTRAR LA TABLA DE Ventas
  =============================================*/ 

 	public function mostrarTabla1(){	

 	$item1 = "id_usuario";
 	 $valor1 = "43";
 	//$valor1 = $_SESSION["id"];
 	$item2 = "estado_reserva";
 	$valor2 = "parcial";
    //traigo vem
 	$detalles = ControladorCompras::ctrMostrarDetalleCompras($item1,$item2, $valor1, $valor2);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($detalles); $i++){
	
			
				
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$detalles[$i]["fecha_pedido"].'",
				      "'.$detalles[$i]["nombre"].'",
				       "'.$detalles[$i]["nombre_producto"].'",
				      "'.$detalles[$i]["cantidad"].'",
				      "'.$detalles[$i]["subtotal"].'",
				      "'.$detalles[$i]["fecha_reserva"].'",
				        
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
$activar = new TablaVentas1();
$activar -> mostrarTabla1();
