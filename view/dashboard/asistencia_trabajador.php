<?php
session_start();

if (!isset($datos)) {
    require_once __DIR__ . '/../../controller/IndicadoresController.php';
    $controller = new IndicadoresController();
    $datos = $controller->obtenerDatos();
}
$usuario = $_SESSION['user']['nombre'] ?? 'Invitado';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../../assets/css/asistencia_trabajador.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inicio</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
    include __DIR__ . '/../../templates/header.php';

    ?>
    <main>
        <section class="c-asistencia-trabajador">
            <h2>Asistencias por Trabajador</h2>

            <label for="trabajador">Selecciona un trabajador:</label>
            <select id="trabajador"></select>

            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Dni</th>
                        <th>Hora de entrada</th>
                        <th>Hora de salida</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="tabla-asistencias"></tbody>
            </table>
        </section>
    </main>
    <script src="../../assets/js/asistencias_por_trabajador.js"></script>
</body>

</html>