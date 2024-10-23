<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro Avanzado</title>
</head>

<body>
    <h2>Formulario de Registro Avanzado</h2>
    <form action="procesar.php" method="POST" enctype="multipart/form-data">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="rol">Rol</label>
        <select id="rol" name="rol">
            <option value="profesor">Profesor</option>
            <option value="estudiante">Estudiante</option>
        </select><br><br>
        <input type="submit" value="Enviar">

    </form>
</body>

</html>