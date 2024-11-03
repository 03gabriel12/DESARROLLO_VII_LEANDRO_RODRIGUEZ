<?php
include 'config.php';

// Función para agregar un libro
function agregarLibro($titulo, $autor, $isbn, $anio_publicacion, $cantidad) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO libros (titulo, autor, isbn, anio_publicacion, cantidad) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$titulo, $autor, $isbn, $anio_publicacion, $cantidad]);
}

// Función para listar libros con paginación
function listarLibros($pagina, $limite) {
    global $pdo;
    $offset = ($pagina - 1) * $limite;
    $stmt = $pdo->prepare("SELECT * FROM libros LIMIT ?, ?");
    $stmt->bindValue(1, $offset, PDO::PARAM_INT);
    $stmt->bindValue(2, $limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para buscar libros
function buscarLibros($campo, $valor) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM libros WHERE $campo LIKE ?");
    $stmt->execute(["%$valor%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para actualizar un libro
function actualizarLibro($id, $titulo, $autor, $isbn, $anio_publicacion, $cantidad) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE libros SET titulo=?, autor=?, isbn=?, anio_publicacion=?, cantidad=? WHERE id=?");
    return $stmt->execute([$titulo, $autor, $isbn, $anio_publicacion, $cantidad, $id]);
}

// Función para eliminar un libro
function eliminarLibro($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM libros WHERE id=?");
    return $stmt->execute([$id]);
}
?>