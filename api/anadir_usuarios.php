<?php
require_once __DIR__ . "/../controller/AnadirUserController.php";

$controller = new AnadirUserController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $controller->listarUsuariosJson();
        break;
    case 'POST':
        $controller->crearUsuarioJson();
        break;
    case 'PUT':
        $controller->actualizarUsuarioJson();
        break;
    case 'DELETE':
        $controller->deshabilitarUsuarioJson();
        break;
}
