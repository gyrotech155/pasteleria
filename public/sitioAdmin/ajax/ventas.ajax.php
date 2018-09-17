<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";


class AjaxVenta{

 
  /*==============================
  EDITAR STOCK
  ================================*/

  public $id_detalle_carrito;

  public function ajaxEditarVenta(){
    
    $item = "id_detalle_carrito";
    $valor = $this->id_detalle_carrito;
   

    $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);
    
    echo json_encode($respuesta);
  }

}

if(isset($_POST["id_detalle_carrito"])){

  $ediVenta = new AjaxVenta();
  $ediVenta -> id_detalle_carrito = $_POST["id_detalle_carrito"];
  $ediVenta-> ajaxEditarVenta();

}
