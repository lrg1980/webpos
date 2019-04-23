Content Wrapper. Contains page content -->
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
            <table class="table table-bordered table-striped dt-responsive tablas ">
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
                  <tr>
                       <td>1</td>
                       <td>Usuario Administrador</td>
                       <td>admin</td>
                       <td><img src="vistas/img/usuarios/default/anonymous.png" alt="Img Perfil" class="img-thumbnail" width="40px"></td>
                       <td>Administrador</td>
                       <td><button class="btn btn-success btn-xs">Activado</button></td>
                       <td>2019-04-22 8:34:30</td>
                       <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button> 
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button> 
                            </div>
                       </td>
                  </tr>
                  <tr>
                       <td>1</td>
                       <td>Usuario Administrador</td>
                       <td>admin</td>
                       <td><img src="vistas/img/usuarios/default/anonymous.png" alt="Img Perfil" class="img-thumbnail" width="40px"></td>
                       <td>Administrador</td>
                       <td><button class="btn btn-success btn-xs">Activado</button></td>
                       <td>2019-04-22 8:34:30</td>
                       <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button> 
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button> 
                            </div>
                       </td>
                  </tr>
               </tbody>
            </table>
         </div>
      <!-- /.box-body -->
      </div>
   <!-- /.box -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL AGREGAR USUARIO -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form action="" role="form" method="POST" enctype="multipart/form-data">  
         
         <!-- 
          *
          * Header Modal
          *
          -->
         
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Completar datos de nuevo usuario</h4>
        </div>

        <!-- 
          *
          * Body Modal
          *
          -->
        <div class="modal-body">
          <div class="box-body">
          <!-- Ingreso de nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nuevoNombre" class="form-control input-lg" placeholder="Ingresar nombre" required>
              </div>
            </div><!-- ./form-group-->

        <!-- Entrada para el usuario -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="text" name="nuevoUsuario" class="form-control input-lg" placeholder="Ingresar usuario" required>
          </div>
        </div><!-- ./form-group-->

        <!-- Entrada para Contraseña -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="text" name="nuevoPassword" class="form-control input-lg" placeholder="Ingresar contraseña" required>
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
            <input type="file" id="nuevaFoto" name="nuevaFoto">
            <p class="help-block">Peso máximo de la imagen 1MB</p>
            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
        </div><!-- ./form-group-->

        <!-- 
          *
          * Footer Modal
          *
          -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismisss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar usuario</button>
        </div>
      </form> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal