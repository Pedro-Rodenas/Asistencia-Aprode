<?php
require_once __DIR__ . '/../controller/VerAsistenciaController.php';

$controller = new VerAsistenciaController();
$controller->obtenerAsistenciasJson();
