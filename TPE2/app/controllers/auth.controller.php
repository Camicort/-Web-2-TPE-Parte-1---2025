<?php
require_once __DIR__ . '/../models/usuario.model.php';

class AuthController {
    public function showLogin() {
        require './app/views/auth.view.php';
    }

    public function verifyLogin() {
        $user = $_POST['usuario'];
        $pass = $_POST['contrasena'];

        if ($user === 'webadmin' && $pass === 'admin') {
            session_start();
            $_SESSION['USER'] = $user;
            header("Location: " . BASE_URL . "admin_productos");
        } else {
            $error = "Usuario o contraseña incorrectos";
            require './app/views/auth.view.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "productos");
    }
}
