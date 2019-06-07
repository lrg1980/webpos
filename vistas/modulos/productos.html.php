<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <h1>
            Administrar productos
            <small>Panel de productos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Panel de productos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                    Agregar producto
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas ">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Categorías</th>
                            <th>Stock</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" </td> <td>0001</td>
                            <td>Lorem ipsum dolor sit amet</td>
                            <td>Lorem ipsum</td>
                            <td>20</td>
                            <td>5.00</td>
                            <td>12.00</td>
                            <td>2019-04-22 14:00:33</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" </td> <td>0002</td>
                            <td>Lorem ipsum dolor sit amet</td>
                            <td>Lorem ipsum</td>
                            <td>10</td>
                            <td>8.00</td>
                            <td>16.00</td>
                            <td>2019-04-22 14:00:33</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" </td> <td>0003</td>
                            <td>Lorem ipsum dolor sit amet</td>
                            <td>Lorem ipsum</td>
                            <td>24</td>
                            <td>15.00</td>
                            <td>22.00</td>
                            <td>2019-04-22 15:00:33</td>
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

<!-- MODAL AGREGAR PRODUCTO -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarProducto">
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
                    <h4 class="modal-title">Completar datos de nuevo producto</h4>
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
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" name="nuevoCodigo" class="form-control input-lg" placeholder="Ingresar código" required>
                            </div>
                        </div><!-- ./form-group-->

                        <!-- Entrada para la descripcion  -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" name="nuevaDescripcion" class="form-control input-lg" placeholder="Ingresar descripción del producto" required>
                            </div>
                        </div><!-- ./form-group-->

                        <!-- Entrada para Categoria del producto -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select name="nuevaCategoria" class="form-control input-lg" required>
                                    <option value="">Seleccionar categoría</option>
                                    <option value="Taladros">Taladros</option>
                                    <option value="Andamios">Andamios</option>
                                    <option value="Equipos pesados">Equipos pesados</option>
                                </select>
                            </div>
                        </div><!-- ./form-group-->

                        <!-- Entrada para Stock  -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" name="nuevoStock" class="form-control input-lg" min="0" placeholder="Ingresar stock del producto" required>
                            </div>
                        </div><!-- ./form-group-->

                        <!-- Entrada para Precio Compra  -->
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" name="nuevoPrecioCompra" class="form-control input-lg" min="0" placeholder="Ingresar de compra" required>
                                </div><!-- Entrada para Precio Compra  -->
                            </div>
                            <!-- Entrada para Precio Venta  -->
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" name="nuevoPrecioVenta" class="form-control input-lg" min="0" placeholder="Ingresar de Venta" required>
                                </div>
                                <br>
                                <!-- CHECKBOX PARA PORCENTAJE -->
                                <div class="col-xs-6">
                                    <div class="foorm-group">
                                        <label>
                                            <input type="checkbox" class="minimal-red porcentaje" checked>
                                            Utilizar porcentaje
                                        </label>
                                    </div>
                                </div>
                                <!-- ENTRADA PARA PORCENTAJE -->
                                <div class="col-xs-6" style="padding:0;">
                                    .<div class="input-group">
                                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40"  required>
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        
                                    </div>
                                </div>
                            </div><!-- Entrada para Precio Venta  -->
                        </div><!-- ./form-group-->

                            <!-- Entrada para Foto -->
                            <div class="form-group">
                                <div class="panel">SUBIR IMAGEN</div>
                                <input type="file" id="nuevaImagen" name="nuevaImagen">
                                <p class="help-block">Peso máximo de la imagen 2MB</p>
                                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">
                            </div><!-- ./form-group-->

                            <!-- 
          *
          * Footer Modal
          *
          -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismisss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar producto</button>
                            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal