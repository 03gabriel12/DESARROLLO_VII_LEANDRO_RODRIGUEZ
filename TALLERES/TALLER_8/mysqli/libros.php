<?php
include 'config.php';

// Función para agregar un libro
function agregarLibro($titulo, $autor, $isbn, $anio_publicacion, $cantidad) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO libros (titulo, autor, isbn, anio_publicacion, cantidad) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $titulo, $autor, $isbn, $anio_publicacion, $cantidad);
    return $stmt->execute();
}

// Función para listar libros con paginación
function listarLibros($pagina, $limite) {
    global $mysqli;
    $offset = ($pagina - 1) * $limite;
    $stmt = $mysqli->prepare("SELECT * FROM libros LIMIT ?, ?");
    $stmt->bind_param("ii", $offset, $limite);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Función para buscar libros
function buscarLibros($campo, $valor) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM libros WHERE $campo LIKE ?");
    $valor = "%$valor%";
    $stmt->bind_param("s", $valor);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Función para actualizar un libro
function actualizarLibro($id, $titulo, $autor, $isbn, $anio_publicacion, $cantidad) {
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE libros SET titulo=?, autor=?, isbn=?, anio_publicacion=?, cantidad=? WHERE id=?");
    $stmt->bind_param("ssssii", $titulo, $autor, $isbn, $anio_publicacion, $cantidad, $id);
    return $stmt->execute();
}

// Función para eliminar un libro
function eliminarLibro($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM libros WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>