<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Categorías
      <small>Panel de categorías</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Panel de categorías</li>
    
    </ol>
  
  </section>

   <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
    
          Agregar categoría
      
        </button> 
      
      </div>

      <div class="box-body">
      
        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>
            
            <tr>
              
              <th>#</th>
              
              <th>Categoría</th>

              <th>Acciones</th>
            
            </tr>
          
          </thead>

          <tbody>

          <?php

            $item = null; 
            $valor = null; 

            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

            foreach ($categorias as $key => $value) {

              echo '<tr>

                  <td style="width:10px">'.($key+1).'</td>

                  <td>'.$value["categoria"].'</td>

                  <td>

                    <div class="btn-group">

                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button> 

                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'" ><i class="fa fa-times"></i></button> 

                    </div>
                  
                  </td>
                
                </tr>';

            }
          
          ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--==================================================== 
                    MODAL AGREGAR CATEGORIAS 
=====================================================-->

<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarCategoria">

  <div class="modal-dialog">

    <div class="modal-content">
      
      <form action="" role="form" method="POST">  
         
        <!-- ************************* 
                  Header Modal 
        ************************** -->
         
        <div class="modal-header" style="background: #3c8dbc; color: white;">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Completar datos de nueva categoria</h4>

        </div>

        <!--******************************
                       Body Modal 
        ****************************** -->

        <div class="modal-body">

          <div class="box-body">

          <!-- Ingreso de nombre -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" name="nuevaCategoria" class="form-control input-lg" placeholder="Ingresar nombre de categoría" required>

              </div>

            </div><!-- ./form-group-->
          
          </div>

        </div>

        <!-- *************************** 
                    Footer Modal 
        *****************************-->
        
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

        <?php 
          
          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();
        
        ?>
      </form> 

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div><!-- /.modal

<!--==================================================== 
                    MODAL EDITAR CATEGORIAS 
=====================================================-->

<div id="modalEditarCategoria" class="modal fade" tabindex="-1" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">
      
      <form action="" role="form" method="POST">  
         
        <!-- ************************* 
                  Header Modal 
        ************************** -->
         
        <div class="modal-header" style="background: #3c8dbc; color: white;">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--******************************
                       Body Modal 
        ****************************** -->

        <div class="modal-body">

          <div class="box-body">

          <!-- Ingreso de nombre -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
                <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div><!-- ./form-group-->
          
          </div>

        </div>

        <!-- *************************** 
                    Footer Modal 
        *****************************-->
        
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php 
          
          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();
        
        ?>

      </form> 

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div><!-- /.modal

/**==========================================
*       EJECUCIÓN DE BORRAR CATEGORIA
===========================================*/

<?php 
          
  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>