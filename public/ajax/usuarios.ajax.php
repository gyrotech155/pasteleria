<?php

require_once "../controladores/sitio.controlador.php";
require_once "../modelos/sitio.modelo.php";

class AjaxUsuarios{

	/*=============================================
	VALIDAR EMAIL EXISTENTE
	=============================================*/	

	public $validarEmail;

	public function ajaxValidarEmail(){

		$datos = $this->validarEmail;

		$respuesta = ControladorSitio::ctrMostrarUsuario("email", $datos);

		echo json_encode($respuesta);

	}

	/*=============================================
	REGISTRO CON FACEBOOK
	=============================================*/

	public $email;
	public $nombre;
	public $foto;

	public function ajaxRegistroFacebook(){

		$datos = array("nombre_usuario"=>$this->nombre_usuario,
					   "email"=>$this->email,
					   "foto"=>$this->foto,
					   "password"=>"null",
					   "modo"=>"facebook",
					   "verificacion"=>0,
					   "emailEncriptado"=>"null");
		$respuesta = ControladorSitio::ctrRegistroRedesSociales($datos);

		echo $respuesta;

	}	

	
}
/*=============================================
VALIDAR EMAIL EXISTENTE
=============================================*/	

if(isset($_POST["validarEmail"])){

	$valEmail = new AjaxUsuarios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();

}

/*=============================================
REGISTRO CON FACEBOOK
=============================================*/


if(isset($_POST["email"])){

	$regFacebook = new AjaxUsuarios();
	$regFacebook -> email = $_POST["email"];
	$regFacebook -> nombre_usuario = $_POST["nombre_usuario"];
	$regFacebook -> foto = $_POST["foto"];
	$regFacebook -> ajaxRegistroFacebook();

}

