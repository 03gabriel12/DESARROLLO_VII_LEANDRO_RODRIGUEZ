<?php
require_once 'validaciones.php';
require_once 'sanitizacion.php';

session_start(); // Iniciar la sesión


$listaProfesores = [
    [
        'usuario' => 'profesor',
        'password' => 'profesor12',
        'rol' => 'profesor',
    ]
];



$listaEstudiantes = [
    [
        'usuario' => 'leandro',
        'password' => 'leandro12',
        'nota' => ['mate B', 'Des C', 'español A'],
        'rol' => 'estudiante'
    ],
    [
        'usuario' => 'gabriel',
        'password' => 'gabriel12',
        'nota' => ['mate B', 'Des C', 'español A'],
        'rol' => 'estudiante'
    ],
    [
        'usuario' => 'kirito',
        'password' => 'kirito12',
        'nota' => ['mate B', 'Des C', 'español A'],
        'rol' => 'estudiante'
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errores = [];
    $datos = [];

    // Procesar y validar cada campo
    $campos = ['usuario', 'password'];
    foreach ($campos as $campo) {
        if (isset($_POST[$campo])) {
            $valor = $_POST[$campo];
            $datos[$campo] = $valor;

            if ($campo == 'usuario') {
                if (!validarNombre($valor)) {
                    $errores[] = "El campo $campo no es válido.";
                }
            }
            if ($campo == 'password') {
                if (!validarPassword($valor)) {
                    $errores[] = "El campo $campo no es válido.";
                }
            }
        }
    }

    // Si no hay errores, verificar credenciales
    if (empty($errores)) {
        $usuarioValido = false;

        foreach ($listaEstudiantes as $estudiante) {
            if ($estudiante['usuario'] === $datos['usuario'] && $estudiante['password'] === $datos['password']) {
                // Guardar datos en la sesión
                $_SESSION['usuario'] = $estudiante['usuario'];
                $_SESSION['rol'] = $estudiante['rol'];
                $usuarioValido = true;
                break;
            }
        }

        if ($usuarioValido) {
            echo "<h2>Bienvenido, " . htmlspecialchars($_SESSION['usuario']) . "</h2>";

            // Mostrar información dependiendo del rol
            if ($_SESSION['rol'] == 'profesor') {

                echo "<h3>Lista de estudiantes:</h3>";
                foreach ($listaEstudiantes as $data) {
                    foreach ($data as $key => $valor) {
                        if ($key != 'password') {
                            if ($key == 'nota') {
                                echo "$key: ";
                                print_r($valor);
                                echo "<br>";
                            } else {
                                echo "$key: $valor<br>";
                            }
                        }
                    }
                    echo "<br>";
                }
            } elseif ($_SESSION['rol'] == 'estudiante') {
                echo "<h3>Notas del estudiante:</h3>";
                foreach ($listaEstudiantes as $estudiante) {
                    if ($estudiante['usuario'] === $_SESSION['usuario']) {
                        foreach ($estudiante['nota'] as $nota) {
                            echo "Nota: $nota<br>";
                        }
                        break;
                    }
                }
            }
        } else {
            echo "<h2>Usuario o contraseña incorrectos.</h2>";
        }
    } else {
        // Mostrar errores de validación
        echo "<h2>Errores:</h2>";
        foreach ($errores as $error) {
            echo "$error<br>";
        }
    }
} else {
    echo "Acceso no permitido.";

    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Destruir la sesión
    session_destroy();
}
