<?php
require_once __DIR__ . '/../controller/IndicadoresController.php';

$controller = new IndicadoresController();
$controller->obtenerTardanzasJson();
