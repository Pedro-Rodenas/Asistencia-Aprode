<?php
require_once __DIR__ . '/../model/User.php';

class LoginController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function showLogin()
    {
        $error = '';
        include __DIR__ . '/../view/login_admin.php';
    }

    public function authenticate()
    {
        session_start();

        $dni = $_POST['dni'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$dni || !$password) {
            $error = "Por favor ingrese DNI y contraseña.";
            include __DIR__ . '/../view/login_admin.php';
            return;
        }

        $user = $this->userModel->getAdminByDni($dni);

        if ($user && $password === $user['password']) {
            $_SESSION['user'] = [
                'dni' => $user['dni'],
                'nombre' => $user['nombre_completo'],
                // 'rol' => $user['rol'] // si tienes el campo id_rol
            ];
            header('Location: ../view/dashboard/dashboard.php');
            exit;
        } else {
            $error = "DNI o contraseña incorrectos.";
            include __DIR__ . '/../view/login_admin.php';
        }
    }
}
