<?php

require_once "conexion.php";

class ModeloRedSocial{


  /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function mdlMostrarRedesSociales($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla" );

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


/*=============================================
	EDITAR DESCRIPCION
	=============================================*/

	static public function mdlEditarRedSocial($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cuenta =:cuenta , estado=:estado WHERE id = :id");

		$stmt->bindParam(":cuenta", $datos["cuenta"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
    

}