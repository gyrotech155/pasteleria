<?php

class ControladorPaginaPrincipal{

    /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function ctrMostrarInfo(){

		$tabla = "informacion";

		$respuesta = ModeloAdminInicio::mdlMostrarInfo($tabla);

		return $respuesta;

	}


	static public function ctrEditarDescripcion(){

		if(isset($_POST["descripcionPasteleria"])){

			

				/*=============================================
				VALIDAR IMAGEN 
				=============================================*/

				$rutaFoto = $_POST["antiguaFoto"];
				

				if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO
					=============================================*/

					unlink($_POST["antiguaFoto"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);

					$nuevoAncho = 640;
					$nuevoAlto = 430;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["foto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaFoto = "vistas/img/".date('Y-m-d').".jpg";

						$origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFoto);

					}

					if($_FILES["foto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaFoto = "vistas/img/".date('Y-m-d').".png";

						$origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFoto);

					}


				}

				/*=============================================
				Datos
				=============================================*/

					$datos = array("id"=>1,
								   "descripcion"=> $_POST["descripcionPasteleria"],
								   "img"=>$rutaFoto,								   
								   "fecha"=>date('Y-m-d'));					


				


				$respuesta = ModeloAdminInicio::mdlEditarDescripcion("informacion", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La informacion se ha modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "paginaPrincipal";

							}
						})

					</script>';

				

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La descripcion no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

	  }

	}
}

