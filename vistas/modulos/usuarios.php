<div class="content-wrapper">
   <!-- Content Header -->
   <section class="content-header">

    <h1>

        Usuarios
        <small>Panel de usuarios</small>
    </h1>

    <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Panel de usuarios</li>

    </ol>

  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
    
          Agregar usuario
        
        </button>

    </div>

    <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

          <tr>

           <th>#</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Foto</th>
           <th>Perfil</th>
           <th>Estado</th>
           <th>Último ingreso</th>
           <th>Acciones</th>

          </tr>

        </thead>

        <tbody>

        <?php 

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        foreach ($usuarios as $key => $value) {
          // var_dump($value["nombre"]);
          echo '<tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" alt="Img Perfil" class="img-thumbnail" width="40px"></td>';
                  
                  }else {
                  
                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                 
                  }

                  echo '<td>'.$value["perfil"].'</td>';

                  if($value["estado"] != 0){

                    echo'<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{
                  
                    echo'<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                  
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value['id'].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button> 
                      
                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value['id'].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button> 

                    </div>

                </td>

              </tr>';
        }


        ?>

        </tbody>

       </table>

      </div><!-- /.box-body -->

    </div><!-- /.box -->

  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<!--=========================
MODAL AGREGAR USUARIO 
==========================-->

<div class="modal fade" role="dialog" id="modalAgregarUsuario">

  <div class="modal-dialog">
  
    <div class="modal-content">
      
      <form role="form" method="post" enctype="multipart/form-data">  
         
        <!--=======================================
                        Header Modal 
        ========================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
        
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Completar datos de nuevo usuario</h4>
          
        </div>

        <!--======================================== 
                            Body Modal 
        ==========================================-->

        <div class="modal-body">

          <div class="box-body">

          <!-- Ingreso de nombre -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" name="nuevoNombre" class="form-control input-lg" placeholder="Ingresar nombre"minlength="3" maxlength="20" required >

              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para el usuario -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" name="nuevoUsuario" class="form-control input-lg" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para Contraseña -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" name="nuevoPassword" class="form-control input-lg" placeholder="Ingresar contraseña" required>

              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para Perfil -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select name="nuevoPerfil" class="form-control input-lg" required>

                  <option value="">Seleccionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>  

              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para Foto -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

                <input type="file" class="nuevaFoto" id="nuevaFoto" name="nuevaFoto">

                <p class="help-block">Peso máximo de la imagen 1MB</p>

                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div><!-- ./form-group-->

          </div><!-- ./box-body-->

        </div><!-- ./modal-body-->

        <!-- ================================== 
                      Footer Modal 
        ====================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismisss="modal">Cerrar</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>
        <!--** Crear usuario en php con la BD ** -->
        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form> 

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div><!-- /.modal-->

<!-- ===================================================
                  MODAL EDITAR USUARIO 
=====================================================-->

<div class="modal fade" id="modalEditarUsuario" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form action="" role="form" method="POST" enctype="multipart/form-data">  
          
        <!-- =======================================
                        Header Modal 
        =========================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--  =======================================
                        Body Modal 
        ========================================**-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Ingreso de nombre -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre"  value="" required>

              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para el usuario -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario"  value="" readonly>

              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para Contraseña -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" name="editarPassword" class="form-control input-lg" placeholder="Ingresar la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para Perfil -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select name="editarPerfil" class="form-control input-lg" required>

                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>   
                 
              </div>

            </div><!-- ./form-group-->

            <!-- Entrada para Foto -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la imagen 1MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div><!-- ./form-group-->

          </div>

        </div>

        <!--==========================================
                          Footer Modal 
        ===========================================-->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismisss="modal">Cerrar</button>

          <button type="submit" class="btn btn-primary">Guardar edición del usuario</button>

        </div>

        <!--** Crear usuario en php con la BD *-->
        <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?>

      </form> 

    </div><!-- /.modal-content -->
    
  </div><!-- /.modal-dialog -->
  
</div><!-- /.modal-->

<!-- BORRAR USUARIO -->

<?php 

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
?>