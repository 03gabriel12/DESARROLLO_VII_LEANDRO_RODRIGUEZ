<?php
include 'config.php';

// Función para registrar un usuario
function registrarUsuario($nombre, $email, $contrasena) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)");
    return $stmt->execute([$nombre, $email, $contrasena]);
}

// Función para listar usuarios con paginación
function listarUsuarios($pagina, $limite) {
    global $pdo;
    $offset = ($pagina - 1) * $limite;
    $stmt = $pdo->prepare("SELECT * FROM usuarios LIMIT ?, ?");
    $stmt->bindValue(1, $offset, PDO::PARAM_INT);
    $stmt->bindValue(2, $limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para buscar usuarios
function buscarUsuarios($campo, $valor) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE $campo LIKE ?");
    $stmt->execute(["%$valor%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para actualizar un usuario
function actualizarUsuario($id, $nombre, $email, $contrasena) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE usuarios SET nombre=?, email=?, contrasena=? WHERE id=?");
    return $stmt->execute([$nombre, $email, $contrasena, $id]);
}

// Función para eliminar un usuario
function eliminarUsuario($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id=?");
    return $stmt->execute([$id]);
}
?>