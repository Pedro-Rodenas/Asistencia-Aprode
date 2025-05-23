<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Asistencia</title>
    <link rel="stylesheet" href="../assets/css/asistencia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="login-link">
        <a href="login_admin.php">
            <i class="fas fa-user-shield"></i>
        </a>
    </div>


    <div class="contenedor">
        <h1>Registro de Asistencia</h1>

        <form id="form-asistencia">
            <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI" required>
            <div class="botones">
                <button type="button" id="btn-llegada" disabled>Marcar Llegada</button>
                <button type="button" id="btn-salida" disabled>Marcar Salida</button>
            </div>
        </form>

        <div id="respuesta" class="respuesta"></div>
    </div>

    <script src="../assets/js/asistencia.js"></script>
</body>

</html>