<?php

require_once __DIR__ . "/../model/HorariosModel.php";

class HorariosController
{
    private $HorarioModel;
    public function __construct()
    {
        $this->HorarioModel = new HorariosModel();
    }

    public function obtenerHorariosJson()
    {
        header('Content-Type: application/json');
        $horarios = $this->HorarioModel->obtenerHorarios();
        echo json_encode($horarios);
    }
}
