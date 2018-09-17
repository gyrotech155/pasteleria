<?php

require_once "conexion.php";

class ModeloAdminInicio{


  /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function mdlMostrarInfo($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


/*=============================================
	EDITAR DESCRIPCION
	=============================================*/

	static public function mdlEditarDescripcion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion =:descripcion, img = :img, fecha = :fecha WHERE id = :id");

		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
    

}