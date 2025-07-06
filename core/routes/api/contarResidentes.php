<?php
    require_once '../../../modules/residentes/ResidenteController.php';

    // $data = json_decode(file_get_contents('php://input'), true);

    $controller = new ResidenteController();

    $controller->countResidentesByEdadCategoria();

?>