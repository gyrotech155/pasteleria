<?php

require_once "controladores/sitio.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/carrito.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/stock.controlador.php";

require_once "modelos/sitio.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/producto.modelo.php";
require_once "modelos/carrito.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/stock.modelo.php";


require_once "extensiones/PHPMailer/PHPMailerAutoload.php";
require_once "extensiones/vendor/autoload.php";





$sitio = new ControladorSitio();
$sitio->index();

