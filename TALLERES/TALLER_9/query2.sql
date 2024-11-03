CREATE VIEW vista_productos_bajo_stock AS
SELECT p.id_producto, p.nombre, p.stock, v.total_vendido, v.ingresos_totales
FROM productos p
LEFT JOIN ventas v ON p.id_producto = v.id_producto
WHERE p.stock < 5;

CREATE VIEW vista_historial_clientes AS
SELECT c.id_cliente, c.nombre, p.nombre AS producto, v.monto_total
FROM clientes c
JOIN ventas v ON c.id_cliente = v.id_cliente
JOIN productos p ON v.id_producto = p.id_producto
ORDER BY c.id_cliente;

CREATE VIEW vista_metricas_por_categoria AS
SELECT cat.nombre AS categoria, 
       COUNT(p.id_producto) AS cantidad_productos, 
       SUM(v.total_vendido) AS ventas_totales, 
       MAX(v.total_vendido) AS producto_mas_vendido
FROM categorias cat
LEFT JOIN productos p ON cat.id_categoria = p.id_categoria
LEFT JOIN ventas v ON p.id_producto = v.id_producto
GROUP BY cat.id_categoria;

CREATE VIEW vista_tendencias_ventas AS
SELECT MONTH(v.fecha) AS mes, 
       YEAR(v.fecha) AS anio, 
       SUM(v.monto_total) AS ingresos_totales
FROM ventas v
GROUP BY anio, mes
ORDER BY anio, mes;
