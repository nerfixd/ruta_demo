<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>
    <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BIENVENIDO CONTENIDO DEL USUARIO</font></font></h3>

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
                <div class="col-lg-10">
                  <div class="input-group mb-3">
                  <input type="text" class="form-control global_filter" id="global_filter" placeholder="Ingresar datos a buscar">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>
                </div> 
                <div class="col-lg-2">
                  <button class="btn btn-danger" onclick="AbrirModalRegistro();" style="width: 100%"><i class="glyphicon glyphicon-plus">Nuevo Registro</i></button>
                </div> 
                </div>               
              </div>
                <table id="tabla_usuario" class="display responsive nowrap table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Sexo</th>
                        <th>Estatus</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Sexo</th>
                        <th>Estatus</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </tfoot>
               </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
<form autocomplete="false" onsubmit="return false">
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Registro usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <label for="" >Usuario</label>
          <input type="text" class="form-control" id="txt_usu" placeholder="Ingrese usuario"><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Email</label>
          <input type="text" class="form-control" id="txt_email" placeholder="Ingrese email">
          <input type="hidden" id="validar_email">
          <label for="" id="emailOK" style="color: red;"></label>
        </div>
        <div class="col-lg-12">
          <label for="" >Contrase&ntilde;a</label>
          <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese Contrase&ntilde;a"><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Repita la Contrase&ntilde;a</label>
          <input type="password" class="form-control" id="txt_con2" placeholder="Repita Contrase&ntilde;a"><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Sexo</label>
          <select class="form-control select2" name="state" style="width: 100%;" id="cbm_sexo">
              <option value="M">MASCULINO</option>
              <option value="F">FEMENINO</option>
          </select><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Rol</label>
          <select class="form-control select2" name="state" id="cbm_rol" style="width:100%;">
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="Registrar_Usuario()" class="btn btn-primary"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"><b>&nbsp;Close</b></i></button>
      </div>
    </div>
  </div>
</div>
</form>

<form autocomplete="false" onsubmit="return false">
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Editar datos del usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <input type="hidden" name="" id="txtidusuario">
          <label for="" >Usuario</label>
          <input type="text" class="form-control" id="txtusu_editar" placeholder="Ingrese usuario" disabled=""><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Email</label>
          <input type="text" class="form-control" id="txt_email_editar" placeholder="Ingrese email">
          <input type="hidden" id="validar_email_editar">
          <label for="" id="emailOK_editar" style="color: red;"></label>
        </div>
        <div class="col-lg-12">
          <label for="" >Sexo</label>
          <select class="form-control select2" name="state" style="width: 100%;" id="cbm_sexo_editar">
              <option value="M">MASCULINO</option>
              <option value="F">FEMENINO</option>
          </select><br />
        </div>
        <div class="col-lg-12">
          <label for="" >Rol</label>
          <select class="form-control select2" name="state" id="cbm_rol_editar" style="width:100%;">
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="Modificar_Usuario()" class="btn btn-primary"><i class="fa fa-check"><b>&nbsp;Modificar</b></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"><b>&nbsp;Close</b></i></button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
    listar_usuario();
    $('.select2').select2();
    listar_combo_rol();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();  
    })
} );

document.getElementById('txt_email').addEventListener('input', function(){
  campo=event.target;
  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  if(emailRegex.test(campo.value)){
    $(this).css("border", "");
    $("#emailOK").html("");
    $("#validar_email").val("correcto");
  } else {
    $(this).css("border", "1px solid red");
    $("#emailOK").html("Email Incorrecto");
    $("#validar_email").val("incorrecto");
  }
});

document.getElementById('txt_email_editar').addEventListener('input', function(){
  campo=event.target;
  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  if(emailRegex.test(campo.value)){
    $(this).css("border", "");
    $("#emailOK_editar").html("");
    $("#validar_email_editar").val("correcto");
  } else {
    $(this).css("border", "1px solid red");
    $("#emailOK_editar").html("Email Incorrecto");
    $("#validar_email_editar").val("incorrecto");
  }
});

</script>