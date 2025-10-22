<?php
require_once __DIR__ . '/../models/categoria.model.php';
require_once __DIR__ . '/../models/producto.model.php';

class CategoriaController {
    private $categoriaModel;
    private $productoModel;

    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
        $this->productoModel = new ProductoModel();
        session_start();
    }

    public function showCategorias() {
        $categorias = $this->categoriaModel->getAll();
        require './app/views/categoria.view.phtml';
    }

    public function showCategoria($id) {
        $categoria = $this->categoriaModel->getById($id);
        $productos = $this->productoModel->findByCategoria($id);
        require './app/views/producto.view.phtml';
    }

    public function adminCategorias() {
        $this->checkLogin();
        $categorias = $this->categoriaModel->getAll();
        require './app/views/categoria.view.phtml';
    }

    public function addCategoria() {
        $this->checkLogin();
        $this->categoriaModel->insert($_POST['nombre'], $_POST['descripcion'], $_POST['responsable']);
        header("Location: " . BASE_URL . "admin_categorias");
    }

    public function editCategoria($id) {
        $this->checkLogin();
        $this->categoriaModel->update($id, $_POST['nombre'], $_POST['descripcion'], $_POST['responsable']);
        header("Location: " . BASE_URL . "admin_categorias");
    }

    public function deleteCategoria($id) {
        $this->checkLogin();
        $this->categoriaModel->delete($id);
        header("Location: " . BASE_URL . "admin_categorias");
    }

    private function checkLogin() {
        if (!isset($_SESSION['USER'])) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }
}
