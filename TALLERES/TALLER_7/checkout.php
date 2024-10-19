<?php
include 'config_sesion.php';

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "No hay productos en el carrito para finalizar la compra.";
} else {
    $total = 0;
    echo "<h2>Resumen de compra</h2>";
    foreach ($_SESSION['carrito'] as $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;
        echo "<p>" . htmlspecialchars($producto['nombre']) . " - $" . htmlspecialchars($producto['precio']) . " x " . htmlspecialchars($producto['cantidad']) . " = $" . htmlspecialchars($subtotal) . "</p>";
    }
    echo "<p>Total final: $" . htmlspecialchars($total) . "</p>";

    // Configurar cookie para recordar al usuario
    setcookie('nombre_usuario', 'Cliente', time() + 86400, "/", "", true, true);

    // Vaciar el carrito
    unset($_SESSION['carrito']);
    
    echo "<p>Gracias por su compra.</p>";
}
?>
