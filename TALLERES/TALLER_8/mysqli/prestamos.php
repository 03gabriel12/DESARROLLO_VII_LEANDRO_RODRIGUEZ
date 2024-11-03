<?php
include 'config.php';

// Función para registrar un préstamo
function registrarPrestamo($libro_id, $usuario_id, $fecha_prestamo) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO prestamos (libro_id, usuario_id, fecha_prestamo) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $libro_id, $usuario_id, $fecha_prestamo);
    return $stmt->execute();
}

// Función para listar préstamos activos con paginación
function listarPrestamosActivos($pagina, $limite) {
    global $mysqli;
    $offset = ($pagina - 1) * $limite;
    $stmt = $mysqli->prepare("SELECT * FROM prestamos WHERE fecha_devolucion IS NULL LIMIT ?, ?");
    $stmt->bind_param("ii", $offset, $limite);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Función para registrar devolución de un préstamo
function registrarDevolucion($prestamo_id, $fecha_devolucion) {
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE prestamos SET fecha_devolucion=? WHERE id=?");
    $stmt->bind_param("ii", $fecha_devolucion, $prestamo_id);
    return $stmt->execute();
}

// Función para mostrar historial de préstamos por usuario
function mostrarHistorialPrestamos($usuario_id) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM prestamos WHERE usuario_id=?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>