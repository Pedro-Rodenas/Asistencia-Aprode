<?php
require_once __DIR__ . '/../controller/UsuariosController.php';

$controller = new UsuariosController();
$controller->obtenerUsuariosJson();
