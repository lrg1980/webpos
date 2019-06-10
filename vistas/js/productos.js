/** ============================================ 
 *      Cargar la tabla dinamica de productos
==============================================*/
// $.ajax({

//      url: "ajax/datatable-productos.ajax.php",
//      success: function (respuesta) {
//           console.log("respuesta", respuesta);
          
//      }
// })

$('.tablasProductos').DataTable({
     "ajax": "ajax/datatable-productos.ajax.php",
     "deferRender": true,
     "retrieve": true,
     "processing": true,
     "language": {
          "sProcessing":      "Procesando....",
          "sLengthMenu":      "Mostrar _MENU_ registros",
          "sZeroRecords":     "No se encontraron resultados",
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

/** CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO */
$("#nuevaCategoria").change(function () {

	var idCategoria = $(this).val();

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({

		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			
			if (!respuesta) {
				var nuevoCodigo = idCategoria + "01";
				$("#nuevoCodigo").val(nuevoCodigo);
			} else {
				
				var nuevoCodigo = Number(respuesta["codigo"]) + 1;
				$("#nuevoCodigo").val(nuevoCodigo);
				
			}

		}
	})

})

/** AGREGANDO PRECIO DE VENTA AUTOMATICAMENTE CON % */
$("#nuevoPrecioCompra").change(function () {
	
	if ($(".porcentaje").prop("checked")) {
		
		var valorPorcentaje = $(".nuevoPorcentaje").val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje / 100))+Number($("#nuevoPrecioCompra").val());
		//console.log("porcentaje", porcentaje);

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly", true);

	}
	
})

/** SI NUEVO PORCENTAJE CHEQUEADO CAMBIA, PRECIO VENTA DEBE CAMBIAR AUTOMATICAMENTE */
$(".nuevoPorcentaje").change(function () {
	if ($(".porcentaje").prop("checked")) {
		
		var valorPorcentaje = $(".nuevoPorcentaje").val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje / 100))+Number($("#nuevoPrecioCompra").val());
		//console.log("porcentaje", porcentaje);

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly", true);

	}
})

$(".porcentaje").on("ifUnchecked",function(){
	
	$("#nuevoPrecioVenta").prop("readonly",false);
	
}) 

$(".porcentaje").on("ifChecked",function(){
	
	$("#nuevoPrecioVenta").prop("readonly",true);
	
})

// <!--===========================================
// =            Subir foto de producto           =
// ============================================-->
$(".nuevaImagen").change(function(){

	var imagen = this.files[0];

	// <!--=====================================================
	// =            Validar el formato de la imagen            =
	// ======================================================-->
	
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
		$(".nuevaImagen").val("");

			Swal.fire({
				title: "Error al subir la imagen",
				text: "La imagen debe ser formato JPG o PNG",
				type: "error",
				confirmButtonText: "Cerrar"
			});
	// <!--=====================================================
	// =            Validar el peso de la imagen               =
	// ======================================================-->
	}else if(imagen["size"] > 1000000){
		$(".nuevaImagen").val("");
			Swal.fire({
				title: "Error al subir la imagen",
				text: "La imagen debe ser menor a 2MB",
				type: "error",
				confirmButtonText: "Cerrar"
			});
	}else{
		// <!--=====================================================
		// =            Mostrar previsualización imagen            =
		// ======================================================-->
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;
			
			$(".previsualizar").attr("src", rutaImagen);

		})

	}

})

