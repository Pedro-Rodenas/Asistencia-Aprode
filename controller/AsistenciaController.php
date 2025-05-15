<?php

use LDAP\Result;

require_once __DIR__ . "/../model/AsistenciaModel.php";

class AsistenciaController
{
    private $AsistenciaModel;

    public function __construct()
    {
        $this->AsistenciaModel = new AsistenciaModel();
    }

    /* Verificamos asistencia */
    public function VerficarAsistencia($dni)
    {

        $usuario = $this->AsistenciaModel->ObtenerDatosPorTrabajador($dni);

        /* 1.- Verificamos si el trabajador es valido */
        if (!$usuario) {
            return ['status' => 'error', 'mensaje' => 'DNI no valido o usario no habilitado'];
        }

        /* 2.- Verificamos si tiene horario hoy */
        $horario = $this->AsistenciaModel->HorariosDelDia($dni);
        if (!$horario) {
            return ['status' => 'error', 'mensaje' => 'No tiene horario asignado para hoy.'];
        }

        /* 3.- Verificamos si ya marcó asistencia el dia de hoy */
        $asistenciaHoy = $this->AsistenciaModel->ObtenerAsistenciaDeHoy($dni);

        if (!$asistenciaHoy) {
            /* Si no marcó nada, puede marcar la entrada */
            return [
                'status' => 'ok',
                'tipo' => 'entrada',
                'nombre' => $usuario['nombre_completo']
            ];
        }

        if ($asistenciaHoy && is_null($asistenciaHoy['hora_salida'])) {

            /* Marcó entrada pero no salida */
            return [
                'status' => 'ok',
                'tipo' => 'salida',
                'nombre' => $usuario['nombre_completo']
            ];
        }

        /* Ya marcó entrada y salida */
        return [
            'status' => 'ok',
            'tipo' => 'completo',
            'mensaje' => 'Ya marcó entrada y salida hoy.'
        ];
    }

    public function MarcarLlegada($dni)
    {
        $resultado = $this->AsistenciaModel->MarcarEntrada($dni);
        if ($resultado) {
            return ['status' => 'ok', 'message' => 'Entrada marcada correctamente.'];
        } else {
            return ['status' => 'error', 'message' => 'Error al marcar entrada.'];
        }
    }


    public function MarcarSalida($dni)
    {
        $resultado = $this->AsistenciaModel->MarcarSalida($dni);
        if ($resultado) {
            return ['status' => 'ok', 'message' => 'Salida marcada correctamente.'];
        } else {
            return ['status' => 'error', 'message' => 'Error al marcar salida.'];
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'verificar' && isset($_GET['dni'])) {
    header('Content-Type: application/json');
    $controller = new AsistenciaController();
    $respuesta = $controller->VerficarAsistencia($_GET['dni']);
    echo json_encode($respuesta);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);

    $controller = new AsistenciaController();

    if (isset($data['accion'], $data['dni'])) {
        if ($data['accion'] === 'llegada') {
            echo json_encode($controller->MarcarLlegada($data['dni']));
            exit;
        }
        if ($data['accion'] === 'salida') {
            echo json_encode($controller->MarcarSalida($data['dni']));
            exit;
        }
    }

    echo json_encode(['status' => 'error', 'message' => 'Acción o DNI inválido.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);

    $controller = new AsistenciaController();

    if (isset($data['accion'], $data['dni'])) {
        if ($data['accion'] === 'llegada') {
            echo json_encode($controller->MarcarLlegada($data['dni']));
            exit;
        }
        if ($data['accion'] === 'salida') {
            echo json_encode($controller->MarcarSalida($data['dni']));
            exit;
        }
    }

    echo json_encode(['status' => 'error', 'message' => 'Acción o DNI inválido.']);
    exit;
}
