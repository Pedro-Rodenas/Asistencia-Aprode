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
}

/* Peticiones en AJAX */

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accion']) && $_GET['accion'] === 'listar') {
    header('Content-Type: application/json');
    $ctrl = new FaltasController();

    $fecha = $_GET['fecha'] ?? null;

    $faltas = $ctrl->listarFaltas($fecha);
    echo json_encode($faltas);
    exit;
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
