<?php
require_once __DIR__ . '/../config/Database.php';

class User
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getAdminByDni($dni)
    {
        $stmt = $this->pdo->prepare("SELECT dni, nombre_completo, password, id_rol, habilitado FROM usuarios WHERE dni = ? AND habilitado = 1 LIMIT 1");
        $stmt->execute([$dni]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
