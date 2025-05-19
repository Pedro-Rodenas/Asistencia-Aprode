<?php
require_once __DIR__ . "/../config/database.php";

class AnadirUserModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database;
        $this->pdo = $db->getConnection();
    }

    /* 1.- Obtener todos los usuarios */
    public function obtenerUsuarios()
    {
        $sql = "SELECT * FROM usuarios WHERE habilitado = 1";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /* 2.- Obtener usuario por dni */
    public function obtenerUsuario($dni)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE dni = ?");
        $stmt->execute([$dni]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* 3.- Registrar usuario */
    public function crearUsuario($data)
    {
        $sql = "INSERT INTO usuarios (dni, nombre_completo, celular, correo, puesto, habilitado, password, id_rol)
            VALUES (?, ?, ?, ?, ?, 1, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['dni'],
            $data['nombre_completo'],
            $data['celular'],
            $data['correo'],
            $data['puesto'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['id_rol']
        ]);
    }

    /* 4.- Actualizar Usuario */
    public function actualizarUsuario($data)
    {
        $sql = "UPDATE usuarios SET nombre_completo = ?, celular = ?, correo = ?, puesto = ?, id_rol = ? WHERE dni = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['nombre_completo'],
            $data['celular'],
            $data['correo'],
            $data['puesto'],
            $data['id_rol'],
            $data['dni']
        ]);
    }

    /* 5.- Desahbilitar usuario */
    public function deshabilitarUsuario($dni)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET habilitado = 0 WHERE dni = ?");
        return $stmt->execute([$dni]);
    }
}
