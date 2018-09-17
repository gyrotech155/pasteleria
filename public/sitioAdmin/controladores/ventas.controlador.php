<?php

class ControladorVentas{



	/*=============================================
	MOSTRAR DETALLE
	=============================================*/

	static public function ctrMostrarDetalleVentas1($item1, $item2, $valor1, $valor2){


		$respuesta = ModeloVentas::mdlMostrarDetalleVentas1($item1, $item2, $valor1, $valor2);

		return $respuesta;

	}

	static public function ctrEditarVenta(){ 
	
		if(isset($_POST["id_detalle_carrito"])){

			
					$datos = array("id_detalle_carrito"=>$_POST["id_detalle_carrito"],
								  "estado_reserva"=>$_POST["estado_reserva"]);

	
		$respuesta = ModeloVentas::mdlEditarVenta("detalle_carrito", $datos);
		var_dump($respuesta);
		
		if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "la venta fue modificada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ventas";

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


	static public function ctrMostrarDetalle(){


		$respuesta = ModeloVentas::mdlMostrarDetalle();

		return $respuesta;

	}

}