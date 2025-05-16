<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <div class="login-link">
        <a href="asistencia.php">
            <span style="color: #2B2D6E; font-weight: bold;">Regresar</span>
        </a>
    </div>
    <div class="login-container">
        <h2>Login Dashboard</h2>
        <form action="../auth/login.php" method="POST">
            <input type="text" name="dni" placeholder="DNI" required autocomplete="username" />
            <input type="password" name="password" placeholder="Contraseña" required autocomplete="current-password" />
            <button type="submit">Ingresar</button>

            <!-- Mostrar error si existe -->
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>