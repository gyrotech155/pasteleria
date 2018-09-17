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
    

   

   /*=============================================
	EDITAR STOCK
	=============================================*/

	static public function ctrEditarStock(){ 
	
		if(isset($_POST["id_dia"])){

			
					$datos = array("id_dia"=>$_POST["id_dia"],
								  "stock"=>$_POST["stock"]);

	
		$respuesta = ModeloStock::mdlEditarStock("stock_productos", $datos);
		var_dump();

		if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El stock fue modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "stock";

							}
						})

					</script>';

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El stock no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

		}
	}

}