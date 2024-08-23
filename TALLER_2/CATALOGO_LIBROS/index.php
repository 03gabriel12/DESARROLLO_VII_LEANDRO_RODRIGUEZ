<?php
require_once 'includes/funciones.php';
include 'includes/header.php';

$libros = obtenerLibros();

?>

<h3> Listado de los detalles de los Libros</h3>
<table class="styled-table">
    <thead>
        <tr>
            <th>Titulo </th>
            <th>Autor</th>
            <th>Año de publicación</th>
            <th>Género </th>
            <th>Descripcion </th>
        </tr>
    </thead>
    <tbody>
        <?php echo mostrarDetallesLibro($libros); ?>
    </tbody>
</table>

<?php
include 'includes/footer.php';
?>