<?php
require_once "config_mysqli.php";

// Función para mostrar el resumen de categorías
function mostrarResumenCategorias($conn) {
    $sql = "SELECT * FROM vista_resumen_categorias";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Resumen por Categorías:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Categoría</th>
            <th>Total Productos</th>
            <th>Stock Total</th>
            <th>Precio Promedio</th>
            <th>Precio Mínimo</th>
            <th>Precio Máximo</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['categoria']}</td>";
        echo "<td>{$row['total_productos']}</td>";
        echo "<td>{$row['total_stock']}</td>";
        echo "<td>${$row['precio_promedio']}</td>";
        echo "<td>${$row['precio_minimo']}</td>";
        echo "<td>${$row['precio_maximo']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Función para mostrar productos populares
function mostrarProductosPopulares($conn) {
    $sql = "SELECT * FROM vista_productos_populares LIMIT 5";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Top 5 Productos Más Vendidos:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Producto</th>
            <th>Categoría</th>
            <th>Total Vendido</th>
            <th>Ingresos Totales</th>
            <th>Compradores Únicos</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['producto']}</td>";
        echo "<td>{$row['categoria']}</td>";
        echo "<td>{$row['total_vendido']}</td>";
        echo "<td>${$row['ingresos_totales']}</td>";
        echo "<td>{$row['compradores_unicos']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Función para mostrar productos con bajo stock
function mostrarProductosBajoStock($conn) {
    $sql = "SELECT p.id_producto, p.nombre, p.stock, v.total_vendido, v.ingresos_totales 
            FROM productos p
            LEFT JOIN ventas v ON p.id_producto = v.id_producto
            WHERE p.stock < 5";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Productos con Bajo Stock (menos de 5 unidades):</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Producto</th>
            <th>Stock</th>
            <th>Total Vendido</th>
            <th>Ingresos Totales</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['stock']}</td>";
        echo "<td>{$row['total_vendido']}</td>";
        echo "<td>${$row['ingresos_totales']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Función para mostrar historial de clientes
function mostrarHistorialClientes($conn) {
    $sql = "SELECT c.id_cliente, c.nombre, p.nombre AS producto, v.monto_total
            FROM clientes c
            JOIN ventas v ON c.id_cliente = v.id_cliente
            JOIN productos p ON v.id_producto = p.id_producto
            ORDER BY c.id_cliente";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Historial Completo de Clientes:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Monto Total</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['producto']}</td>";
        echo "<td>${$row['monto_total']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Función para mostrar métricas por categoría
function mostrarMetricasPorCategoria($conn) {
    $sql = "SELECT cat.nombre AS categoria, 
                   COUNT(p.id_producto) AS cantidad_productos, 
                   SUM(v.total_vendido) AS ventas_totales, 
                   MAX(v.total_vendido) AS producto_mas_vendido
            FROM categorias cat
            LEFT JOIN productos p ON cat.id_categoria = p.id_categoria
            LEFT JOIN ventas v ON p.id_producto = v.id_producto
            GROUP BY cat.id_categoria";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Métricas de Rendimiento por Categoría:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Categoría</th>
            <th>Cantidad de Productos</th>
            <th>Ventas Totales</th>
            <th>Producto Más Vendido</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['categoria']}</td>";
        echo "<td>{$row['cantidad_productos']}</td>";
        echo "<td>${$row['ventas_totales']}</td>";
        echo "<td>{$row['producto_mas_vendido']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Función para mostrar tendencias de ventas
function mostrarTendenciasVentas($conn) {
    $sql = "SELECT MONTH(v.fecha) AS mes, 
                   YEAR(v.fecha) AS anio, 
                   SUM(v.monto_total) AS ingresos_totales
            FROM ventas v
            GROUP BY anio, mes
            ORDER BY anio, mes";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Tendencias de Ventas por Mes:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Año</th>
            <th>Mes</th>
            <th>Ingresos Totales</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['anio']}</td>";
        echo "<td>{$row['mes']}</td>";
        echo "<td>${$row['ingresos_totales']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Mostrar los resultados
mostrarResumenCategorias($conn);
mostrarProductosPopulares($conn);
mostrarProductosBajoStock($conn);
mostrarHistorialClientes($conn);
mostrarMetricasPorCategoria($conn);
mostrarTendenciasVentas($conn);

mysqli_close($conn);
?>
