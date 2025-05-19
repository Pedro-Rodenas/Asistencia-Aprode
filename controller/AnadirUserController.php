<?php
require_once __DIR__ . "/../model/AnadirUserModel.php";

class AnadirUserController
{
    private $AnadirUserModel;
    public function __construct()
    {
        $this->AnadirUserModel = new AnadirUserModel();
    }

    public function listarUsuariosJson()
    {
        header('Content-Type: application/json');
        echo json_encode($this->AnadirUserModel->obtenerUsuarios());
    }

    public function crearUsuarioJson()
    {
        $datos = json_decode(file_get_contents("php://input"), true);
        $this->AnadirUserModel->crearUsuario($datos);
    }

    public function actualizarUsuarioJson()
    {
        $datos = json_decode(file_get_contents("php://input"), true);
        $this->AnadirUserModel->actualizarUsuario($datos);
    }

    public function deshabilitarUsuarioJson()
    {
        $datos = json_decode(file_get_contents("php://input"), true);
        $this->AnadirUserModel->deshabilitarUsuario($datos['dni']);
    }
}
