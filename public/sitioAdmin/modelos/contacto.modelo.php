<?php

require_once "conexion.php";

class ModeloContacto{


  /*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function mdlMostrarContacto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


/*=============================================
	EDITAR DESCRIPCION
	=============================================*/

	static public function mdlEditarContacto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET direccion =:direccion, telefono =:telefono, localidad=:localidad, provincia=:provincia WHERE id = 1");

		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad", $datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
    

}