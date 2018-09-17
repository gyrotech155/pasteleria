<?php

class ControladorStock{

    /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function ctrMostrarStock($item, $valor){

		$tabla = "stock_productos";

		$respuesta = ModeloStock::mdlMostrarStock($tabla,$item, $valor);

		return $respuesta;

	}

}