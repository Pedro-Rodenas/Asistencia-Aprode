<?php

require_once __DIR__ . "/../config/database.php";

date_default_timezone_set('America/Lima');

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
        $dias = [
            'Sunday' => 'Domingo',
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado'
        ];

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

    /* Metodo para marcar Entrada */
    public function MarcarEntrada($dni)
    {
        try {

            $horario = $this->HorariosDelDia($dni);
            if (!$horario) {
                $estado = "Sin horario";
            } else {
                $horarlimite = date('H:i:s', strtotime($horario['hora_inicio'] . '+ 20 minutos'));
                $horaAhora = date('H:i:s');

                if ($horaAhora <= $horarlimite) {
                    $estado = "puntual";
                } else {
                    $estado = "tardanza";
                }
            }

            $sql = "INSERT INTO asistencias (dni, fecha, hora_entrada, estado) VALUES (?, CURDATE(), NOW(), ?)";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$dni, $estado]);

            return $result;
        } catch (PDOException $e) {
            error_log('Error en MarcarEntrada: ' . $e->getMessage());
            return false;
        }
    }

    /* Metodo para marcar la salida */
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

    /* Metodo para registrar con falta si no se marca asistencia */
    public function RegistrarFalta($dni, $fecha)
    {
        try {
            $sql = "INSERT INTO asistencias (dni, fecha, estado) VALUES (?,?,'falta')";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$dni, $fecha]);
            return $result;
        } catch (PDOException $e) {
            error_log('Error en RegistrarFalta: ' . $e->getMessage());
            return false;
        }
    }

    /* Metodo para obtener todos los horarios de los trabajadores */
    public function ObtenerTrabajadoresConHorario($fecha)
    {
        $dias = ['Sunday' => 'Domingo', 'Monday' => 'Lunes', 'Tuesday' => 'Martes', 'Wednesday' => 'Miércoles', 'Thursday' => 'Jueves', 'Friday' => 'Viernes', 'Saturday' => 'Sábado'];
        $diaSemana = $dias[date('l', strtotime($fecha))];

        /* Obtenemos todos los trabajadores habilitados que tengan horario ese día */
        $sql = "SELECT DISTINCT u.dni FROM usuarios u INNER JOIN horarios h ON u.dni = h.dni WHERE u.id_rol = 2 AND u.habilitado = 1 AND h.dia_semana = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$diaSemana]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /* Metodo para verificar que trabajadores faltaron el dia */
    public function ObtenerFaltantesDelDia($fecha)
    {
        $trabajadoresConHorario = $this->ObtenerTrabajadoresConHorario($fecha);

        $faltantes = [];

        foreach ($trabajadoresConHorario as $dni) {
            $sql = "SELECT COUNT(*) FROM asistencias WHERE dni = ? AND fecha = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$dni, $fecha]);
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                $faltantes[] = $dni;
            }
        }

        return $faltantes;
    }

    /* Metodo para traer todas las asistencias con estado en falta */
    public function ObtenerFaltas($fecha = null)
    {
        $sql = "SELECT a.*, u.nombre_completo FROM asistencias a 
            JOIN usuarios u ON a.dni = u.dni
            WHERE a.estado = 'falta'";

        if ($fecha) {
            $sql .= " AND a.fecha = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$fecha]);
        } else {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Metodo para justificar la falta */
    public function JustificarFalta($dni, $fecha)
    {
        $sql = "UPDATE asistencias SET estado = 'Justificada' WHERE dni = ? AND fecha = ? AND estado = 'falta'";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$dni, $fecha]);
    }
}
