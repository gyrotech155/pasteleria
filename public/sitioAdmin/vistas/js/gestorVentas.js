/*=======================================
TABLA PARA MOSTRAR VENTAS
=========================================*/
$(".tablaVentasPendiente").DataTable({

	 "ajax": {
	 	"url"  : "ajax/tablaVentas.ajax.php?&estado_reserva=pendiente",
	 	"type": "GET",
	 },
	 
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	 }


});

$(".tablaVentasParcial").DataTable({
	  "ajax": {
	 	"url"  : "ajax/tablaVentas.ajax.php?&estado_reserva=parcial",
	 	"type": "GET",
	 },
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	 }


});

$(".tablaVentasEntregado").DataTable({
	  "ajax": {
	 	"url"  : "ajax/tablaVentas.ajax.php?&estado_reserva=entregado",
	 	"type": "GET",
	 },
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	 }


});
/*=========================================
			EDITAR Venta
==========================================*/

$(".tablaVentas tbody").on("click",".btnEditarVenta",function(){
	console.log("hola");
	var id_detalle_carrito=$(this).attr("id_detalle_carrito");
	var datos = new FormData();
		console.log("hola");
	datos.append("id_detalle_carrito",id_detalle_carrito);
    console.log(id_detalle_carrito);

	$.ajax({
		url:"ajax/ventas.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	       console.log("respuesta",respuesta[0]);
	    	$("#modalEditarVenta .id_detalle_carrito").val(respuesta[0]["id_detalle_carrito"]);
	    	$("#modalEditarVenta .nombre").val(respuesta[0]["nombre"]);
	    	$("#modalEditarVenta .nombre_producto").val(respuesta[0]["nombre_producto"]);
	    	$("#modalEditarVenta .cantidad").val(respuesta[0]["cantidad"]);
	    	$("#modalEditarVenta .subtotal").val(respuesta[0]["subtotal"]);
	    	$("#modalEditarVenta .fecha_reserva").val(respuesta[0]["fecha_reserva"]);
	    	$("#modalEditarVenta .fecha_pedido").val(respuesta[0]["fecha_pedido"]);
	    	$("#modalEditarVenta .estado_reserva").val(respuesta[0]["estado_reserva"]);

	  
	    	
	    }
	})

})
