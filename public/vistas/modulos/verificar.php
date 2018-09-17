<!--=====================================
VERIFICAR
======================================-->

<?php

	$usuarioVerificado = false;
	
	$item = "EmailEncriptado";
	$valor =  $rutas[1];

	$respuesta = ControladorSitio::ctrMostrarUsuario($item, $valor);

	if($valor == $respuesta["emailEncriptado"]){

		$id = $respuesta["id"];
		$item2 = "verificacion";
		$valor2 = 0;

		$respuesta2 = ControladorSitio::ctrActualizarUsuario($id, $item2, $valor2);

		if($respuesta2 == "ok"){

			$usuarioVerificado = true;

		}

	}
		

?>

<div class="container">
	
	<div class="row">
	 
		<div class="col-xs-12 text-center verificar">
			
			<?php

				if($usuarioVerificado){
					echo '<div style="width:70%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px; margin-left:15%; margin-right:11%;">
						
						<center>
							
							<img style="padding:20px; width:25%" src="https://pastelerialupe.com/vistas/img/logo2.png">

						</center>

						<div style="position:relative; margin:auto; width:90%; background:white; padding:20px">
						
							<center>
							
							<img style="padding:20px; width:25%" src="https://pastelerialupe.com/vistas/img/icon-email.png">

							<h3 style="font-weight:100; color:#999;">GRACIAS!!!!</h3>

							<br>

							<hr style="border:1px solid #ccc; width:80%">


							<div style="line-height:60px; background:#ff005a; width:60%; color:white">¡Hemos verificado su correo electrónico, ya puede ingresar al sistema!</div>

								<a href="#" data-target="#modalIngreso" data-toggle="modal"><button class="btn btn-default backColor btn-lg">INGRESAR</button></a>

							<br>

							<hr style="border:1px solid #ccc; width:80%">

							</center>

						</div>';
				

				}else{

					echo '<h3>Error</h3>

					<h2><small>¡No se ha podido verificar el correo electrónico,  vuelva a registrarse!</small></h2>

					<br>

					<a href="#modalRegistro" data-toggle="modal"><button class="btn btn-default backColor btn-lg">REGISTRO</button></a>';


				}

			?>

		</div>

	</div>

</div>

