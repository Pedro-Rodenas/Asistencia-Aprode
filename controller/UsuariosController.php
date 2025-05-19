<?php

require_once __DIR__ . "/../model/UsuarioModel.php";

class UsuariosController
{
    private $UsuariosModel;
    public function __construct()
    {
        $this->UsuariosModel = new UsuarioModel();
    }

    public function obtenerUsuariosJson()
    {
        header('Content-Type: application/json');
        $usuarios = $this->UsuariosModel->obtenerTodosLosUsuarios();
        echo json_encode($usuarios);
    }

    
}
