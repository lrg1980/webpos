

/*=============================================
=          Section Habilitar DataTable        =
=============================================*/

// Data Table
$(".tablas").DataTable({
     "language": {
          
     }
});

/*=====  End of Section Habilitar DataTable ======*/

/*=============================================
=            Sidebar Menu                     =
=============================================*/

$('.sidebar-menu').tree();


/*=============================================
=      Red color scheme for iCheck            =
=============================================*/
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
     checkboxClass: 'icheckbox_minimal-red',
     radioClass   : 'iradio_minimal-red'
   })
