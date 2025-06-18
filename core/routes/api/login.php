<?php
    require_once '../../../modules/authentication/AuthController.php';
    $data = json_decode(file_get_contents('php://input'), true);

    $controller = new AuthController();

    $controller->login($data['username'], $data['password']);

?>