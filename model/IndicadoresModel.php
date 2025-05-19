<?php

require_once __DIR__ . "/../config/database.php";
class IndicadoresModel
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    /* metodo para obtener los datos de los indicadores del dashboard */
    public function ObtenerIndicadores()
    {
        $trabajadores = $this->pdo->query("SELECT COUNT(*) AS total FROM usuarios WHERE habilitado = 1")->fetch();

        $faltas = $this->pdo->query("SELECT COUNT(*) AS total FROM asistencias WHERE estado = 'Falta'")->fetch();

        $tardanzas = $this->pdo->query("SELECT COUNT(*) AS total FROM asistencias WHERE estado = 'Tardanza'")->fetch();

        $stmt = $this->pdo->query("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(hora_fin, hora_inicio)))) AS total_horas FROM horarios");
        $horas = $stmt->fetch();

        return [
            'trabajadores' => $trabajadores['total'],
            'faltas' => $faltas['total'],
            'tardanzas' => $tardanzas['total'],
            'horas_esperadas' => $horas['total_horas'],
        ];
    }

    /* Metodo para obtener las horas trabajadas por mes */
    public function obtenerHorasTrabajadasPorMes()
    {
        $sql = "SELECT 
                MONTH(fecha) AS mes, 
                SUM(TIMESTAMPDIFF(SECOND, hora_entrada, hora_salida)) AS segundos_trabajados
            FROM asistencias
            WHERE estado IN ('Puntual', 'Tardanza')
            GROUP BY mes
            ORDER BY mes";

        $stmt = $this->pdo->query($sql);
        $resultados = [];

        while ($row = $stmt->fetch()) {
            $horas = floor($row['segundos_trabajados'] / 3600);
            $resultados[] = [
                'mes' => $row['mes'],
                'horas' => $horas
            ];
        }

        return $resultados;
    }

    /* Metodos para obtener las faltas, asistencias y tardanzas */
    public function obtenerEstadisticasDeAsistencia()
    {
        $totalAsistencias = $this->pdo->query("SELECT COUNT(*) AS total FROM asistencias WHERE estado IN ('Puntual', 'Tardanza', 'Falta')")->fetch();

        $puntuales = $this->pdo->query("SELECT COUNT(*) AS total FROM asistencias WHERE estado = 'Puntual'")->fetch();

        $porcentajePuntuales = 0;
        if ($totalAsistencias['total'] > 0) {
            $porcentajePuntuales = ($puntuales['total'] / $totalAsistencias['total']) * 100;
        }

        return [
            'total_asistencias' => $totalAsistencias['total'],
            'puntuales' => $puntuales['total'],
            'porcentaje_puntuales' => $porcentajePuntuales,
        ];
    }

    public function obtenerPorcentajeTardanzas()
    {
        $total = $this->pdo->query("SELECT COUNT(*) AS total FROM asistencias WHERE estado IN ('Puntual', 'Tardanza', 'Falta')")->fetch();
        $tardanzas = $this->pdo->query("SELECT COUNT(*) AS total FROM asistencias WHERE estado = 'Tardanza'")->fetch();

        $porcentaje = 0;
        if ($total['total'] > 0) {
            $porcentaje = ($tardanzas['total'] / $total['total']) * 100;
        }

        return [
            'porcentaje_tardanzas' => $porcentaje,
            'tardanzas' => $tardanzas['total'],
            'total' => $total['total']
        ];
    }
}
