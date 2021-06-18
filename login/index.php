<?php
session_start();
if (isset($_SESSION['S_IDUSUARIO'])) {
header('location: ../vista/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../plantilla/plugins/sweetalert2/sweetalert2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<span class="login100-form-title p-b-49">
						Iniciar Sessi&oaute;n
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="username" placeholder="Usuario" id="txt_usu" autocomplete="new_password">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Contrase&ntilde;a</span>
						<input class="input100" type="password" name="pass" placeholder="Contrase&ntilde;a" id="txt_con">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#" onclick="AbrirMdalRestablecer();">
							¿Olvidaste la Contrase&ntilde;a?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" onclick="VerificarUsuario()">
								Entrar
							</button>
						</div>
					</div>

					<div class="flex-col-c p-t-35">
						<a href="#" onclick="AbrirModalRegistro();">
							Registrar Usuario
						</a>
					</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>



<div class="modal fade" id="modal_restablecer_contra" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Restablecer Contraseña</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <input type="hidden" name="" id="txtidusuario">
          <label for="" ><b>Ingrese el email registrado del usuario para enviarle su contraseña restablecida</b></label>
          <input type="text" class="form-control" id="txt_email" placeholder="Ingrese Email"><br />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="Restableber_Contra()" class="btn btn-primary"><i class="fa fa-check"><b>&nbsp;Enviar</b></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"><b>&nbsp;Close</b></i></button>
      </div>
    </div>
  </div>
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
      <div class="row">
      	<div class="col-lg-6">
          <label for="">País:</label>
          <select class="form-control js-example-basic-single" name="state" id="sel_pais" style="width: 100%;">
          </select><br><br>
        </div>
      	<div class="col-lg-6">
          <label for="">Departamento:</label>
          <select class="form-control js-example-basic-single" name="state" id="sel_departamento" style="width: 100%;">
          </select><br><br>
        </div>
        <div class="col-lg-6">
          <label for="">Provincia:</label>
          <select class="form-control js-example-basic-single" name="state" id="sel_provincia"  style="width: 100%;">
          </select><br><br>
        </div>
        <div class="col-lg-6">
          <label for="">Distrito:</label>
          <select class="form-control js-example-basic-single" name="state" id="sel_distrito"  style="width: 100%;">
          </select><br><br>
        </div>
        <div class="col-lg-6">
          <label for="" >Usuario</label>
          <input type="text" class="form-control" id="txt_usu_re" placeholder="Ingrese usuario"><br />
        </div>
        <div class="col-lg-6">
          <label for="" >Nombre y Apellidos</label>
          <input type="text" class="form-control" id="txt_nom_ape" placeholder="Ingrese Nombre y Apellidos"><br />
        </div>
        <div class="col-lg-6">
          <label for="" >Teléfono</label>
          <input type="number" class="form-control" id="txt_tel" placeholder="Ingrese Teléfono"><br />
        </div>
        <div class="col-lg-6">
          <label for="" >Email</label>
          <input type="text" class="form-control" id="txt_email_re" placeholder="Ingrese email">
          <input type="hidden" id="validar_email">
          <label for="" id="emailOK" style="color: red;"></label>
        </div>
        <div class="col-lg-6">
          <label for="" >Contrase&ntilde;a</label>
          <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese Contrase&ntilde;a"><br />
        </div>
        <div class="col-lg-6">
          <label for="" >Repita la Contrase&ntilde;a</label>
          <input type="password" class="form-control" id="txt_con2" placeholder="Repita Contrase&ntilde;a"><br />
        </div>
        <div class="col-lg-6">
          <label for="" >Sexo</label>
          <select class="form-control js-example-basic-single" name="state" style="width: 100%;" id="cbm_sexo">
              <option value="M">MASCULINO</option>
              <option value="F">FEMENINO</option>
          </select><br />
        </div>
        <div class="col-lg-6">
          <label for="" >Nro Documento</label>
          <input type="number" class="form-control" id="txt_n_doc" placeholder="Nro Documento"><br />
        </div>
        <div class="col-lg-6">
          <label for="" >Foto</label>
          <input type="file" class="form-control" id="imagen" accept="images/x-png/jpeg."><br />
        </div>
        <div class="col-lg-12">
          <input type="checkbox" class="form-control" id="cbox_acep">
          <label for="" >Terminos y condiciones</label>
       </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="Registrar()" class="btn btn-primary"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"><b>&nbsp;Close</b></i></button>
      </div>
    </div>
  </div>
</div>
</form>


<!--===============================================================================================-->
	<script src="../plantilla/plugins/sweetalert2/sweetalert2.min.js"></script>	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="../js/usuario.js"></script>

</body>
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    listar_pais();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();  
    })
} );

$("#sel_pais").change(function(){
    var idpais = $("#sel_pais").val();
    listar_departamento(idpais);
})

$("#sel_departamento").change(function(){
    var iddepartamento = $("#sel_departamento").val();
    listar_pronvincia(iddepartamento);
})

$("#sel_provincia").change(function(){
    var idprovincia = $("#sel_provincia").val();
    listar_distrito(idprovincia);
})

document.getElementById('txt_email_re').addEventListener('input', function(){
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

document.getElementById("imagen").addEventListener("change", () => {
     var fileName = document.getElementById("imagen").value; 
     var idxDot = fileName.lastIndexOf(".") + 1; 
     var extFile = fileName.substr(idxDot, fileName.length).toLowerCase(); 
     if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 
      //TO DO 
     }else{ 
      Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SEACEPTA IMAGENES - USTED SUBIO UN ARCHIVO CON EXTENSION "+extFile,"warning"); 
      document.getElementById("imagen").value = "";
     } 
});

</script>
</html>