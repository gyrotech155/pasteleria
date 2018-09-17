<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";


class TablaVentas{

  /*=============================================
  MOSTRAR LA TABLA DE Ventas
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item1 = "fecha_reserva";
 	$valor1 = "2018-09-20";
 	$item2 = "estado_reserva";
 	$valor2 = "pendiente";
    //traigo vem
 	$detalles = ControladorVentas::ctrMostrarDetalleVentas1($item1,$item2, $valor1, $valor2);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($detalles); $i++){
	
			
				
				$colorEstado = "btn-danger";
				$textoEstado = "Pendiente";
				$estado_reserva = "pendiente";

$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estado_reserva='".$estado_reserva."' id_detalle_carrito='".$detalles[$i]["id_detalle_carrito"]."'>".$textoEstado."</button>";


$acciones="<button class='btn btn-warning btnEditarVenta' id_detalle_carrito='".$detalles[$i]['id_detalle_carrito']."' data-toggle='modal' data-target='#modalEditarVenta'><Span class = 'glyphicon glyphicon-pencil'> </ span></button>";

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$detalles[$i]["fecha_pedido"].'",
				      "'.$detalles[$i]["nombre"].'",
				      "'.$detalles[$i]["nombre_producto"].'",
				      "'.$detalles[$i]["cantidad"].'",
				      "'.$detalles[$i]["subtotal"].'",
				      "'.$detalles[$i]["fecha_reserva"].'",
				      "'. $estado.'",
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
$activar = new TablaVentas();
$activar -> mostrarTabla();
