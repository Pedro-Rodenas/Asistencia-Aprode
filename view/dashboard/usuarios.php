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
    <link rel="stylesheet" href="../../assets/css/anadir_usuario.css">
</head>

<body>
    <?php
    include '../../templates/header.php';
    ?>
    <div class="modal-overlay" id="overlay"></div>

    <main>
        <h2>Gestión de Usuarios</h2>
        <button onclick="abrirFormulario()">Nuevo Usuario</button>
        <table id="tabla-usuarios">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Puesto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div id="formulario-usuario">
            <h3 id="form-titulo">Nuevo Usuario</h3>
            <form id="formUsuario">
                <input type="hidden" name="modo" value="crear">

                <div><input type="text" name="dni" placeholder="DNI" required></div>
                <div><input type="text" name="nombre_completo" placeholder="Nombre completo" required></div>
                <div><input type="email" name="correo" placeholder="Correo"></div>
                <div><input type="text" name="celular" placeholder="Celular"></div>
                <div><input type="text" name="puesto" placeholder="Puesto"></div>
                <div id="password-wrapper">
                    <input type="password" name="password" placeholder="Contraseña">
                </div>

                <div><input type="number" name="id_rol" placeholder="ID Rol"></div>

                <div>
                    <button type="submit">Guardar</button>
                    <button type="button" onclick="cerrarFormulario()">Cancelar</button>
                </div>
            </form>
        </div>

    </main>
    <script src="../../assets/js/anadir_usuario.js"></script>
</body>

</html>