<?php
// index.php - raíz del proyecto
session_start();

// incluir configuración principal
require_once __DIR__ . '/config.php';

// delegar el manejo de rutas al router
require_once __DIR__ . '/router.php';
