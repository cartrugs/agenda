<?php

// Función para conectar con la base de datos
function conectarBD() {
    $host = 'localhost';
    $dbname = 'AGENDA';
    $username = 'root';
    $password = '';

    try {
        // PDO (PHP Data Objects)
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
    } catch (PDOEXCEPTION $e) {
        die("Error en la conexión: " . $e->getMessage());
    }
}
?>