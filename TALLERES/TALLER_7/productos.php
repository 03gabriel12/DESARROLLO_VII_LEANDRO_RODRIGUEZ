<?php
include 'config_sesion.php';

$productos = [
    ['id' => 1, 'nombre' => 'Producto A', 'precio' => 10.0],
    ['id' => 2, 'nombre' => 'Producto B', 'precio' => 15.0],
    ['id' => 3, 'nombre' => 'Producto C', 'precio' => 20.0],
    ['id' => 4, 'nombre' => 'Producto D', 'precio' => 25.0],
    ['id' => 5, 'nombre' => 'Producto E', 'precio' => 30.0],
];
?>

<h2>Productos</h2>
<ul>
    <?php foreach ($productos as $producto): ?>
        <li>
            <?php echo htmlspecialchars($producto['nombre']) . " - $" . htmlspecialchars($producto['precio']); ?>
            <a href="agregar_al_carrito.php?id=<?php echo $producto['id']; ?>">Añadir al carrito</a>
        </li>
    <?php endforeach; ?>
</ul>
