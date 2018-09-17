<?php

class ControladorRedesSociales{

    /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function ctrMostrarRedesSociales(){

		$tabla = "redessociales";

		$respuesta = ModeloRedSocial::mdlMostrarRedesSociales($tabla);

		return $respuesta;

	}


	static public function ctrEditarRedSocial(){

		if(isset($_POST["cuenta"])&&isset($_POST["estado"])){
				/*=============================================
				Datos
				=============================================*/

					$datos = array("id"=>$_POST["id"],
								   "cuenta"=>$_POST['cuenta'],
								   "estado"=>$_POST['estado']);								   
				


				$respuesta = ModeloRedSocial::mdlEditarRedSocial("redessociales", $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Su Res Social ha sido editada correctamente",
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
