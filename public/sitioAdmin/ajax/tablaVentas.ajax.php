<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";


class TablaVentas{

  /*=============================================
  MOSTRAR LA TABLA DE Ventas
  =============================================*/ 
public $estado_reserva;
 	public function mostrarTabla(){	

 	$item1 = "fecha_reserva";
 	$valor1 = "2018-09-20";
 	$item2 = "estado_reserva";
 	$valor2 = $this->estado_reserva;
    //traigo vem
 	$detalles = ControladorVentas::ctrMostrarDetalleVentas1($item1,$item2, $valor1, $valor2);	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($detalles); $i++){


		/*	if( $detalles[$i]["estado_reserva"] == "pendiente"){
				
				$colorEstado = "btn-danger";
				$textoEstado = "pendiente";
				$estado_venta = "pendiente";

			}else{  	if( $detalles[$i]["estado_reserva"] == "parcial"){
							
							$colorEstado = "btn-warning";
							$textoEstado = "Parcial";
							$estado_venta = "parcial";

						}else{

							$colorEstado = "btn-success";
							$textoEstado = "Entregado";
							$estado_venta = "entregado";

						}


			}
	*/
			
				
			

//$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estado_reserva='".$estado_venta."' id_detalle_carrito='".$detalles[$i]["id_detalle_carrito"]."'>".$textoEstado."</button>";


$acciones="<button class='btn btn-warning btnEditarVenta' id_detalle_carrito='".$detalles[$i]['id_detalle_carrito']."' data-toggle='modal' data-target='#modalEditarVenta'><Span class = 'glyphicon glyphicon-pencil'> </ span></button>";

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$detalles[$i]["fecha_pedido"].'",
				      "'.$detalles[$i]["nombre"].'",
				      "'.$detalles[$i]["nombre_producto"].'",
				      "'.$detalles[$i]["cantidad"].'",
				      "'.$detalles[$i]["subtotal"].'",
				      "'.$detalles[$i]["fecha_reserva"].'",
				     "'.$detalles[$i]["estado_reserva"].'",
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
$activar-> estado_reserva= $_GET["estado_reserva"];
$activar -> mostrarTabla();
