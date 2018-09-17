<?php
require_once "conexion.php";

class ModeloStock{

  /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarStock($tabla, $item, $valor){

		if($item != null){
			//solicito una categoria

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else { //solicito todas las categorias

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_dia ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

 }
