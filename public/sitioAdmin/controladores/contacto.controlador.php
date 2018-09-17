<?php

class ControladorContacto{

    /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function ctrMostrarContacto(){

		$tabla = "contacto";

		$respuesta = ModeloContacto::mdlMostrarContacto($tabla);

		return $respuesta;

	}


	static public function ctrEditarContacto(){

		if(isset($_POST["telefono"])&&isset($_POST["direccion"])){
				/*=============================================
				Datos
				=============================================*/

					$datos = array(
						"direccion"=>$_POST['direccion'],
						"telefono"=> $_POST["telefono"],
						"localidad"=>$_POST['localidad'],
						"provincia"=> $_POST["provincia"],
								   );							   
				
				$respuesta = ModeloContacto::mdlEditarContacto("contacto", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Su contacto ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "contactos";

							}
						})

					</script>';


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡No es posible guardar si algun dato esta vacio!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}
		}
	}

}