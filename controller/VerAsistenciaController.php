<?php

require_once __DIR__ . "/../model/VerAsistenciaModel.php";

class VerAsistenciaController
{
    private $VerAsistenciaModel;

    public function __construct()
    {
        $this->VerAsistenciaModel = new VerAsistenciaModel();
    }
    public function obtenerAsistenciasJson()
    {
        header('Content-Type: application/json');
        echo json_encode($this->VerAsistenciaModel->obtenerAsistencias());
    }
}
