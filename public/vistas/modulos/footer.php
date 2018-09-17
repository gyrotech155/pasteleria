<footer class="main-footer">

	<section class="footer" id="footer">
		<div class="container">

			<div class="text-center">
							<?php
								$info = ControladorSitio::ctrMostrarRedesSociales();	
								foreach ($info as $redSocial) 
								{
									if (strcmp($redSocial['estado'], 'activo') === 0)
									{
										echo'<a href="'.$redSocial['cuenta'].'"> <img  src="'.$url.'vistas/img/'.$redSocial['nombre'].'.png" alt="30px" width="30px"></a>';	
									}	
								}
							?>
			</div>
			<p> Pasteleria Doña Lupe</p>
			<div align="center"><font color="white" align="centre">Copyright &copy;2018. Todos los derechos reservados.</font></div>
		</div>
	</section>



</footer>