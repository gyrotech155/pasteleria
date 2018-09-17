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


	
	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarStock($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock=:stock WHERE id_dia=:id_dia");

		$stmt->bindParam(":id_dia", $datos["id_dia"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

 }
