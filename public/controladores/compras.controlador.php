<?php

class ControladorCompras{

	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

	static public function ctrMostrarCompras($item, $valor){

		$tabla = "carrito";

		$respuesta = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR DETALLE
	=============================================*/

	
	static public function ctrMostrarDetalleCompras($item1, $item2, $valor1, $valor2){


		$respuesta = ModeloCompras::mdlMostrarDetalleCompras($item1, $item2, $valor1, $valor2);

		return $respuesta;

	}


}