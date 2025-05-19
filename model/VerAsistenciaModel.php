<?php
require_once __DIR__ . "/../config/database.php";

class VerAsistenciaModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database;
        $this->pdo = $db->getConnection();
    }

    public function obtenerAsistencias()
    {
        $sql = "SELECT 
                a.dni,
                u.nombre_completo,
                a.fecha,
                a.hora_entrada,
                a.hora_salida,
                a.estado
            FROM asistencias a
            LEFT JOIN usuarios u ON a.dni = u.dni
            ORDER BY a.fecha ASC";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
