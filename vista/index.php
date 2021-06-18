<?php
session_start();
if (!isset($_SESSION['S_IDUSUARIO'])) {
header('location: ../login/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rutas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="../plantilla/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plantilla/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plantilla/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="../plantilla/plugins/sweetalert2/sweetalert2.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plantilla/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../plantilla/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plantilla/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plantilla/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<style type="text/css">
  .swal2-popup{
    font-size: 1.4rem !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
        <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="dropdown user user-menu">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img id="img_nav" class="user-image" alt="User Image"  >
          <span class="hidden-xs" id="usu_siderbar"></span>
        </a>
        <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img id="img_subnav" class="img-circle" alt="User Image">
                <p id="usu_siderbar_1">
                  
                </p>
                <a href="#" onclick ="cargar_contenido('contenido_principal','usuario/vista_usuario_profile.php')" class="btn btn-primary editar btn-flat">Editar Datos</a>

              </li><br>
              <li class="user-footer">
                <div class="row">
                <div class="col-sm-8 text-center">
                  <a href="#" onclick="AbrirModalEditarContra()" class="btn btn-default btn-flat">Cambiar Contraseña</a>
                </div>
                <div class="col-sm-4 text-center">
                  <a href="../controlador/controlador_usuario/controlador_cerrar_session.php" class="btn btn-danger btn-flat">Salir</a>
                </div>
                </div>
              </li>
        
        </ul>

      </li>
      
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-align: center">
      <span class="brand-text font-weight-light" id="rol_siderbar"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="img_lateral" class="img-circle elevation-2" alt="User Image" id="txt_imagen_profile_1" >
        </div>
        <div class="info">
          <a href="#" class="d-block" id="usu_siderbar_2"></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">PANEL DE CONTROL</li>
          <?php
            if ($_SESSION['S_ROL'] =='ADMINISTRADOR') {
          ?>

          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','cita/vista_cita_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Cita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','consulta/vista_consulta_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Consulta Médica
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','paciente/vista_paciente_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Paciente
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','medico/vista_medico_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Médico
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','usuario/vista_usuario_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuario
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','procedimiento/vista_procedimiento_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-spinner"></i>
              <p>
                Procedimiento
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','insumo/vista_insumo_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Insumo
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','historial/vista_historial_lista.php')" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Historial Clínico
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','medicamento/vista_medicamento_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-medkit"></i>
              <p>
                Medicamento
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','especialidad/vista_especialidad_lista.php')" class="nav-link">
              <i class="nav-icon fab fa-gg"></i>
              <p>
                Especialidad
              </p>
            </a>
          </li>
          <?php } 
            if ($_SESSION['S_ROL'] =='CLIENTE') {
          ?>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','envio/vista_envio_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Envios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','historial/vista_historial_lista.php')" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Historial Clínico
              </p>
            </a>
          </li>

          <?php } 
            if ($_SESSION['S_ROL'] =='MOTORIZADO') {
          ?>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','consulta/vista_consulta_lista.php')" class="nav-link">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Consulta Médica
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick ="cargar_contenido('contenido_principal','historial/vista_historial_lista.php')" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Historial Clínico
              </p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <input type="" id="txtidprincipal" value="<?=$_SESSION['S_IDUSUARIO'];?>" hidden>
      <input type="hidden" id="usuarioprincipal" value="<?=$_SESSION['S_USER'];?>">
      <div class="container-fluid" id="contenido_principal">
        <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BIENVENIDO CONTENIDO PRINCIPAL</font></font></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                CONTENIDO PRINCIPAL
              </font></font></div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<div class="modal fade" id="modal_editar_contra" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Modificcar Contraseña</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <input type="hidden" id="txtcontra_bd">
          <label for="" >Contraseña Actual</label>
          <input type="password" class="form-control" id="txtcontraactual_editar" placeholder="Contraseña Actual" ><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Nueva Contraseña</label>
          <input type="password" class="form-control" id="txtcontranu_editar" placeholder="Nueva Contraseña" ><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Repetir Contraseña</label>
          <input type="password" class="form-control" id="txtcontrare_editar" placeholder="Repetir Contraseña" ><br />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="Editar_Contra()" class="btn btn-primary"><i class="fa fa-check"><b>&nbsp;Modificar</b></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"><b>&nbsp;Close</b></i></button>
      </div>
    </div>
  </div>
</div>


<!-- jQuery -->
<script src="../plantilla/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- ./wrapper -->
<script src="../plantilla/plugins/sweetalert2/sweetalert2.min.js"></script> 

<script>

  var idioma_espanol = {
      select: {
      rows: "%d fila seleccionada"
      },
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
      "sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
      "sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "<b>No se encontraron datos</b>",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
   }
  
function cargar_contenido(contenedor,contenido){
    $("#"+contenedor).load(contenido);
  }
  $.widget.bridge('uibutton', $.ui.button);

function soloNumeros(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8){
          return true;
      }
      // Patron de entrada, en este caso solo acepta numeros
      patron =/[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
  }
  function soloLetras(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = "8-37-39-46";
      tecla_especial = false
      for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }
      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
</script>
<!-- Bootstrap 4 -->
<script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plantilla/plugins/chart.js/Chart.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="../plantilla/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plantilla/plugins/moment/moment.min.js"></script>
<script src="../plantilla/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Select2 -->
<script src="../plantilla/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="../plantilla/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../plantilla/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plantilla/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plantilla/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plantilla/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plantilla/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plantilla/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plantilla/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plantilla/plugins/jszip/jszip.min.js"></script>
<script src="../plantilla/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plantilla/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plantilla/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plantilla/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plantilla/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../plantilla/dist/js/demo.js"></script>
<script src="../js/usuario.js" type="text/javascript"></script>
<script type="text/javascript">
  //TraerDatosUsuario();
  TraerDatosUsuarioLogin();
</script>
</body>
</html>
