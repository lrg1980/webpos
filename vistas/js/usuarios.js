// <!--===========================================
// =            Subir foto de usuario            =
// ============================================-->
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

/**=============================================
 *              EDITAR USUARIO
 =============================================*/
$(document).on("click", ".btnEditarUsuario", function () {
    
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
        success:function(respuesta){
            
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
$(document).on("click", ".btnActivar", function () {

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
		success: function(respuesta){
            
            if(window.matchMedia("(max-width:767px)").matches) {
                
                Swal.fire({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "Cerrar"
                }).then(function (result) {
                        
                    if (result.value) {
                        
                        window.location = "usuarios";

					}
					
                });
                
            }
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

/**=========================================== 
*   	       ELIMINAR USUARIO
============================================*/
$(document).on("click", ".btnEliminarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");
    
    Swal.fire({
        title: "¿Estas seguro de eliminar el usuario?",
        text: "¡Si no lo está, puede cancelar la acción",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancel",
        confirmButtonText: "Si, eliminar usuario!"
    }).then(function(result){
            
        if (result.value) {
            
            window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

        }
    });

})



/**=========================================== 
*	       REVISAR USUARIO REGISTARADO
============================================*/

$("#nuevoUsuario").change(function(){
	
	$(".alert").remove();
	
    var usuario = $(this).val();

    var datos = new FormData();

    datos.append("validarUsuario", usuario);

        $.ajax({
            url:"ajax/usuarios.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
                
                if(respuesta){
                    
                    $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en el sistema</div>');

                    $("#nuevoUsuario").val("");


                } 

            }

	    })
})