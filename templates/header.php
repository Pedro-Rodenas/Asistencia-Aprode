<!-- Plantilla del header -->
<link rel="stylesheet" href="../assets/css/header.css">

<aside class="sidebar">
    <div class="header-top">
        <h2>Dashboard Asistencia</h2>
        <div class="logo-usuario">
            <img src="img/logo.png" alt="Logo" class="logo" />
            <span class="bienvenido">Bienvenido, <?php echo htmlspecialchars($usuario); ?></span>
        </div>
    </div>

    <nav class="menu">
        <a href="#">Enlace 1</a>
        <a href="#">Enlace 2</a>
        <a href="#">Enlace 3</a>
        <a href="#">Enlace 4</a>
        <a href="#">Enlace 5</a>
    </nav>

    <form action="logout.php" method="POST" class="logout-form">
        <button type="submit">Cerrar sesión</button>
    </form>
</aside>