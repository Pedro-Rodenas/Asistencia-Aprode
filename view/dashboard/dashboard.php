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
<link rel="stylesheet" href="../../assets/css//dashboard.css">

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
        <section class="dashboard-cards">
            <div class="card dorado">
                <div class="card-icon">👤</div>
                <div class="card-info">
                    <h3>Trabajadores</h3>
                    <p><?php echo $datos['trabajadores']; ?> habilitados</p>
                </div>
            </div>

            <div class="card rojo">
                <div class="card-icon">📅</div>
                <div class="card-info">
                    <h3>Faltas</h3>
                    <p><?php echo $datos['faltas']; ?> registradas</p>
                </div>
            </div>

            <div class="card azul">
                <div class="card-icon">⏰</div>
                <div class="card-info">
                    <h3>Tardanzas</h3>
                    <p><?php echo $datos['tardanzas']; ?> registradas</p>
                </div>
            </div>

            <div class="card naranja">
                <div class="card-icon">⏳</div>
                <div class="card-info">
                    <h3>Horas esperadas</h3>
                    <p><?php echo $datos['horas_esperadas']; ?></p>
                </div>
            </div>
        </section>

        <section class="c-p-graficos">
            <!-- Aquí ira un gráfico de lineas, que se verá por meses, un grafico de lineas -->
            <section class="c-grafico-completo">
                <div id="grafico-horas-mensuales"></div>
            </section>

            <!-- aquí iran 3 graficos aun no se de que pero se dividiran en 2 columnas, el 3er contenedor ocupara 2 columnas -->
            <section class="c-grafico-3">
                <div class="graficos-3">
                    <h3>Aistencias Puntuales</h3>
                    <canvas id="grafico-dona-asistencia"></canvas>
                </div>
                <div class="graficos-3">
                    <h3>Asistencia Tardanzas</h3>
                    <canvas id="grafico-dona-tardanzas"></canvas>
                </div>
                <div class="graficos-3"></div>
            </section>
        </section>

        <section class="c-p-end-stads">
            <div class="c-users">
                <h2>Lista de Usuarios</h2>
                <table id="tabla-usuarios">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Puesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se insertan los usuarios desde JS -->
                    </tbody>
                </table>
            </div>
            <div class="c-horario">
                <h2>Horarios de los usuarios</h2>
                <table id="tabla-horarios">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Días</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../assets/js/grafico_horas.js"></script>
    <script src="../../assets/js/grafico_dona.js"></script>
    <script src="../../assets/js/grafico_tardanza.js"></script>
    <script src="../../assets/js/usuarios.js"></script>
    <script src="../../assets/js/horarios.js"></script>
</body>

</html>