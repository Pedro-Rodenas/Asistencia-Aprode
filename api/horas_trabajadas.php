<?php
// api/horas-trabajadas.php
require_once __DIR__ . '/../controller/IndicadoresController.php';

$controller = new IndicadoresController();
$controller->obtenerHorasJson(); // método del controlador que usa el modelo