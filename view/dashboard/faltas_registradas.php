<?php
session_start();

$usuario = $_SESSION['user']['nombre'] ?? 'Invitado';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Usuarios</title>
    <link rel="stylesheet" href="../../assets/css/justificar_falta.css">
</head>

<body>
    <?php
    include '../../templates/header.php';
    ?>

    <main>
        <div class="c-justificaciones">
            <h2>Faltas registradas</h2>

            <table id="tablaFaltas" border="1" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Se llenará por JS -->
                </tbody>
            </table>
        </div>
    </main>
    <script src="../../assets/js/faltas_registradas.js"></script>
</body>

</html>