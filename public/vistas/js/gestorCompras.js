/*=======================================
TABLA PARA MOSTRAR VENTAS
========================================*/
	var id_usuario=document.getElementById("id_usuario").value;
	//console.log(id_usuario);

$(".tablaComprasPendientes").DataTable({
	 
	 "ajax": {
	 	"url"  : "ajax/tablaCompras.ajax.php?id_usuario="+id_usuario+"&estado_reserva=pendiente",
	 	"type": "GET",
	 },
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "language": {

	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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

$(".tablaComprasParciales").DataTable({
	 "ajax": {
	 	"url"  : "ajax/tablaCompras.ajax.php?id_usuario="+id_usuario+"&estado_reserva=parcial",
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

$(".tablaComprasEntregados").DataTable({
	 "ajax": {
	 	"url"  : "ajax/tablaCompras.ajax.php?id_usuario="+id_usuario+"&estado_reserva=entregado",
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
			EDITAR Compra
==========================================*/

$(".tablaVentas tbody").on("click",".btnEditarVenta",function(){
	var id_detalle_carrito=$(this).attr("id_detalle_carrito");

	var datos = new FormData();
	datos.append("id_detalle_carrito",id_detalle_carrito);

	$.ajax({
		url:"ajax/ventas.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

	    	$("#modalEditarVenta .id_detalle_carrito").val(respuesta["id_detalle_carrito"]);
	    	$("#modalEditarVenta .estado_reserva").val(respuesta["estado_reserva"]);
	    	$("#modalEditarVenta .nombre").val(respuesta["nombre"]);
	    	$("#modalEditarVenta .cantidad").val(respuesta["cantidad"]);
	    	$("#modalEditarVenta .subtotal").val(respuesta["subtotal"]);
	    	$("#modalEditarVenta .fecha_reserva").val(respuesta["fecha_reserva"]);
	    	$("#modalEditarVenta .fecha_pedido").val(respuesta["fecha_pedido"]);
	    	
	    }
	})

})
