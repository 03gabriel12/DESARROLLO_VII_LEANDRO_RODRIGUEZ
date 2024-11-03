<?php
include 'config.php';

// Función para registrar un préstamo
function registrarPrestamo($libro_id, $usuario_id, $fecha_prestamo) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO prestamos (libro_id, usuario_id, fecha_prestamo) VALUES (?, ?, ?)");
    return $stmt->execute([$libro_id, $usuario_id, $fecha_prestamo]);
}

// Función para listar préstamos activos con paginación
function listarPrestamosActivos($pagina, $limite) {
    global $pdo;
    $offset = ($pagina - 1) * $limite;
    $stmt = $pdo->prepare("SELECT * FROM prestamos WHERE fecha_devolucion IS NULL LIMIT ?, ?");
    $stmt->bindValue(1, $offset, PDO::PARAM_INT);
    $stmt->bindValue(2, $limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para registrar devolución de un préstamo
function registrarDevolucion($prestamo_id, $fecha_devolucion) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE prestamos SET fecha_devolucion=? WHERE id=?");
    return $stmt->execute([$fecha_devolucion, $prestamo_id]);
}

// Función para mostrar historial de préstamos por usuario
function mostrarHistorialPrestamos($usuario_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM prestamos WHERE usuario_id=?");
    $stmt->execute([$usuario_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>