<?php

require_once __DIR__ . "/../config/database.php";

class AsistenciaModel
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    /* Metodo para obtener trabajadores según el dni ingresado */
    public function ObtenerDatosPorTrabajador($dni)
    {
        /* Consulta sql para verificar si el dni está en la bd y si pertenece a alguien que tiene el 
        rol trabajador y si está habiltiado */
        $sql = "SELECT * FROM usuarios WHERE dni = ? AND id_rol = 2 AND habilitado = 1";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$dni]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* Aquí obtendremos los horarios del dia */
    public function HorariosDelDia($dni)
    {
        /* Obtengo el dia de la semana en español */
        $dias = ['Sunday' => 'Domingo', 'Monday' => 'Lunes', 'Tuesday' => 'Martes', 'Wednesday' => 'Miércoles', 'Thursday' => 'Jueves', 'Friday' => 'Viernes', 'Saturday' => 'Sábado'];

        /* l Devuelve el dia del nombre en ingles */
        $hoy = $dias[date('l')];

        $sql = "SELECT * FROM horarios WHERE dni = ? AND dia_semana = ?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$dni, $hoy]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* Obtener la asistencia del dia de hoy */
    public function ObtenerAsistenciaDeHoy($dni)
    {
        $fechaHoy = date("Y-m-d");
        $sql = "SELECT * FROM asistencias WHERE dni = ? AND fecha = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$dni, $fechaHoy]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function MarcarEntrada($dni)
    {
        try {
            $sql = "INSERT INTO asistencias (dni, fecha, hora_entrada, estado) VALUES (?, CURDATE(), NOW(), 
                IF(TIME(NOW()) <= '09:20:00', 'puntual', 'tardanza'))";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$dni]);
            return $result;
        } catch (PDOException $e) {
            error_log('Error en MarcarEntrada: ' . $e->getMessage());
            return false;
        }
    }

    public function MarcarSalida($dni)
    {
        try {
            $sql = "UPDATE asistencias SET hora_salida = NOW() WHERE dni = ? AND fecha = CURDATE() AND hora_salida IS NULL";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$dni]);
            return $result;
        } catch (PDOException $e) {
            error_log('Error en MarcarSalida: ' . $e->getMessage());
            return false;
        }
    }
}
