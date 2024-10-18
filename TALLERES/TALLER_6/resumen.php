<?php
$archivo_registros = 'registros.json';

// Verificar si el archivo existe y tiene contenido
if (file_exists($archivo_registros) && filesize($archivo_registros) > 0) {
    $registros = json_decode(file_get_contents($archivo_registros), true);
    
    echo "<h2>Resumen de Registros:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Edad</th><th>Foto de Perfil</th><th>Intereses</th></tr>";
    
    foreach ($registros as $registro) {
        echo "<tr>";
        echo "<td>" . $registro['nombre'] . "</td>";
        echo "<td>" . $registro['edad'] . "</td>";
        echo "<td><img src='" . $registro['foto_perfil'] . "' width='100'></td>";
        echo "<td>" . implode(", ", $registro['intereses']) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<h2>No hay registros almacenados.</h2>";
}
?>
