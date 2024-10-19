<?php
include 'config_sesion.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Agregar validación para evitar datos maliciosos
    if (!is_int($id)) {
        die('ID inválido.');
    }

    // Ejemplo de productos
    $productos = [
        1 => ['nombre' => 'Producto A', 'precio' => 10.0],
        2 => ['nombre' => 'Producto B', 'precio' => 15.0],
        3 => ['nombre' => 'Producto C', 'precio' => 20.0],
        4 => ['nombre' => 'Producto D', 'precio' => 25.0],
        5 => ['nombre' => 'Producto E', 'precio' => 30.0],
    ];

    if (isset($productos[$id])) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Si el producto ya está en el carrito, aumentar la cantidad
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad']++;
        } else {
            // Añadir el producto al carrito
            $_SESSION['carrito'][$id] = ['nombre' => $productos[$id]['nombre'], 'precio' => $productos[$id]['precio'], 'cantidad' => 1];
        }
    }
    header("Location: ver_carrito.php");
    exit();
}
?>
