<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');  
    $nombrearchivo = htmlspecialchars($_POST['nombrearchivo'],ENT_QUOTES,'UTF-8');


    if (is_array($_FILES) && count($_FILES) >0 ) {
    	if (move_uploaded_file($_FILES['foto']['tmp_name'], "img/".$nombrearchivo)) {
    		$ruta = 'controlador/controlador_usuario/img/'.$nombrearchivo;
    		$consulta = $MU->Modificar_Profile_Foto($id,$ruta);
    		echo $consulta;
    	} else {
    		echo 0;
    	}
    } else {
    	echo 0;
    }
    
   

?>