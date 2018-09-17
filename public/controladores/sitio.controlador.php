<?php

class ControladorSitio{


 	public function index(){

		require "vistas/index.php";
	}

	static public function ctrMostrarSobreNosotros(){

		$tabla = "informacion";

		$respuesta = ModeloSitio::mdlMostrarSobreNosotros($tabla);

		return $respuesta;
	}

	static public function ctrMostrarContacto(){

		$tabla = "contacto";

		$respuesta = ModeloSitio::mdlMostrarContacto($tabla);

		return $respuesta;
	}

	static public function ctrMostrarRedesSociales(){

		$tabla = "redessociales";

		$respuesta = ModeloSitio::mdlMostrarRedesSociales($tabla);

		return $respuesta;

	}


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	public function ctrRegistroUsuario(){

		$rutaFoto='';
		if(isset($_POST["regUsuario"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){
				

			   	if(isset($_FILES["regPhoto"]["tmp_name"]) && !empty($_FILES["regPhoto"]["tmp_name"])){       
					$ruta_fichero_origen = $_FILES['regPhoto']['tmp_name'];
					$rutaFoto =  'vistas/img/usuarios/' . $_FILES['regPhoto']['name'];

					move_uploaded_file ( $ruta_fichero_origen, $rutaFoto);

				} 


			   	$encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');/*encriptar contraseña con tipo blowfish*/

			   	$encriptarEmail = md5($_POST["regEmail"]);

				$datos = array("nombre"=>$_POST["regUsuario"],
							   "password"=> $encriptar,
							   "email"=> $_POST["regEmail"],
							   "foto"=>$rutaFoto,
							   "modo"=> "directo",
							   "verificacion"=>1,
							   "emailEncriptado"=>$encriptarEmail);

				$tabla = "usuarios";

				$respuesta = ModeloSitio::mdlRegistroUsuario($tabla, $datos);

				if($respuesta == "ok"){

					/*=============================================
					VERIFICACIÓN CORREO ELECTRÓNICO
					=============================================*/

					date_default_timezone_set("America/Argentina/Salta");//defino zona horaria

					$url = Ruta::ctrRuta();	
					var_dump($url);
					$mail = new PHPMailer;

					$mail->CharSet = 'UTF-8';

					$mail->isMail();

					$mail->setFrom('cintialupemartinez@pastelerialupe.com', 'PATELERIA DOÑA LUPE');

					$mail->addReplyTo('cintialupemartinez@pastelerialupe.com', 'PATELERIA DOÑA LUPE');

					$mail->Subject = "Por favor verifique su dirección de correo electrónico";

					$mail->addAddress($_POST["regEmail"]);

					$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
						
						<center>
							
							<img style="padding:20px; width:10%" src="https://pastelerialupe.com/vistas/img/logo2.png">

						</center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
						
							<center>
							
							<img style="padding:20px; width:15%" src="https://pastelerialupe.com/vistas/img/icon-email.png">

							<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

							<hr style="border:1px solid #ccc; width:80%">

							<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta en PASTELERIA LUPE, debe confirmar su dirección de correo electrónico</h4>

							<a href="https://www.pastelerialupe.com/verificar/'.$encriptarEmail.'" target="_blank" style="text-decoration:none">

							<div style="line-height:60px; background:#ff005a; width:60%; color:white">Verifique su dirección de correo electrónico</div>

							</a>

							<br>

							<hr style="border:1px solid #ccc; width:80%">

							<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

							</center>

						</div>

					</div>');

					$envio = $mail->Send();

					if(!$envio){

						echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

					}else{

						echo '<script> 

							swal({
								  title: "¡OK!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

					}

				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloSitio::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	REGISTRO CON REDES SOCIALES
	=============================================*/

	static public function ctrRegistroRedesSociales($datos){
		$tabla = "usuarios";
		$item = "email";
		$valor = $datos["email"];
		$emailRepetido = false;

		$respuesta0 = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);
		if($respuesta0){

			if($respuesta0["modo"] != $datos["modo"]){

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡El correo electrónico '.$datos["email"].', ya está registrado en el sistema.",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

				$emailRepetido = false;

			}

			$emailRepetido = true;

		}else{

			$respuesta1 = ModeloSitio::mdlRegistroUsuario($tabla, $datos);

		}

		if($emailRepetido || $respuesta1 == "ok"){

			$respuesta2 = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);

			if($respuesta2["modo"] == "facebook"){

				session_start();

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $respuesta2["id"];
				$_SESSION["nombre"] = $respuesta2["nombre"];
				$_SESSION["foto"] = $respuesta2["foto"];
				$_SESSION["email"] = $respuesta2["email"];
				$_SESSION["password"] = $respuesta2["contraseña"];
				$_SESSION["modo"] = $respuesta2["modo"];

				echo "ok";

			}else if($respuesta2["modo"] == "google"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $respuesta2["id"];
				$_SESSION["nombre"] = $respuesta2["nombre"];
				$_SESSION["foto"] = $respuesta2["foto"];
				$_SESSION["email"] = $respuesta2["email"];
				$_SESSION["password"] = $respuesta2["password"];
				$_SESSION["modo"] = $respuesta2["modo"];

				echo "<span style='color:white'>ok</span>";

			}

			else{

				echo "";
			}

		}
	}



	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloSitio::mdlMostrarUsuario($tabla, $item, $valor);
				if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["contraseña"] == $encriptar){
					if($respuesta["verificacion"] == 1){

						echo'<script>

							swal({
								  title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico '.$respuesta["email"].'!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';

					}else{

						$_SESSION["validarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["contraseña"];
						$_SESSION["modo"] = $respuesta["modo"];

						echo '<script>
							
							window.location = localStorage.getItem("rutaActual");

						</script>';

					}

				}else{

					echo'<script>
								
							swal({
								  title: "¡ERROR AL INGRESAR!",
								  text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = localStorage.getItem("rutaActual");
									  } 
							});

							</script>';

				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al ingresar al sistema, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}

	
}

