/*=======================================
TABLA PARA MOSTRAR stock
=========================================*/
$(".tablaStock").DataTable({
	 "ajax": "ajax/tablaStock.ajax.php",
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
		
		"sInfoPostFix":    "",
		
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
	
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	 }


});
/*=========================================
			EDITAR Stock
==========================================*/

$(".tablaStock tbody").on("click",".btnEditarStock",function(){
	console.log("hola");
	var id_dia=$(this).attr("id_dia");
	var datos = new FormData();
	datos.append("id_dia",id_dia);
    console.log("chau");
	$.ajax({
		url:"ajax/stock.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	console.log("respuesta",respuesta);

	    	$("#modalEditarStock .id_dia").val(respuesta["id_dia"]);
	    	$("#modalEditarStock .dia").val(respuesta["dia"]);
	   	    $("#modalEditarStock .stock").val(respuesta["stock"]);

	  
	    	
	    }
	})

})
