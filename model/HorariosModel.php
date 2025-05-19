<?php

require_once __DIR__ . "/../config/database.php";

class HorariosModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    /* Método para obtener los horarios de todos los usuarios */
    public function obtenerHorarios()
    {
        $sql = "SELECT dni, dia_semana, hora_inicio, hora_fin FROM horarios ORDER BY dni, dia_semana";
        $stmt = $this->pdo->query($sql);
        $resultados = [];

        while ($row = $stmt->fetch()) {
            $resultados[] = [
                'dni' => $row['dni'],
                'dia_semana' => $row['dia_semana'],
                'hora_inicio' => $row['hora_inicio'],
                'hora_fin' => $row['hora_fin']
            ];
        }

        return $resultados;
    }
}
