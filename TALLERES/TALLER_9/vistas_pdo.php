<?php
require_once "config_pdo.php";

function mostrarResumenCategorias($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_resumen_categorias");

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

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarProductosPopulares($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_productos_populares LIMIT 5");

        echo "<h3>Top 5 Productos Más Vendidos:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Total Vendido</th>
                <th>Ingresos Totales</th>
                <th>Compradores Únicos</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['producto']}</td>";
            echo "<td>{$row['categoria']}</td>";
            echo "<td>{$row['total_vendido']}</td>";
            echo "<td>${$row['ingresos_totales']}</td>";
            echo "<td>{$row['compradores_unicos']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Mostrar los resultados
mostrarResumenCategorias($pdo);
mostrarProductosPopulares($pdo);



// Crear las vistas en la base de datos
function crearVistas($pdo) {
    try {
        // Vista de Productos con Bajo Stock
        $pdo->exec("CREATE OR REPLACE VIEW vista_productos_bajo_stock AS
            SELECT p.nombre AS producto, c.nombre AS categoria, p.stock, p.precio, 
                   SUM(v.cantidad) AS total_vendido, SUM(v.cantidad * p.precio) AS ingresos_totales
            FROM productos p
            JOIN categorias c ON p.categoria_id = c.id
            LEFT JOIN ventas v ON p.id = v.producto_id
            WHERE p.stock < 5
            GROUP BY p.id;");

        // Vista del Historial Completo de Cada Cliente
        $pdo->exec("CREATE OR REPLACE VIEW vista_historial_clientes AS
            SELECT c.nombre AS cliente, p.nombre AS producto, v.fecha, v.cantidad, (v.cantidad * p.precio) AS total
            FROM clientes c
            JOIN ventas v ON c.id = v.cliente_id
            JOIN productos p ON v.producto_id = p.id
            ORDER BY c.nombre, v.fecha;");

        // Vista de Métricas de Rendimiento por Categoría
        $pdo->exec("CREATE OR REPLACE VIEW vista_metricas_categoria AS
            SELECT c.nombre AS categoria, 
                   COUNT(p.id) AS cantidad_productos, 
                   SUM(v.cantidad) AS total_vendido, 
                   SUM(v.cantidad * p.precio) AS ingresos_totales
            FROM categorias c
            LEFT JOIN productos p ON c.id = p.categoria_id
            LEFT JOIN ventas v ON p.id = v.producto_id
            GROUP BY c.id;");

        // Vista de Tendencias de Ventas por Mes
        $pdo->exec("CREATE OR REPLACE VIEW vista_tendencias_ventas AS
            SELECT DATE_FORMAT(v.fecha, '%Y-%m') AS mes, 
                   SUM(v.cantidad) AS total_vendido, 
                   SUM(v.cantidad * p.precio) AS ingresos_totales
            FROM ventas v
            JOIN productos p ON v.producto_id = p.id
            GROUP BY mes
            ORDER BY mes;");
        
        echo "Vistas creadas correctamente.<br>";
    } catch (PDOException $e) {
        echo "Error al crear vistas: " . $e->getMessage() . "<br>";
    }
}

// Funciones para mostrar resultados

function mostrarResumenCategorias($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_resumen_categorias");

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

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarProductosBajoStock($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_productos_bajo_stock");

        echo "<h3>Productos con Bajo Stock (menos de 5 unidades):</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Total Vendido</th>
                <th>Ingresos Totales</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['producto']}</td>";
            echo "<td>{$row['categoria']}</td>";
            echo "<td>{$row['stock']}</td>";
            echo "<td>${$row['precio']}</td>";
            echo "<td>{$row['total_vendido']}</td>";
            echo "<td>${$row['ingresos_totales']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarHistorialClientes($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_historial_clientes");

        echo "<h3>Historial Completo de Clientes:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Total</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['cliente']}</td>";
            echo "<td>{$row['producto']}</td>";
            echo "<td>{$row['fecha']}</td>";
            echo "<td>{$row['cantidad']}</td>";
            echo "<td>${$row['total']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarMetricasCategoria($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_metricas_categoria");

        echo "<h3>Métricas de Rendimiento por Categoría:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Categoría</th>
                <th>Cantidad de Productos</th>
                <th>Total Vendido</th>
                <th>Ingresos Totales</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['categoria']}</td>";
            echo "<td>{$row['cantidad_productos']}</td>";
            echo "<td>{$row['total_vendido']}</td>";
            echo "<td>${$row['ingresos_totales']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarTendenciasVentas($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_tendencias_ventas");

        echo "<h3>Tendencias de Ventas por Mes:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Mes</th>
                <th>Total Vendido</th>
                <th>Ingresos Totales</th>
              </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['mes']}</td>";
            echo "<td>{$row['total_vendido']}</td>";
            echo "<td>${$row['ingresos_totales']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Crear vistas
crearVistas($pdo);

// Mostrar los resultados de las vistas
mostrarResumenCategorias($pdo);
mostrarProductosBajoStock($pdo);
mostrarHistorialClientes($pdo);
mostrarMetricasCategoria($pdo);
mostrarTendenciasVentas($pdo);

$pdo = null;
?>
 