<?php
require_once __DIR__ . '/../../config.php';

class ProductoModel {
    private $db;

    public function __construct() {
        $this->db = getPDO();
    }

    public function getAll() {
        $query = $this->db->prepare("
            SELECT p.*, c.nombre AS categoria
            FROM producto p
            JOIN categoria c ON p.id_categoria = c.id_categoria
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        $query = $this->db->prepare("
            SELECT p.*, c.nombre AS categoria
            FROM producto p
            JOIN categoria c ON p.id_categoria = c.id_categoria
            WHERE id_producto = ?
        ");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function findByCategoria($id_categoria) {
        $query = $this->db->prepare("
            SELECT p.*, c.nombre AS categoria
            FROM producto p
            JOIN categoria c ON p.id_categoria = c.id_categoria
            WHERE p.id_categoria = ?
        ");
        $query->execute([$id_categoria]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($nombre, $precio, $id_categoria) {
        $query = $this->db->prepare("INSERT INTO producto (nombre, precio, id_categoria) VALUES (?, ?, ?)");
        $query->execute([$nombre, $precio, $id_categoria]);
    }

    public function update($id, $nombre, $precio, $id_categoria) {
        $query = $this->db->prepare("UPDATE producto SET nombre=?, precio=?, id_categoria=? WHERE id_producto=?");
        $query->execute([$nombre, $precio, $id_categoria, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
        $query->execute([$id]);
    }
}
