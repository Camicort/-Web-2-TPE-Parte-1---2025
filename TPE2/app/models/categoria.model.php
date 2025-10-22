<?php
require_once __DIR__ . '/../../config.php';

class CategoriaModel {
    private $db;

    public function __construct() {
        $this->db = getPDO();
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM categoria");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($nombre, $descripcion, $responsable) {
        $query = $this->db->prepare("INSERT INTO categoria (nombre, descripcion, responsable) VALUES (?, ?, ?)");
        $query->execute([$nombre, $descripcion, $responsable]);
    }

    public function update($id, $nombre, $descripcion, $responsable) {
        $query = $this->db->prepare("UPDATE categoria SET nombre=?, descripcion=?, responsable=? WHERE id_categoria=?");
        $query->execute([$nombre, $descripcion, $responsable, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $query->execute([$id]);
    }
}
