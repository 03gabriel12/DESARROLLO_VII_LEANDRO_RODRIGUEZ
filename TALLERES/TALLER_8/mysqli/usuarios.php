<?php
include 'config.php';

// Función para registrar un usuario
function registrarUsuario($nombre, $email, $contrasena) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO usuarios (nombre , email, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $contrasena);
    return $stmt->execute();
}

// Función para listar usuarios con paginación
function listarUsuarios($pagina, $limite) {
    global $mysqli;
    $offset = ($pagina - 1) * $limite;
    $stmt = $mysqli->prepare("SELECT * FROM usuarios LIMIT ?, ?");
    $stmt->bind_param("ii", $offset, $limite);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Función para buscar usuarios
function buscarUsuarios($campo, $valor) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE $campo LIKE ?");
    $valor = "%$valor%";
    $stmt->bind_param("s", $valor);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Función para actualizar un usuario
function actualizarUsuario($id, $nombre, $email, $contrasena) {
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE usuarios SET nombre=?, email=?, contrasena=? WHERE id=?");
    $stmt->bind_param("sssi", $nombre, $email, $contrasena, $id);
    return $stmt->execute();
}

// Función para eliminar un usuario
function eliminarUsuario($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>