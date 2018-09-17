<?php

require_once "../controladores/stock.controlador.php";
require_once "../modelos/stock.modelo.php";


class AjaxStock{

 
  /*==============================
  EDITAR STOCK
  ================================*/

  public $id_dia;

  public function ajaxEditarStock(){
    
    $item = "id_dia";
    $valor = $this->id_dia;

    $respuesta = ControladorStock::ctrMostrarStock($item, $valor);

    echo json_encode($respuesta);
  }

}

if(isset($_POST["id_dia"])){

  $ediStock = new AjaxStock();
  $ediStock -> id_dia = $_POST["id_dia"];
  $ediStock -> ajaxEditarStock();

}


