<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login_admin.php');
    exit;
}

// Aquí va todo el contenido de tu dashboard
echo "Bienvenido, " . htmlspecialchars($_SESSION['user']['nombre']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inicio</title>
</head>

<body>
    <a href="../../auth/logout.php">Cerrar sesión</a>
</body>

</html>