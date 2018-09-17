<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/adminInicio.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/contacto.controlador.php";
require_once "controladores/redesSociales.controlador.php";
require_once "controladores/stock.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/rutas.php";
require_once "modelos/administradores.modelo.php";
require_once "modelos/adminInicio.modelo.php";
require_once "modelos/categoria.modelo.php";
require_once "modelos/producto.modelo.php";
require_once "modelos/contacto.modelo.php";
require_once "modelos/redSocial.modelo.php";
require_once "modelos/stock.modelo.php";
require_once "modelos/ventas.modelo.php";

$plantilla=new ControladorPlantilla();
$plantilla->plantilla();

