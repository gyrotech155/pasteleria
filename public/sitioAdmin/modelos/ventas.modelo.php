<?php

require_once "conexion.php";

class ModeloVentas{

  /*=============================================
	MOSTRAR ventas
	=============================================*/


		static public function mdlMostrarDetalleVentas1($item1, $item2, $valor1, $valor2){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM productos 
											INNER JOIN detalle_carrito ON productos.id=detalle_carrito.id_producto
											INNER JOIN carrito ON detalle_carrito.id_carrito=carrito.id_carrito 
											INNER JOIN usuarios ON usuarios.id=carrito.id_usuario
											WHERE $item1 = :$item1 AND $item2=:$item2");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt->close();
		$stmt = null;

		}

		static public function mdlMostrarDetalle(){


			$stmt = Conexion::conectar()->prepare("SELECT id_detalle_carrito,fecha_reserva,estado_reserva FROM  detalle_carrito ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt->close();
		$stmt = null;

		}


		static public function mdlMostrarVentas($item, $valor){


			$stmt = Conexion::conectar()->prepare("SELECT id_detalle_carrito, fecha_pedido,nombre, nombre_producto, cantidad, subtotal, fecha_reserva, estado_reserva FROM productos 
											INNER JOIN detalle_carrito ON productos.id=detalle_carrito.id_producto
											INNER JOIN carrito ON detalle_carrito.id_carrito=carrito.id_carrito 
											INNER JOIN usuarios ON usuarios.id=carrito.id_usuario
											WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
	

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt->close();
		$stmt = null;

		}


	

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function mdlIngresarVenta($tabla, $datos){

		
	}

	static public function mdlEditarVenta($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado_reserva=:estado_reserva WHERE id_detalle_carrito=:id_detalle_carrito");
        
      
		$stmt->bindParam(":id_detalle_carrito", $datos["id_detalle_carrito"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_reserva", $datos["estado_reserva"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

 }
