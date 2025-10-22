<?php
require_once __DIR__ . '/app/controllers/producto.controller.php';
require_once __DIR__ . '/app/controllers/categoria.controller.php';
require_once __DIR__ . '/app/controllers/auth.controller.php';
require_once __DIR__ . '/config.php';

$action = $_GET['action'] ?? 'productos';
$params = explode('/', $action);

switch ($params[0]) {

    // --- PÚBLICO ---
    case 'productos':
        $controller = new ProductoController();
        if (isset($params[1]))
            $controller->showProducto($params[1]);
        else
            $controller->showProductos();
        break;

    case 'categorias':
        $controller = new CategoriaController();
        $controller->showCategorias();
        break;

    case 'categoria':
        $controller = new CategoriaController();
        $controller->showCategoria($params[1]);
        break;

    // --- ADMIN ---
    case 'admin_productos':
        $controller = new ProductoController();
        $controller->adminProductos();
        break;
    case 'add_producto':
        $controller = new ProductoController();
        $controller->addProducto();
        break;
    case 'delete_producto':
        $controller = new ProductoController();
        $controller->deleteProducto($params[1]);
        break;
    case 'edit_producto':
        $controller = new ProductoController();
        $controller->editProducto($params[1]);
        break;

    case 'admin_categorias':
        $controller = new CategoriaController();
        $controller->adminCategorias();
        break;
    case 'add_categoria':
        $controller = new CategoriaController();
        $controller->addCategoria();
        break;
    case 'delete_categoria':
        $controller = new CategoriaController();
        $controller->deleteCategoria($params[1]);
        break;
    case 'edit_categoria':
        $controller = new CategoriaController();
        $controller->editCategoria($params[1]);
        break;

    // --- LOGIN ---
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'verify':
        $controller = new AuthController();
        $controller->verifyLogin();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    default:
        echo "<h2>Página no encontrada</h2>";
        break;
}
