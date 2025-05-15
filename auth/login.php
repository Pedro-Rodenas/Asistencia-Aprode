<?php
require_once __DIR__ . '/../controller/LoginController.php';

$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->authenticate();
} else {
    $loginController->showLogin();
}
