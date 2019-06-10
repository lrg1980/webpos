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
                <table class="table table-bordered table-striped dt-responsive tablasProductos" width="100%">
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

                        <!-- Entrada para Categoria del producto -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select id="nuevaCategoria" name="nuevaCategoria" class="form-control input-lg" required>
                                    <option value="">Seleccionar categoría</option>

                                    <!-- TRAEMOS DINAMICAMENTE LAS CATEGORÍAS -->
                                    <?php
                                        $item = null;
                                        $valor = null;

                                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                        foreach ($categorias as $key => $value) {
                                            # code...
                                            echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                                        }
                                    ?>

                                </select>
                            
                            </div>

                        </div><!-- ./form-group-->

                        <!-- Ingreso de código -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" id="nuevoCodigo" name="nuevoCodigo" class="form-control input-lg" placeholder="Ingresar código" readonly required>
                            </div>
                        </div><!-- ./form-group-->

                        <!-- Entrada para la descripcion  -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" name="nuevaDescripcion" class="form-control input-lg" placeholder="Ingresar descripción del producto" required>
                            </div>
                        </div><!-- ./form-group-->

                        <!-- Entrada para Stock  -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" name="nuevoStock" class="form-control input-lg" min="0" placeholder="Ingresar stock del producto" required>
                            </div>
                        </div><!-- ./form-group-->

                        <!-- ENTRADA PARA PRECIO COMPRA -->

                        <div class="form-group row">

                            <div class="col-xs-12 col-sm-6">

                                <div class="input-group">
                                
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                                    <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de compra" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA PRECIO VENTA -->

                            <div class="col-xs-12 col-sm-6">

                                <div class="input-group">
                                
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de venta" required>

                                </div>

                            <br>

                            <!-- CHECKBOX PARA PORCENTAJE -->

                            <div class="col-xs-6">
                                
                                <div class="form-group">
                                
                                <label>
                                    
                                    <input type="checkbox" class="minimal porcentaje" checked>
                                    Utilizar procentaje
                                </label>

                                </div>

                            </div>

                            <!-- ENTRADA PARA PORCENTAJE -->

                            <div class="col-xs-6" style="padding:0">
                                
                                <div class="input-group">
                                
                                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                                <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Entrada para Foto -->
                    <div class="form-group">

                        <div class="panel">SUBIR IMAGEN</div>

                        <input type="file" class="nuevaImagen" name="nuevaImagen">

                        <p class="help-block">Peso máximo de la imagen 2MB</p>

                        <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

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

            <?php
                $crearProducto = new ControladorProductos();
                $crearProducto -> ctrCrearProducto();

            ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal