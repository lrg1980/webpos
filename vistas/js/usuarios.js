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