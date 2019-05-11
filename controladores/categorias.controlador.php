<?php 

class ControladorCategorias {
		 
	/**=====================================
	 * 				CREAR CATEGORÍAS
	 *====================================*/

	 static public function ctrCrearCategoria(){

		if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				$tabla = "categorias";

				$datos = $_POST["nuevaCategoria"];

				$respuesta = ModeloCategorias::mdlCrearCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

							Swal.fire({
								type: "success",
								title: "¡La categoría ha sido creada correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
								}).then(function(result){
									if(result.value){

									window.location = "categorias";
									
									}
							})

					</script>';

				}

			
			}else {

				echo'<script>

						Swal.fire({
							type: "error",
							title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then(function(result){
								if(result.value){

								window.location = "categorias";
								
								}
						})

				</script>';

			}
		
		}

	}

	/**=====================================
	 * 					MOSTRAR CATEGORÍAS
	 =====================================*/

	 static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
		
	 }

}