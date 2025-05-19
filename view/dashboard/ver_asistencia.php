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
</body>

</html>