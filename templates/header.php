<!-- Plantilla del header -->
<link rel="stylesheet" href="../../assets/css/header.css">

<aside class="sidebar">
    <div class="content-wrapper">
        <div class="header-top">
            <h2>Dashboard Asistencia</h2>
            <div class="logo-usuario">
                <span class="bienvenido">Bienvenido, <?php echo htmlspecialchars($usuario); ?></span>
            </div>
        </div>

        <nav class="menu">
            <a href="dashboard.php">Inicio</a>
            <a href="ver_asistencia.php">Asistencia</a>
            <a href="usuarios.php">Usuarios</a>
            <a href="faltas_registradas.php">Justificar Falta</a>
            <a href="asistencia_trabajador.php">Asistencia Trabajadores</a>
        </nav>
    </div>

    <form action="../../auth/logout.php" method="POST" class="logout-form">
        <button type="submit">Cerrar sesión</button>
    </form>
</aside>