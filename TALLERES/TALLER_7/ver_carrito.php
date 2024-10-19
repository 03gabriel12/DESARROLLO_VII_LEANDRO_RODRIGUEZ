<?php
include 'config_sesion.php';

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "El carrito está vacío.";
} else {
    $total = 0;
    echo "<h2>Carrito de compras</h2>";
    echo "<ul>";
    foreach ($_SESSION['carrito'] as $id => $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;
        echo "<li>" . htmlspecialchars($producto['nombre']) . " - $" . htmlspecialchars($producto['precio']) . " x " . htmlspecialchars($producto['cantidad']) . " = $" . htmlspecialchars($subtotal);
        echo " <a href='eliminar_del_carrito.php?id=$id'>Eliminar</a></li>";
    }
    echo "</ul>";
    echo "<p>Total: $" . htmlspecialchars($total) . "</p>";
    echo "<a href='checkout.php'>Finalizar compra</a>";
}
?>
