<?php 

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>WebPos - Inventory System</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="vistas/img/plantilla/icono-negro.png">
    <!--===========================================
    =            PLUGINS DE CSS                   =
    ============================================-->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
     
    <!--============================================
    =            PLUGINS DE JAVASCRIPT             =
    =============================================-->

    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="vistas/dist/js/demo.js"></script> Cuando se requiera, se va a copiar el codigo en plantilla.js de JS dentro de Vistas-->

    <!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>  

    <!-- SweetAlert 2-->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

    <!-- iCheck -->
    <script src="vistas/plugins/iCheck/icheck.min.js"></script>

     <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    
</head>


<!-- Se agrega sidebar-collapse para que se inicie ocultando el menus sidebar -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
   <!--============================================
   =            CUERPO DOCUMENTO                  =
   =============================================-->
   <!-- Site wrapper -->

      <?php

        if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

          echo '<div class="wrapper">';

           /* Cabezote */
           include "modulos/cabezote.php";
           /* Menu lateral */
           include "modulos/menu.php";
           /* Contenido */
           if(isset($_GET["ruta"])){

              if($_GET["ruta"] == "inicio" ||
                 $_GET["ruta"] == "usuarios" || 
                 $_GET["ruta"] == "categorias" ||
                 $_GET["ruta"] == "productos" ||
                 $_GET["ruta"] == "clientes" ||
                 $_GET["ruta"] == "ventas" ||
                 $_GET["ruta"] == "crear-ventas" ||
                 $_GET["ruta"] == "reportes-ventas" ||
                 $_GET["ruta"] == "salir"){

                 include "modulos/".$_GET["ruta"].".php";

              }else {

                include 'modulos/404.php';

              }
          }else{
            include 'modulos/inicio.php';          
          }
          /* Footer */
          include "modulos/footer.php";

          echo '</div>';
        }else {
          include "modulos/login.php";
        }

        ?>
       
  </div>
  <!-- ./wrapper -->
  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/categorias.js"></script>
  <script src="vistas/js/productos.js"></script>
</body>

</html>