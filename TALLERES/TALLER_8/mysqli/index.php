<?php
include 'libros.php';

// Manejo de la lógica de la aplicación
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10; // Número de registros por página

// Ejemplo: Listar libros
$libros = listarLibros($pagina, $limite);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Biblioteca - MySQLi</title>
</head>
<body>
    <h1>Gestión de Biblioteca</h1>
    <h2>Lista de Libros</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Año de Publicación</th>
            <th>Cantidad</th>
        </tr>
        <?php foreach ($libros as $libro): ?>
        <tr>
            <td><?php echo $libro['id']; ?></td>
            <td><?php echo $libro['titulo']; ?></td>
            <td><?php echo $libro['autor']; ?></td>
            <td><?php echo $libro['isbn']; ?></td>
            <td><?php echo $libro['anio_publicacion']; ?></td>
            <td><?php echo $libro['cantidad']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="?pagina=<?php echo $pagina - 1; ?>">Anterior</a>
    <a href="?pagina=<?php echo $pagina + 1; ?>">Siguiente</a>
</body>
</html>