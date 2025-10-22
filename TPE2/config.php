<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DB', 'tienda_ropa');

define('BASE_URL', 'http://localhost/TPE2/');

// conexión global (para test rápido)
function getPDO() {
    $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
