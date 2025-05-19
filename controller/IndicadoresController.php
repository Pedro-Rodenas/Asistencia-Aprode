<?php

require_once __DIR__ . "/../model/IndicadoresModel.php";

class IndicadoresController
{
    private  $IndicadoresModel;

    public function __construct()
    {
        $this->IndicadoresModel = new IndicadoresModel;
    }

    public function obtenerDatos()
    {
        return $this->IndicadoresModel->ObtenerIndicadores();
    }

    public function obtenerHorasJson()
    {
        header('Content-Type: application/json');
        $horas = $this->IndicadoresModel->obtenerHorasTrabajadasPorMes();
        echo json_encode($horas);
    }

    public function obtenerEstadisticasJson()
    {
        header('Content-Type: application/json');
        $estadisticas = $this->IndicadoresModel->obtenerEstadisticasDeAsistencia();
        echo json_encode($estadisticas);
    }

    public function obtenerTardanzasJson()
    {
        header('Content-Type: application/json');
        $data = $this->IndicadoresModel->obtenerPorcentajeTardanzas();
        echo json_encode($data);
    }
}
