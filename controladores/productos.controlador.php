<?php

class ControladorProductos{
     /**=============================
      *        MOSTRAR PRODUCTOS
      =============================*/

     static public function ctrMostrarProductos($item, $valor) {
          $tabla = "productos";

          $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
          
          return $respuesta;
          
     }

     /**=============================
      *        CREAR PRODUCTOS
      =============================*/
     static public function ctrCrearProducto(){

          if(isset($_POST["nuevaDescripcion"])){
               if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
                  preg_match('/^[0-9.,]+$/', $_POST["nuevoPrecioCompra"]) && 
                  preg_match('/^[0-9.,]+$/', $_POST["nuevoPrecioVenta"])) {

                    $ruta = "vistas/img/productos/default/anonymous.png";

                    /** VALIDAR LA IMAGEN DE PRODUCTO */
                    if(isset($_FILES["nuevaImagen"]["tmp_name"])){

                         list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
     
                         $nuevoAncho = 500;
                         $nuevoAlto = 500;
     
                         /*=============================================================
                         =    CREAR EL DIR DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO   =
                         =============================================================*/
                         // var_dump(getimagesize($_FILES["nuevaImagen"]["tmp_name"]));
                         $directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];
                         
                         mkdir($directorio, 0755);
                         
                         /*=============================================
                         =  FUNCIONES POR DEFECTO DE PHP SEGUN FORMATO =
                         =============================================*/
                 
                         if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){
     
                             /*=============================================
                             =     GUARDAMOS LA IMAGEN EN EL DIRECTORIO 	=
                             =============================================*/
     
                             $aleatorio = mt_rand(100,999);
     
                             $ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";
     
                             $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						
     
                             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
                             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
                             imagejpeg($destino, $ruta);
     
                         }
     
                         if($_FILES["nuevaImagen"]["type"] == "image/png"){
     
                             /*=============================================
                             =     GUARDAMOS LA IMAGEN EN EL DIRECTORIO 	=
                             =============================================*/
     
                             $aleatorio = mt_rand(100,999);
     
                             $ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";
     
                             $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						
     
                             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
                             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
                             imagepng($destino, $ruta);
     
                         }
     
                     }

                    $tabla = "productos";

                    $datos = array("id_categoria" => $_POST["nuevaCategoria"],
                            "codigo" => $_POST["nuevoCodigo"],
                            "descripcion" => $_POST["nuevaDescripcion"],
                            "stock" => $_POST["nuevoStock"],
                            "precio_compra" => $_POST["nuevoPrecioCompra"],
                            "precio_venta" => $_POST["nuevoPrecioVenta"],
                            "imagen" => $ruta);

                    $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                    if($respuesta == "ok"){
                
                         echo '<script>
                     
                         Swal.fire({
                               type: "success",
                               title: "¡El producto se ha agregado correctamente!",
                               showConfirmButton: true,
                               confirmButtonText: "Cerrar"
                               }).then(function(result){
                                        if (result.value){

                                        window.location = "productos";

                                        }
                              })
     
                         </script>';
                    }

               }else {
                    echo '<script>
               
                    Swal.fire({
                              type: "error",
                              title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){

                              if(result.value){

                              window.location = "productos";
                         
                              }
                         })
                    
                    </script>';
               }  
          }
     }
}