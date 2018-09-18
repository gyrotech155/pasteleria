<?php

require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";


class TablaCompras{

  /*=============================================
  MOSTRAR LA TABLA DE Ventas
  =============================================*/ 
    public $id_usuario;
    public $estado_reserva;

 	public function mostrarTabla(){	

 	$item1 = "id_usuario";
    $valor1 = $this->id_usuario;
 	$item2 = "estado_reserva";
 	$valor2 = $this->estado_reserva;


 	$detalles = ControladorCompras::ctrMostrarDetalleCompras($item1,$item2, $valor1, $valor2);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($detalles); $i++){
			
				
		 	$acciones="<button class='btn btn-warning btnEditarCompra' id_detalle_carrito='".$detalles[$i]['id_detalle_carrito']."' data-toggle='modal' data-target='#modalEditarCompra'><Span class = 'glyphicon glyphicon-pencil'> </span></button>";

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$detalles[$i]["fecha_pedido"].'",
				      "'.$detalles[$i]["nombre_producto"].'",
				      "'.$detalles[$i]["cantidad"].'",
				      "'.$detalles[$i]["subtotal"].'",
				      "'.$detalles[$i]["fecha_reserva"].'",
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
ACTIVAR TABLA DE 
=============================================*/ 
$activar = new TablaCompras();
$activar-> id_usuario= $_GET["id_usuario"];
$activar-> estado_reserva= $_GET["estado_reserva"];
$activar -> mostrarTabla();

