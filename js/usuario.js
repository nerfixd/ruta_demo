function VerificarUsuario(){
    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        url:'../controlador/controlador_usuario/controlador_verificar_usuario.php',
        type:'POST',
        data:{
            user:usu,
            pass:con
        }
    }).done(function(resp){
        if(resp==0){
            $.ajax({
            	url: '../controlador/controlador_usuario/controlador_intento_modificar.php',
            	type: 'POST',
            	data:{
            		usuario:usu
            	}
            }).done(function(resp){
            	if (resp == 2) {
                Swal.fire("Mensaje De Advertencia","Usuario y/o contrase\u00f1a incorrecta, intentos fallidos: "+(parseInt(resp)+1)+" - Para poder acceder a su cuenta restablesca la contrase\u00f1a","warning");
            	} else {
                Swal.fire("Mensaje De Advertencia","Usuario y/o contrase\u00f1a incorrecta, intentos fallidos: "+(parseInt(resp)+1)+"","warning");

            	}
            })



        }else{
            var data= JSON.parse(resp);
            if(data[0][5]==='INACTIVO'){
                return Swal.fire("Mensaje De Advertencia","Lo sentimos el usuario "+usu+" se encuentra suspendido, comuniquese con el administrador","warning");
            }
            if (data[0][7] ==2) {
                return Swal.fire("Mensaje De Advertencia","Su cuenta actualemente esta bloqueada, para desbloquear restablesca su contrase\u00f1a","warning");
            }
            $.ajax({
                url:'../controlador/controlador_usuario/controlador_crear_session.php',
                type:'POST',
                data:{
                    idusuario:data[0][0],
                    user:data[0][1],
                    rol:data[0][6]
                }
            }).done(function(resp){
                let timerInterval
                Swal.fire({
                title: 'BIENVENIDO AL SISTEMA',
                html: 'Usted sera redireccionado en <b></b> milisegundos.',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
				    Swal.showLoading()
				    timerInterval = setInterval(() => {
				      const content = Swal.getContent()
				      if (content) {
				        const b = content.querySelector('b')
				        if (b) {
				          b.textContent = Swal.getTimerLeft()
				        }
				      }
				    }, 100)
				  },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                }
})
            })
           
        }
    })
}
var table;
function listar_usuario(){
     table = $("#tabla_usuario").DataTable({
       "ordering":false,   
       "bLengthChange":false,
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/controlador_usuario/controlador_usuario_listar.php",
           type:'POST'
       },
       "columns":[
           {"data":"posicion"},
           {"data":"usu_nombre"},
           {"data":"usu_email"},
           {"data":"rol_nombre"},
           {"data":"usu_sexo",
                render: function (data, type, row ) {
                    if(data=='M'){
                        return "MASCULINO";                   
                    }else{
                        return "FEMENINO";                 
                    }
                }
           }, 
           {"data":"usu_estatus",
             render: function (data, type, row ) {
               if(data=='ACTIVO'){
                   return "<span class='badge badge-success'>"+data+"</span>";                   
               }else{
                 return "<span class='badge badge-danger'>"+data+"</span>";                 
               }
             }
           },  
           {"data":"usu_estatus",
             render: function (data, type, row ) {
               if(data=='ACTIVO'){
                   return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-trash'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success' disabled><i class='fa fa-check'></i></button>";                   
               }else{
                 return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-trash'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>";                 
               }
             }
           }
       ],

       "language":idioma_espanol,
       select: true
   });
   document.getElementById("tabla_usuario_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

}

$('#tabla_usuario').on('click','.activar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de activar al usuario?',
        text: "Una vez hecho esto el usuario  tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id,'ACTIVO');
        }
      })
})


$('#tabla_usuario').on('click','.desactivar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de desactivar al usuario?',
        text: "Una vez hecho esto el usuario no tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id,'INACTIVO');
        }
      })
})

$('#tabla_usuario').on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    } 
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txtidusuario").val(data.usu_id);
    $("#txtusu_editar").val(data.usu_nombre);
    $("#txt_email_editar").val(data.usu_email);
    $("#cbm_sexo_editar").val(data.usu_sexo).trigger('change');
    $("#cbm_rol_editar").val(data.rol_id).trigger('change');

})

function Modificar_Estatus(idusuario,estatus){
    var mensaje ="";
    if(estatus=='INACTIVO'){
        mensaje="desactivo";
    }else{
        mensaje="activo";
    }
    $.ajax({
        "url":"../controlador/controlador_usuario/controlador_modificar_estatus_usuario.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            Swal.fire("Mensaje De Confirmacion","El usuario se "+mensaje+" con exito","success")            
            .then ( ( value ) =>  {
                table.ajax.reload();
            }); 
        }
    })


}

function filterGlobal() {
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

function listar_combo_rol(){
    $.ajax({
        "url":"../controlador/controlador_usuario/controlador_combo_rol_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }
    })
}

function Registrar_Usuario(){
    var usu = $("#txt_usu").val();
    var contra = $("#txt_con1").val();
    var contra2 = $("#txt_con2").val();
    var sexo = $("#cbm_sexo").val();
    var rol = $("#cbm_rol").val();
    var email = $("#txt_email").val();
    var validar_email = $("#validar_email").val();
    if(usu.length==0 || contra.length==0 || contra.length==0 || contra2.length==0 || sexo.length==0 || rol.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    if(contra != contra2){
        return Swal.fire("Mensaje De Advertencia","Las contrase\u00f1as deben coincidir","warning");        
    }

    if (validar_email =="incorrecto") {
        return Swal.fire("Mensaje De Advertencia","El formato de email es incorecto, ingrese un formato valido","warning");        
    }

    $.ajax({
        "url":"../controlador/controlador_usuario/controlador_usuario_registro.php",
        type:'POST',
        data:{
            usuario:usu,
            contrasena:contra,
            sexo:sexo,
            rol:rol,
            email:email
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                Swal.fire("Mensaje De Confirmacion","Datos correctamente, Nuevo Usuario Registrado","success")            
                .then ( ( value ) =>  {
                    LimpiarRegistro();
                    table.ajax.reload();
                }); 
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre del usuario ya se encuentra en nuestra base de datos","warning");
            }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

function Modificar_Usuario(){
    var idusuario = $("#txtidusuario").val();
    var sexo = $("#cbm_sexo_editar").val();
    var rol = $("#cbm_rol_editar").val();
    var email = $("#txt_email_editar").val();
    var validar_email = $("#validar_email_editar").val();
    if(idusuario.length==0  || sexo.length==0 || rol.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    if (validar_email =="incorrecto") {
        return Swal.fire("Mensaje De Advertencia","El formato de email es incorecto, ingrese un formato valido","warning");        
    }

    $.ajax({
        "url":"../controlador/controlador_usuario/controlador_usuario_modificar.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            sexo:sexo,
            rol:rol,
            email:email
        }
    }).done(function(resp){
        if(resp>0){
        	TraerDatosUsuario();
                $("#modal_editar").modal('hide');
                Swal.fire("Mensaje De Confirmacion","Datos actualizados correctamente, Nuevo Usuario Registrado","success")            
                .then ( ( value ) =>  {
                    table.ajax.reload();
                }); 
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar la actualización","error");
        }
    })


}

function LimpiarRegistro(){
    $("#txt_usu_re").val("");
    $("#txt_nom_ape").val("");
    $("#txt_tel").val("");
    $("#txt_email_re").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");
    $("#txt_n_doc").val("");
    $("#imagen").val("");
    $("#cbox_acep").val("");
}

function TraerDatosUsuario(){
	var usuario = $("#usuarioprincipal").val();
	$.ajax({
		"url" :"../controlador/controlador_usuario/controlador_traerdatos_usuario.php",
		type :'POST',
		data:{
			usuario:usuario
		}
	}).done(function(resp){
		var data =JSON.parse(resp);
		if (data.length>0) {
			 $("#txtcontra_bd").val(data[0][2]);
			if (data[0][3] ==="M") {
				$("#img_nav").attr("src", "../plantilla/dist/img/avatar5.png");
				$("#img_subnav").attr("src", "../plantilla/dist/img/avatar5.png");
				$("#img_lateral").attr("src", "../plantilla/dist/img/avatar5.png");
			} else {
                $("#img_nav").attr("src", "../plantilla/dist/img/avatar3.png");
				$("#img_subnav").attr("src", "../plantilla/dist/img/avatar3.png");
				$("#img_lateral").attr("src", "../plantilla/dist/img/avatar3.png");
			}
		}
	})
}

function AbrirModalEditarContra(){
	$("#modal_editar_contra").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_contra").modal('show');
    $("#modal_editar_contra").on('shown.bs.modal',function(){
        $("#txtcontraactual_editar").focus();  
    })
}

function Editar_Contra(){
	var idusuario = $("#txtidprincipal").val();
	var contrabd = $("#txtcontra_bd").val();
	var contraescrita = $("#txtcontraactual_editar").val();
	var contranu = $("#txtcontranu_editar").val();
	var contrare = $("#txtcontrare_editar").val();

    if (contraescrita.length ==0 || contranu.length ==0 || contrare.length ==0) {
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    if (contranu != contrare) {
        return Swal.fire("Mensaje De Advertencia","Debe ingresar la misma clave dos veces para confirmarla","warning");    	
    }

    $.ajax({
    	url: '../controlador/controlador_usuario/controlador_contra_modificar.php',
    	type: 'POST',
    	data:{
    		idusuario:idusuario,
    		contrabd:contrabd,
    		contraescrita:contraescrita,
    		contranu:contranu
    	}
    }).done(function(resp){
    	if (resp>0) {
    		if (resp==1) {
    			$("#modal_editar_contra").modal('hide');
    			LimpiarEditarContra();
                Swal.fire("Mensaje De Confirmacion","Contrase\u00f1a actualizada correctamente","success")            
                .then ( ( value ) =>  {
                    TraerDatosUsuario();
                });
    		} else {
    		Swal.fire("Mensaje De Error", "La contrase\u00f1a actual ingresada no coincide con la que tenemos en nuestra base de datos","error");    			
    		}

    	} else {
    		Swal.fire("Mensaje De Error", "No se pudo utilizar la contrase\u00f1a","error");
    	}
    })
}

function LimpiarEditarContra(){
	$("#txtcontraactual_editar").val("");
	$("#txtcontranu_editar").val("");
	$("#txtcontrare_editar").val("");
}


function AbrirMdalRestablecer(){
	$("#modal_restablecer_contra").modal({backdrop:'static',keyboard:false})
    $("#modal_restablecer_contra").modal('show');
    $("#modal_restablecer_contra").on('shown.bs.modal',function(){
        $("#txt_email").focus();  
    })	
}

function Restableber_Contra(){
	var email = $("#txt_email").val();
	if (email.length==0) {
		return Swal.fire("Mensaje De Advertencia", "Llene los campos en blanco","warning");    			

	}

	var caracteres = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	var contrasena = "";
	for (var i = 0; i < 6; i++) {
		contrasena += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
	}
	$.ajax({
		url:"../controlador/controlador_usuario/controlador_restablecer_contra.php",
		type: 'POST',
		data:{
			email:email,
			contrasena:contrasena
		}
	}).done(function(resp){
		
		if (resp>0) {
			if (resp == 1) {
				Swal.fire("Mensaje De Confirmaci&#243;n", "Su contrase\u00f1a fue restablecida con exito al correo: "+email+"","success");		
			} else {
				Swal.fire("Mensaje De Advertencia", "El correo ingresado no se encuentra en nuestra data","warning");		
			}
		} else {
		    Swal.fire("Mensaje De Error", "No se puede restablecer su contrase\u00f1a","error");		
		}

	})
}

/////////////////////////////////// Ubigeo

function listar_pais(){
    $.ajax({
        url:'../controlador/ubigeo/controlador_listar_pais.php',
        type:'POST'
    }).done(function(resp){

        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_pais").html(cadena);
            var idpais = $("#sel_pais").val();
            listar_departamento(idpais);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_pais").html(cadena);
        }
    })
}

function listar_departamento(idpais){
    $.ajax({
        url:'../controlador/ubigeo/controlador_listar_departamento.php',
        type:'POST',
        data:{
            idpais:idpais
        }

    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_departamento").html(cadena);
            var iddepartamento = $("#sel_departamento").val();
            listar_pronvincia(iddepartamento);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_departamento").html(cadena);
        }
    })
}

function listar_pronvincia(iddepartamento){
    $.ajax({
        url:'../controlador/ubigeo/controlador_listar_provincia.php',
        type:'POST',
        data:{
            iddepartamento:iddepartamento
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_provincia").html(cadena);
            var idprovincia = $("#sel_provincia").val();
            listar_distrito(idprovincia);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_provincia").html(cadena);
        }
    })
}

function listar_distrito(idprovincia){
    $.ajax({
        url:'../controlador/ubigeo/controlador_listar_distrito.php',
        type:'POST',
        data:{
            idprovincia:idprovincia
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_distrito").html(cadena);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_distrito").html(cadena);
        }
    })
}


//////////////////// registra usuraio login
function Registrar(){

    var distrito = $("#sel_distrito").val();
    var usu = $("#txt_usu_re").val();
    var nom_ape = $("#txt_nom_ape").val();
    var tel = $("#txt_tel").val();
    var email = $("#txt_email_re").val();
    var contra = $("#txt_con1").val();
    var contra2 = $("#txt_con2").val();
    var sexo = $("#cbm_sexo").val();
    var aceptar = $("#cbox_acep").val();
    var validar_email = $("#validar_email").val();
    var n_doc = $("#txt_n_doc").val();
    var imagen = $("#imagen").val();

    if ($('#cbox_acep').is(':checked') == false ) {
         return Swal.fire("Mensaje De Advertencia","Acepto terminos y condiciones","warning");
    }

    if (distrito.length == 0 || usu.length == 0 || nom_ape.length == 0 || tel.length == 0 || email.length == 0 || contra.length == 0 || sexo.length == 0 || n_doc.length == 0) {
       return Swal.fire("Mensaje De Advertencia","Llene todos los campos vacios","warning");
    }





    if(contra != contra2){
        return Swal.fire("Mensaje De Advertencia","Las contrase\u00f1as deben coincidir","warning");        
    }

    if (validar_email =="incorrecto") {
        return Swal.fire("Mensaje De Advertencia","El formato de email es incorecto, ingrese un formato valido","warning");        
    }

    var f= new Date();
    var archivo = $("#imagen").val();
    var extension = archivo.split('.').pop();
    var nombrearchivo = "IMG"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMinutes()+""+f.getSeconds()+"."+extension;

    var formData = new FormData();
    var foto = $("#imagen")[0].files[0];

    formData.append('distrito',distrito);
    formData.append('usu',usu);
    formData.append('nom_ape',nom_ape);
    formData.append('tel',tel);
    formData.append('email',email);
    formData.append('contra',contra);
    formData.append('sexo',sexo);
    formData.append('n_doc',n_doc);
    formData.append('foto',foto);
    formData.append('nombrearchivo',nombrearchivo);
 
    $.ajax({
        url:'../controlador/controlador_usuario/controlador_login_registrar.php',
        type:'POST',
        data: formData,
        processData: false,
        contentType: false,

  }).done(function(resp){
    $("#modal_registro").modal('hide');
    LimpiarRegistro();
    
    if(resp>0){
      if (resp == 1) {
        Swal.fire("Mensaje de Confirmación","Datos actualizados correctamente","success");
      } else {
        Swal.fire("Mensaje de Advertencia","El N° documento ya se encuentra en nuestra base de datos","warning");
      }
    } else {
        Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
     }
  })
}

function TraerDatosUsuarioLogin(){
    var id = $("#txtidprincipal").val();
    $.ajax({
        "url" :"../controlador/controlador_usuario/controlador_traerdatos_usuariologin.php",
        type :'POST',
        data:{
            id:id
        }
    }).done(function(resp){
        var data   =JSON.parse(resp);
        if (data.length>0) {
            document.getElementById('usu_siderbar').innerHTML =data[0][1];
            document.getElementById('usu_siderbar_1').innerHTML =data[0][1];
            document.getElementById('usu_siderbar_2').innerHTML =data[0][1];
            document.getElementById('rol_siderbar').innerHTML =data[0][7];

            document.getElementById('img_nav').src = '../'+data[0][6];
            document.getElementById('img_lateral').src = '../'+data[0][6];
            document.getElementById('img_subnav').src = '../'+data[0][6];
        }
    })
}

function TraerDatosUsuarioPerfil(){
    var id = $("#txtidprincipal").val();
    $.ajax({
        "url" :"../controlador/controlador_usuario/controlador_traerdatos_usuariologin.php",
        type :'POST',
        data:{
            id:id
        }
    }).done(function(resp){
        var data   =JSON.parse(resp);
        if (data.length>0) {
            document.getElementById('txt_imagen_profile').src = '../'+data[0][6];
            document.getElementById('txt_persona_profile').innerHTML =data[0][12];
            document.getElementById('rol_profile').innerHTML =data[0][7];

            document.getElementById('dist_prefile').value =data[0][14];
            document.getElementById('prov_prefile').value =data[0][16];
            document.getElementById('depar_prefile').value =data[0][18];
            document.getElementById('pais_prefile').value =data[0][20];

            document.getElementById('txt_usu_re_profile').value =data[0][1];
            document.getElementById('txt_nom_ape_profile').value =data[0][12];
            document.getElementById('txt_tel_profile').value =data[0][9];
            document.getElementById('txt_email_profile').value =data[0][5];
            document.getElementById('txt_doc_profile').value =data[0][11];
            $("#cbm_sexo_profile").val(data[0][3]).trigger('change');

        }
    })
}

function Editar_Foto_Profile(){

    var id = $("#txtidprincipal").val();
    var archivo = $("#txt_imagen_perfile").val();

    if (typeof archivo === 'undefined' || archivo.length ==0 ) {
       return Swal.fire("Mensaje De Advertencia","Selecione una imagen","warning");
    }

    var f= new Date();
    
    var extension = archivo.split('.').pop();
    var nombrearchivo = "IMG"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMinutes()+""+f.getSeconds()+"."+extension;

    var formData = new FormData();
    var foto = $("#txt_imagen_perfile")[0].files[0];

    formData.append('id',id);
    formData.append('foto',foto);
    formData.append('nombrearchivo',nombrearchivo);
 
    $.ajax({
        url:'../controlador/controlador_usuario/controlador_prefile_imagen.php',
        type:'POST',
        data: formData,
        processData: false,
        contentType: false,

  }).done(function(resp){
    $("#modal_registro").modal('hide');
    LimpiarRegistro();
    
    if(resp!=0){
      if (resp == 1) {
        TraerDatosUsuarioPerfil();
        Swal.fire("Mensaje De Confirmacion","Foto Actualizada","success")  
      }
    }
  })
}

function Datos_Actualizados(){
    var id = $("#txtidprincipal").val();
    var usu_re = $("#txt_usu_re_profile").val();
    var nom_ape = $("#txt_nom_ape_profile").val();
    var tel = $("#txt_tel_profile").val();
    var email = $("#txt_email_profile").val();
    var sexo = $("#cbm_sexo_profile").val();
    var doc = $("#txt_doc_profile").val();
    var validar_email_profile = $("#validar_email_profile").val();

    if(usu_re.length==0  || nom_ape.length==0 || tel.length==0 || email.length==0 || sexo.length==0 || doc.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    if (validar_email_profile =="incorrecto") {
        return Swal.fire("Mensaje De Advertencia","El formato de email es incorecto, ingrese un formato valido","warning");        
    }

    $.ajax({
        "url":"../controlador/controlador_usuario/controlador_prefile_modificar.php",
        type:'POST',
        data:{
            id:id,
            usu_re:usu_re,
            nom_ape:nom_ape,
            tel:tel,
            email:email,
            sexo:sexo,
            doc:doc
            
        }
    }).done(function(resp){
        if(resp>0){
            TraerDatosUsuarioPerfil();
                $("#modal_editar").modal('hide');
                Swal.fire("Mensaje De Confirmacion","Datos actualizados correctamente, Nuevo Usuario Registrado","success")            
                .then ( ( value ) =>  {
                    table.ajax.reload();
                }); 
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar la actualización","error");
        }
    })


}