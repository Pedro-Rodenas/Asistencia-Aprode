<?php
session_start();

$usuario = $_SESSION['user']['nombre'] ?? 'Invitado';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Asistencia</title>
    <link rel="stylesheet" href="../../assets/css/ver_asistencia.css">
</head>

<body>
    <?php
    include '../../templates/header.php';
    ?>

    <main>
        <div class="c-asistencias">
            <h2>Registro de Asistencias</h2>
            <table id="tabla-asistencias">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora de entrada</th>
                        <th>Hora de salida</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>

    </main>
    <script src="../../assets/js/ver_asistencia.js"></script>
</body>

</html>