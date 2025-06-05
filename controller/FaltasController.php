<?php
require_once __DIR__ . '/../model/AsistenciaModel.php';

class FaltasController
{
    private $model;

    public function __construct()
    {
        $this->model = new AsistenciaModel();
    }

    public function listarFaltas($fecha = null)
    {
        return $this->model->ObtenerFaltas($fecha);
    }

    public function justificarFalta($dni, $fecha)
    {
        return $this->model->JustificarFalta($dni, $fecha);
    }

    public function listarTrabajadores()
    {
        return $this->model->ObtenerTrabajadoresActivos();
    }

    public function listarAsistenciasPorTrabajador($dni)
    {
        return $this->model->ObtenerAsistenciasPorDni($dni);
    }
}

/* === Peticiones AJAX === */

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $ctrl = new FaltasController();

    if (isset($_GET['accion'])) {
        switch ($_GET['accion']) {
            case 'listar':
                header('Content-Type: application/json');
                $fecha = $_GET['fecha'] ?? null;
                echo json_encode($ctrl->listarFaltas($fecha));
                exit;

            case 'trabajadores':
                header('Content-Type: application/json');
                echo json_encode($ctrl->listarTrabajadores());
                exit;

            case 'asistencias':
                if (isset($_GET['dni'])) {
                    header('Content-Type: application/json');
                    echo json_encode($ctrl->listarAsistenciasPorTrabajador($_GET['dni']));
                    exit;
                }
                break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'justificar') {
    header('Content-Type: application/json');
    $ctrl = new FaltasController();

    $dni = $_POST['dni'] ?? null;
    $fecha = $_POST['fecha'] ?? null;

    if ($dni && $fecha) {
        $resultado = $ctrl->justificarFalta($dni, $fecha);
        if ($resultado) {
            echo json_encode(['status' => 'ok', 'message' => 'Falta justificada correctamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se pudo justificar la falta']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Parámetros inválidos']);
    }
    exit;
}
