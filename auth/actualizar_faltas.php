<?php
require_once __DIR__ . '/../model/AsistenciaModel.php';

$model = new AsistenciaModel();

$fechaHoy = date('Y-m-d');

// Obtener trabajadores que faltaron
$faltantes = $model->ObtenerFaltantesDelDia($fechaHoy);

foreach ($faltantes as $dni) {
    $model->RegistrarFalta($dni, $fechaHoy);
}

echo "Faltas actualizadas para $fechaHoy.\n";