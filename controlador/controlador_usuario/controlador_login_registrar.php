<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $distrito = htmlspecialchars($_POST['distrito'],ENT_QUOTES,'UTF-8');   
    $usu = htmlspecialchars($_POST['usu'],ENT_QUOTES,'UTF-8');
    $nom_ape = htmlspecialchars($_POST['nom_ape'],ENT_QUOTES,'UTF-8');
    $tel = htmlspecialchars($_POST['tel'],ENT_QUOTES,'UTF-8');
    $contra = password_hash($_POST['contra'],PASSWORD_DEFAULT,['cost'=>10]);
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $n_doc = htmlspecialchars($_POST['n_doc'],ENT_QUOTES,'UTF-8');
    $nombrearchivo = htmlspecialchars($_POST['nombrearchivo'],ENT_QUOTES,'UTF-8');


    if (is_array($_FILES) && count($_FILES) >0 ) {
    	if (move_uploaded_file($_FILES['foto']['tmp_name'], "img/".$nombrearchivo)) {
    		$ruta = 'controlador/controlador_usuario/img/'.$nombrearchivo;
    		$consulta = $MU->Registrar_Login_Usuario($distrito,$usu,$nom_ape,$tel,$contra,$email,$sexo,$n_doc,$ruta);
    		echo $consulta;
    	} else {
    		echo 0;
    	}
    } else {
    	echo 0;
    }
    
   

?>