<?php
    require '../../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    $idpais  = $_POST['idpais'];
    $consulta = $MU->listar_combo_departamento($idpais);
    echo json_encode($consulta);
?>