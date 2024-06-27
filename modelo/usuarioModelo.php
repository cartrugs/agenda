<?php

// Incluir archivo de config.php donde están las rutas
// Verifica si el archivo ya ha sido incluido y si es así, no lo incluye de nuevo
require_once __DIR__ . '/../config.php';

// Función para obtener todos los usuarios
function obtenerUsuarios() {
    $pdo = conectarBD();
    $stmt = $pdo->query("SELECT id, nombre, apellidos, telefono, mail, provincia FROM contactos");
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}

// Función para obtener un usuario por ID
function obtenerUsuarioPorID($id) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT id, nombre, apellidos, telefono, mail,instagram, tiktok, domicilio, poblacion, provincia, pais, activo FROM contactos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// 
function obtenerListaPorId($id) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT nombre, apellidos, id From contactos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Función para agregar un nuevo usuario
function agregarUsuario($nombre, $apellidos, $telefono, $mail, $instagram, $tiktok, $domicilio, $poblacion, $provincia, $pais, $activo) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("INSERT INTO contactos (nombre, apellidos, telefono, mail, instagram, tiktok, domicilio, poblacion, provincia, pais, activo) VALUES (:nombre, :apellidos, :telefono, :mail, :instagram, :tiktok, :domicilio, :poblacion, :provincia, :pais, :activo)");
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':instagram', $instagram, PDO::PARAM_STR);
    $stmt->bindParam(':tiktok', $tiktok, PDO::PARAM_STR);
    $stmt->bindParam(':domicilio', $domicilio, PDO::PARAM_STR);
    $stmt->bindParam(':poblacion', $poblacion, PDO::PARAM_STR);
    $stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
    $stmt->bindParam(':pais', $pais, PDO::PARAM_STR);
    $stmt->bindParam(':activo', $activo, PDO::PARAM_BOOL);
    return $stmt->execute();
}

// Función para editar un usuario
function editarUsuario($id, $nombre, $apellidos, $telefono, $mail, $provincia) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("UPDATE contactos SET nombre = :nombre, apellidos = :apellidos, telefono = :telefono, mail = :mail, provincia = :provincia WHERE id = :id");
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR); 
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}


// Función para eliminar un usuario
function desactivarUsuario($id, $nombre) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("DELETE FROM contactos WHERE id = :id AND nombre = :nombre");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    return $stmt->execute();
}

?>