
<?php
require_once __DIR__ . '/../../config.php';

class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = getPDO();
    }

    // Buscar usuario por nombre
    public function getByUsuario($usuario) {
        $query = $this->db->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Crear un nuevo usuario (por si querés registrar más adelante)
    public function create($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->db->prepare("INSERT INTO usuario (usuario, contrasena) VALUES (?, ?)");
        return $query->execute([$username, $hash]);
    }
}
