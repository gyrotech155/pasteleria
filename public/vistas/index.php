<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>

<meta charset="UTF-8"/>

<title>Pasteleria Doña Lupe</title>
<?php
		session_start();
		$url = Ruta::ctrRuta();
		$admin = Ruta::ctrRutaServidor();
?>

<meta name="description" content="Pasteleria">
<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="<?php echo $url; ?>vistas/img/logoIco.ico" />

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>vistas/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/animate.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/carrito.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/theme.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">
<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/nav.css">


<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

</head>
<body style="background-image: url(<?php echo $url; ?>vistas/img/f5.jpg); background-repeat:repeat; background-size: 100% auto" >
<!--wrapper start-->
<div class="wrapper" id="wrapper">


	 <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

   <!-- jvectormap -->
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

  <!-- bootstrap slider -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- bootstrap tags input -->
  <link rel="stylesheet" href="vistas/plugins/tags/bootstrap-tagsinput.css">

   <!-- bootstrap datepicker -->
   <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <link rel="stylesheet" href="vistas/css/plantilla.css">

   <link rel="stylesheet" href="vistas/css/slide.css">



<?php
    
          include "modulos/barraSuperiorCabezera.php";

/*=============================================
CONTENIDO DINÁMICO
=============================================*/
$rutas = array();
$ruta = null;
$infoProducto = null;

if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);
	$ruta=strval($rutas[0]);
	if(  $ruta == "salir" 
	  || $ruta == "catalogo"
	  || $ruta == 'verificar'
	  || $ruta == 'enviarCorreo'
	  || $ruta == "carrito"
	  || $ruta == "compras"
	){
		include "modulos/".$ruta.".php";
	}else{
		//include "modulos/error404.php";
	}

}else{
	include "modulos/cuerpo.php";
}

?>

	<!--footer-->
	<!--<section class="footer" id="footer">
		<div class="container">
			<p> SofwareGym</p>
		</div>
	</section>-->
	<?php
    
          include "modulos/footer.php";

	?>
</div><!--wrapper end-->

<!--Javascripts-->
<input type="hidden" value="<?php echo $_SESSION['id'] ?>" id="id_usuario">
<input type="hidden" value="<?php echo $admin; ?>" id="urlOculta">
<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

<script src="<?php echo $url; ?>vistas/js/jquery.js"></script>
<script src="<?php echo $url; ?>vistas/js/modernizr.js"></script>
<script src="<?php echo $url; ?>vistas/js/bootstrap.js"></script>
<script src="<?php echo $url; ?>vistas/js/menustick.js"></script>
<script src="<?php echo $url; ?>vistas/js/parallax.js"></script>
<script src="<?php echo $url; ?>vistas/js/easing.js"></script>
<script src="<?php echo $url; ?>vistas/js/wow.js"></script>
<script src="<?php echo $url; ?>vistas/js/smoothscroll.js"></script>
<script src="<?php echo $url; ?>vistas/js/masonry.js"></script>
<script src="<?php echo $url; ?>vistas/js/imgloaded.js"></script>
<script src="<?php echo $url; ?>vistas/js/classie.js"></script>
<script src="<?php echo $url; ?>vistas/js/colorfinder.js"></script>
<script src="<?php echo $url; ?>vistas/js/gridscroll.js"></script>
<script src="<?php echo $url; ?>vistas/js/contact.js"></script>
<script src="<?php echo $url; ?>vistas/js/common.js"></script>
<script src="<?php echo $url; ?>vistas/js/usuarios.js"></script>
<script src="<?php echo $url; ?>ajax/usuarios.ajax.php"></script>
<script src="<?php echo $url; ?>vistas/js/carrito.js"></script>
<script src="<?php echo $url; ?>vistas/js/registroFacebook.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>
<script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>
 <!-- ChartJS -->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>

  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="<?php echo $admin; ?>vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

  <!-- Bootstrap slider http://seiyria.com/bootstrap-slider/-->
  <script src="<?php echo $admin; ?>vistas/plugins/bootstrap-slider/bootstrap-slider.js"></script>

  <!-- DataTables https://datatables.net/-->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

    <!-- bootstrap tags input https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/-->
  <script src="<?php echo $admin; ?>vistas/plugins/tags/bootstrap-tagsinput.min.js"></script>

   <!-- bootstrap datetimepicker http://bootstrap-datepicker.readthedocs.io-->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
      /* jQueryKnob */
      $('.knob').knob();
      /* SideBar Menu */
      $('.sidebar-menu').tree();
    });
    </script>


<script type="text/javascript">
jQuery(function($) {
$(document).ready( function() {
  //enabling stickUp on the '.navbar-wrapper' class
	$('.navbar-wrapper').stickUp({
		parts: {
		  0: 'banner',
		  1: 'aboutus',
		  2: 'contact'
		},
		itemClass: 'menuItem',
		itemHover: 'active',
		topMargin: 'auto'
		});
	});
});
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '660791084288623',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<!--=====================================
JS PERSONALIZADO
======================================-->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/gestorCompras.js"></script>

</body>
</html>