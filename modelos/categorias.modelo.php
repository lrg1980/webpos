<?php 

require_once "conexion.php";

class ModeloCategorias{

     /**================================== 
      *         CREAR CATEGORIA
     ===================================*/

     static public function mdlCrearCategoria($tabla, $datos){

          $stmt = conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

          $stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);

          if($stmt->execute()){

               return "ok";

          }else{

               return "error";

          }

          $stmt->close();
          $stmt = null;

     }

     /** ================================ 
     *         MOSTRAR CATEGORÍAS 
     * ================================*/

     static public function mdlMostrarCategorias($tabla, $item, $valor){

          if($item != null){
               
               $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

               $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

               $stmt -> execute();

               return $stmt -> fetch();

          }else{

               $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
               
               $stmt -> execute();

               return $stmt -> fetchAll();
          }

          $stmt->close();
          $stmt = null;
     
     }

}