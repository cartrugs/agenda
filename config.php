<?php

// Definir rutas a los directorios MVC (Modelo Vista Controlador)
define('CONTROLLER_PATH', __DIR__ . '/controlador/');
define('MODEL_PATH', __DIR__ . '/modelo/');
define('VIEW_PATH', __DIR__ . '/vistas/');

// URL base de la aplicación
define('BASE_URL', 'http://localhost:/agenda');

// Incluir archivo de conexión a la base de datos
require_once __DIR__ . '/conexion.php';

?>
