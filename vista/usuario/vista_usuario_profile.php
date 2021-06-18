<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>
    <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BIENVENIDO CONTENIDO EDITAR USUARIO</font></font></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form_group">
                <div class="row">
                <div class="col-lg-12">

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" id="txt_imagen_profile" 
                       
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center" id="txt_persona_profile"></h3>

                <p class="text-muted text-center" id="rol_profile"></p>
                <form method="POST" action="#" enctype="mulpipart/form-data">
                <ul class="list-group list-group-unbordered mb-3">
                    <div class= "list-group mb-20">
                      <input type="file" id="txt_imagen_perfile" accept="imagen/*" class="form-control-file">
                    </div> 
                    
                </ul>
                </form>

                <a href="#" class="btn btn-primary btn-block" onclick="Editar_Foto_Profile()" ><b>Actualizar</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Ubigeo</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Datos Personales</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                                                
                                                <div class="col-lg-6">
                                                  <label for="">País:</label>
                                                  <!-- <select class="form-control js-example-basic-single" name="state" id="sel_pais_profile" style="width: 100%;">
                                                  </select><br><br> -->
                                                  <input type="text" readonly class="form-control" id="pais_prefile"><br>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="">Departamento:</label>
                                                  <!--  <select class="form-control js-example-basic-single" name="state" id="sel_departamento_profile" style="width: 100%;">
                                                  </select><br><br>  -->
                                                  <input type="text" readonly class="form-control" id="depar_prefile"><br>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="">Provincia:</label>
                                                  <!--  <select class="form-control js-example-basic-single" name="state" id="sel_provincia_profile"  style="width: 100%;">
                                                  </select><br><br> -->
                                                  <input type="text" readonly class="form-control" id="prov_prefile"><br>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="">Distrito:</label>
                                                  <!--  <select class="form-control js-example-basic-single" name="state" id="sel_distrito_profile"  style="width: 100%;">
                                                  </select><br><br> -->
                                                  <input type="text" readonly class="form-control" id="dist_prefile">
                                                </div>
                      </div>
                    </div>
                    <!-- /.post -->

                  
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <div class="post">
                      <div class="row">
                        <div class="col-lg-6">
                                                  <label for="" >Usuario</label>
                                                  <input type="text" class="form-control" id="txt_usu_re_profile" placeholder="Ingrese usuario" readonly=""><br />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="" >Nombre y Apellidos</label>
                                                  <input type="text" class="form-control" id="txt_nom_ape_profile" placeholder="Ingrese Nombre y Apellidos"><br />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="" >Teléfono</label>
                                                  <input type="number" class="form-control" id="txt_tel_profile" placeholder="Ingrese Teléfono"><br />
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="" >Email</label>
                                                  <input type="text" class="form-control" id="txt_email_profile" placeholder="Ingrese email">
                                                  <input type="hidden" id="validar_email_profile">
                                                  <label for="" id="emailOK_profile" style="color: red;"></label>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="" >Nro Documento</label>
                                                  <input type="text" class="form-control" id="txt_doc_profile" placeholder="Nro Documento">
                                                </div>
                                                <div class="col-lg-6">
                                                  <label for="" >Sexo</label>
                                                  <select class="form-control js-example-basic-single" name="state" style="width: 100%;" id="cbm_sexo_profile">
                                                      <option value="M">MASCULINO</option>
                                                      <option value="F">FEMENINO</option>
                                                  </select><br />
                                                </div>
                                                <div class="col-lg-6" style="text-align: center;">
                                                  <button  class="btn btn-success" onclick="Datos_Actualizados()">Actualizar Datos</button>
                                                </div>

                      </div>

                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

                </div> 
                </div>               
              </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>

<script type="text/javascript">
TraerDatosUsuarioPerfil();
document.getElementById('txt_email_profile').addEventListener('input', function(){
  campo=event.target;
  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  if(emailRegex.test(campo.value)){
    $(this).css("border", "");
    $("#emailOK_profile").html("");
    $("#validar_email_profile").val("correcto");
  } else {
    $(this).css("border", "1px solid red");
    $("#emailOK_profile").html("Email Incorrecto");
    $("#validar_email_profile").val("incorrecto");
  }
});

document.getElementById("txt_imagen_perfile").addEventListener("change", () => {
     var fileName = document.getElementById("txt_imagen_perfile").value; 
     var idxDot = fileName.lastIndexOf(".") + 1; 
     var extFile = fileName.substr(idxDot, fileName.length).toLowerCase(); 
     if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 
      //TO DO 
     }else{ 
      Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SEACEPTA IMAGENES - USTED SUBIO UN ARCHIVO CON EXTENSION "+extFile,"warning"); 
      document.getElementById("txt_imagen_perfile").value = "";
     } 
});
</script>