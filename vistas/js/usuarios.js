// <!--===========================================
// =            Subir foto de usuario            =
// ============================================-->

// $(document).ready(function(){	
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];

	// <!--=====================================================
	// =            Validar el formato de la imagen            =
	// ======================================================-->
	
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
		$(".nuevaFoto").val("");

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

		$(".nuevaFoto").val("");
			Swal.fire({
				title: "Error al subir la imagen",
				text: "La imagen debe ser menor a 1MB",
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

$(".btnEditarUsuario").click(function(){
	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			// console.log("respuesta", respuesta);
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]); // Mantiene el perfil que viene de la BD
			$("#fotoActual").val(respuesta["foto"]);

			$("#passwordActual").val(respuesta["password"]);

			if (respuesta["foto"] != "") {
				$(".previsualizar").attr("src", respuesta["foto"]);
			}
		}
	});
})

/**========================================
 *	 		ACITIVAR USUARIO
========================================*/
$(".btnActivar").click(function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
	datos.append("activarId", idUsuario);
	datos.append("activarUsuario", estadoUsuario);

	$.ajax({

		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {
			
		}
	})

	if (estadoUsuario == 0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario',1);
	
	} else {

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoUsuario',0);
		
	}

})