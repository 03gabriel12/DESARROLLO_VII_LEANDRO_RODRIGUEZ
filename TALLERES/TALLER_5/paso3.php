<?php
// 1. Crear un arreglo de estudiantes con sus calificaciones
$estudiantes = [
    ["nombre" => "Ana", "calificaciones" => [85, 92, 78, 96, 88]],
    ["nombre" => "Juan", "calificaciones" => [75, 84, 91, 79, 86]],
    ["nombre" => "María", "calificaciones" => [92, 95, 89, 97, 93]],
    ["nombre" => "Pedro", "calificaciones" => [70, 72, 78, 75, 77]],
    ["nombre" => "Laura", "calificaciones" => [88, 86, 90, 85, 89]]
];

// 2. Función para calcular el promedio de calificaciones
function calcularPromedio($calificaciones)
{
    return array_sum($calificaciones) / count($calificaciones);
}

// 3. Función para asignar una letra de calificación basada en el promedio
function asignarLetraCalificacion($promedio)
{
    if ($promedio >= 90) return 'A';
    if ($promedio >= 80) return 'B';
    if ($promedio >= 70) return 'C';
    if ($promedio >= 60) return 'D';
    return 'F';
}

$array_listo_estudiantes_de_honor = array();
// 4. Procesar y mostrar información de estudiantes
echo "<br>Información de estudiantes:\n";
foreach ($estudiantes as &$estudiante) {
    $promedio = calcularPromedio($estudiante["calificaciones"]);
    $estudiante["promedio"] = $promedio;
    $estudiante["letra_calificacion"] = asignarLetraCalificacion($promedio);

    echo "<br><br>{$estudiante['nombre']}:\n";
    echo " <br> Calificaciones: " . implode(", ", $estudiante["calificaciones"]) . "\n";
    $promedio = number_format($promedio, 2);
    echo " <br> Promedio: $promedio\n";
    $tutoria = listado_tutoria_estudiantes($promedio);
    echo "<br> $tutoria";
    echo " <br> Calificación: {$estudiante['letra_calificacion']}\n\n";
    //ingresando los estudiantes de honor al arreglo 
    array_push($array_listo_estudiantes_de_honor, listado_honor_estudiantes($promedio, $estudiante['nombre']));
}

// 5. Encontrar al estudiante con el promedio más alto
$mejorEstudiante = array_reduce($estudiantes, function ($mejor, $actual) {
    return (!$mejor || $actual["promedio"] > $mejor["promedio"]) ? $actual : $mejor;
});

echo "<br><br>Estudiante con el promedio más alto: {$mejorEstudiante['nombre']} ({$mejorEstudiante['promedio']})\n";

// 6. Calcular y mostrar el promedio general de la clase
$promedioGeneral = array_sum(array_column($estudiantes, "promedio")) / count($estudiantes);
echo "<br>Promedio general de la clase: " . number_format($promedioGeneral, 2) . "\n";

// 7. Contar estudiantes por letra de calificación
$conteoCalificaciones = array_count_values(array_column($estudiantes, "letra_calificacion"));
echo "<br>Distribución de calificaciones:\n";
foreach ($conteoCalificaciones as $letra => $cantidad) {
    echo "$letra: $cantidad estudiante(s)\n";
}

// TAREA: Implementa una función que identifique a los estudiantes que necesitan tutoría
// (aquellos con un promedio menor a 75) y otra que liste a los estudiantes de honor
// (aquellos con un promedio de 90 o más).
// Tu código aquí

echo "<br><br> Tarea <br>";
echo "Listado de los estudianes de honor con promedio de 90 en adelante ";
//var_dump($array_listo_estudiantes_de_honor);
foreach ($array_listo_estudiantes_de_honor as $info) {
    if ($info != false) {
        echo "<br> $info";
    }
}
function listado_honor_estudiantes($promedio, $estudiante)
{
    return  $promedio > 90 ? false : $estudiante;
}
function listado_tutoria_estudiantes($promedio)
{
    return  $promedio > 75 ? "El Estudiante no requiere tutoria " : "Estudiante requiere tutoria ";
}
