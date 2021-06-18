<?php
    require '../../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    $consulta = $MU->listar_combo_pais();
    echo json_encode($consulta);
?>