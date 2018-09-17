<?php

require_once "../controladores/carrito.controlador.php";
require_once "../modelos/carrito.modelo.php";

class AjaxCarrito{

	public $total;
	public $cantidadArray;
	public $valorItemArray;
	public $idProductoArray;
	public $fechaArray;
	public $id_usuario;

	public function ajaxCargarCompra(){

		$datos = array(
				"id_usuario"=>$this->id_usuario,
				"total"=>$this->total,
				"cantidadArray"=>$this->cantidadArray,
				"valorItemArray"=>$this->valorItemArray,
				"idProductoArray"=>$this->idProductoArray,
				"fechaArray"=>$this->fechaArray,
			);

		$respuesta = ControladorCarrito::ctrNuevasCompras($datos);

		echo $respuesta;


	}

}

if(isset($_POST["fechaArray"])){

	$reserva = new AjaxCarrito();

	$reserva-> total=$_POST["total"];
	$reserva-> cantidadArray=$_POST["cantidadArray"];
	$reserva-> valorItemArray=$_POST["valorItemArray"];
	$reserva-> idProductoArray=$_POST["idProductoArray"];
	$reserva-> fechaArray=$_POST["fechaArray"];
	$reserva-> id_usuario=$_POST["id_usuario"];

	$reserva -> ajaxCargarCompra();

}