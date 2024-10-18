<?php
require_once 'validaciones.php';
require_once 'sanitizacion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errores = [];
    $datos = [];

    // Lista de campos que se esperan en el formulario
    $campos = ['nombre', 'email', 'edad', 'sitio_web', 'genero', 'intereses', 'comentarios'];

    // Procesar y validar cada campo
    foreach ($campos as $campo) {
        if (isset($_POST[$campo])) {
            // Sanitizar el valor
            $valor = $_POST[$campo];
            $funcion_sanitizar = "sanitizar" . ucfirst($campo);
            if (function_exists($funcion_sanitizar)) {
                $valorSanitizado = call_user_func($funcion_sanitizar, $valor);
                $datos[$campo] = $valorSanitizado;
            } else {
                $datos[$campo] = $valor; // Si no hay función de sanitización, usar el valor original
            }

            // Validar el valor
            $funcion_validar = "validar" . ucfirst($campo);
            if (function_exists($funcion_validar) && !call_user_func($funcion_validar, $valorSanitizado)) {
                $errores[] = "El campo $campo no es válido.";
            }
        } else {
            $errores[] = "El campo $campo es obligatorio.";
        }
    }

    // Procesar la foto de perfil
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] !== UPLOAD_ERR_NO_FILE) {
        if (!validarFotoPerfil($_FILES['foto_perfil'])) {
            $errores[] = "La foto de perfil no es válida.";
        } else {
            // Asegurar nombre único para la foto de perfil
            $nombre_unico = uniqid('perfil_', true) . '.' . pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION);
            $rutaDestino = 'uploads/' . $nombre_unico;
            
            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $rutaDestino)) {
                $datos['foto_perfil'] = $rutaDestino;
            } else {
                $errores[] = "Hubo un error al subir la foto de perfil.";
            }
        }
    }

    // Mostrar resultados si no hay errores
    if (empty($errores)) {
        echo "<h2>Datos Recibidos:</h2>";
        echo "<table border='1'>";
        foreach ($datos as $campo => $valor) {
            echo "<tr>";
            echo "<th>" . ucfirst($campo) . "</th>";
            if ($campo === 'intereses') {
                echo "<td>" . implode(", ", $valor) . "</td>";
            } elseif ($campo === 'foto_perfil') {
                echo "<td><img src='$valor' width='100'></td>";
            } else {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Mostrar los errores encontrados
        echo "<h2>Errores:</h2>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }

    // Enlace para regresar al formulario
    echo "<br><a href='formulario.html'>Volver al formulario</a>";
} else {
    // Manejar acceso directo al archivo
    echo "Acceso no permitido.";
}
?>
