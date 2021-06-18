<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nom_ape = htmlspecialchars($_POST['nom_ape'],ENT_QUOTES,'UTF-8');
    $tel = htmlspecialchars($_POST['tel'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $usu_re = htmlspecialchars($_POST['usu_re'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $doc = htmlspecialchars($_POST['doc'],ENT_QUOTES,'UTF-8');
    
    
    $consulta = $MU->Modificar_Datos_Perfile($id,$usu_re,$tel,$email,$nom_ape,$sexo,$doc);
    echo $consulta;

?>