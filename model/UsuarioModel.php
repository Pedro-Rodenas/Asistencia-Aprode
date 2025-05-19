<?php

require_once __DIR__ . "/../config/database.php";

class UsuarioModel
{
    private $pdo;

    public function __construct()
    {
        $db = new Database;
        $this->pdo = $db->getConnection();
    }

    public function obtenerTodosLosUsuarios()
    {
        $stmt = $this->pdo->query("SELECT dni, nombre_completo, celular, correo, puesto, habilitado FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
