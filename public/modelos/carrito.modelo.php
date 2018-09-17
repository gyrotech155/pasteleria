<?php

require_once "conexion.php";

class ModeloCarrito{

	/*=============================================
	NUEVAS COMPRAS
	=============================================*/

	static public function mdlNuevasCompras($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario,fecha_pedido,total,estado) VALUES (:id_usuario, :fecha_pedido, :total, :estado)");

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_pedido", $datos["fecha_pedido"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);


		if($stmt->execute()){ 
			$respuesta= array(
							"id"=>1,
							"resp"=>"ok"
						);
			return $respuesta; 

		}else{ 

			$respuesta= array(
							"id"=>0,
							"resp"=>"error"
						);
			return $respuesta;
		}

		$stmt->close();

		$stmt =null;
	}

	static public function mdlDetalleCompra($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_carrito, id_producto, cantidad, subtotal, fecha_reserva, estado_reserva ) VALUES ( :id_carrito, :id_producto, :cantidad, :subtotal, :fecha_reserva, :estado_reserva )");

		$stmt->bindParam(":id_carrito", $datos["id_carrito"], PDO::PARAM_STR);
		$stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_reserva", $datos["fecha_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_reserva", $datos["estado_reserva"], PDO::PARAM_STR);


		if($stmt->execute()){ 

			return "ok"; 

		}else{ 

			return "error"; 

		}

		$stmt->close();

		$stmt =null;
	}

	static public function mdlCantidadReserva(){

		$stmt = Conexion::conectar()->prepare("SELECT fecha_reserva,COUNT(fecha_reserva) as cant FROM detalle_carrito GROUP BY fecha_reserva");

		$stmt -> execute();

		return $stmt -> fetchAll();

	$stmt->close();
	$stmt = null;

	}

}