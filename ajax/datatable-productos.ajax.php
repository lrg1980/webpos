<?php 

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos{

     /**==== MOSTRAR LA TABLA DE PRODUCTOS =====*/
     
     public function mostrarTablaProductos(){

          $item = null;
          $valor = null;

          $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
          
          $datosJson =  '{
               "data": [';
               for($i = 0; $i < count($productos); $i++) {

                    /**==== MOSTRAR LA IMAGEN DE LA TABLA DE PRODUCTOS =====*/
                    $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";
                    
                    $item = "id";
                    $valor = $productos[$i]["id_categoria"];
                    
                    /**==== MOSTRAR LA CATEGORIA DE LA TABLA DE PRODUCTOS =====*/
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    /** stock */
                    if($productos[$i]["stock"] <= 5) {
                         
                         $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

                    }else if($productos[$i]["stock"] > 6 && $productos[$i]["stock"] <= 15) {

                         $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

                    }else {

                         $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

                    }
                    
                    /**==== MOSTRAR BOTONES DE EDITAR Y ELIMINAR EN LA TABLA DE PRODUCTOS =====*/
                    $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";

                    $datosJson .='[
                         "'.($i+1).'",
                         "'.$imagen.'",
                         "'.$productos[$i]["codigo"].'",
                         "'.$productos[$i]["descripcion"].'",
                         "'.$categorias["categoria"].'",
                         "'.$stock.'",
                         "'.$productos[$i]["precio_compra"].'",
                         "'.$productos[$i]["precio_venta"].'",
                         "'.$productos[$i]["fecha"].'",
                         "'.$botones.'"
                    ],';
               }

               $datosJson = substr($datosJson, 0, -1);
          $datosJson .= ']
          
          }';
          
          echo $datosJson;
          
     }              
          
}

/*====================================================
*         Activar tabla de productos
====================================================*/
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();