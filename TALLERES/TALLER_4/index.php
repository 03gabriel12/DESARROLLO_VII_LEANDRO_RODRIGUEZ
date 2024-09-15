<?php

// Incluir los archivos necesarios
include_once "Empleado.php";
include_once "Gerente.php";
include_once "Desarrollador.php";
include_once "Empresa.php";

// Crear una instancia de Empresa
$empresa = new Empresa();

// Crear un empleado base
$empleado = new Empleado();
$empleado->setNombre("Gabriel J Rodríguez");
$empleado->setIdEmpleado(3458536335);
$empleado->setSalarioBase(850.00);

// Mostrar datos del empleado
echo "Nombre: " . $empleado->getNombre() . "<br>";
echo "ID: " . $empleado->getIdEmpleado() . "<br>";
echo "Salario Base: $" . $empleado->getSalarioBase() . "<br>";

// Agregar empleado a la empresa
$empresa->agregarEmpleados($empleado);

// Crear un Gerente
$gerente = new Gerente();
$gerente->setNombre("Carlos Gerente");
$gerente->setIdEmpleado(12345);
$gerente->setSalarioBase(3000);
$gerente->asignarBonos(3000, 200);

// Evaluar desempeño del gerente
echo "<h3>Evaluación de Desempeño del Gerente</h3>";
$gerente->evaluarDesempenio(12);
$gerente->aumentoSalario(12, $gerente->getSalarioBase());

// Agregar gerente a la empresa
$empresa->agregarEmpleados($gerente);

// Crear un Desarrollador
$desarrollador = new Desarrollador();
$desarrollador->setNombre("Ana Desarrolladora");
$desarrollador->setIdEmpleado(67890);
$desarrollador->setSalarioBase(2000);
$desarrollador->setLenguajeProgramacion("PHP");
$desarrollador->setNivelExperencia(6);

// Evaluar desempeño del desarrollador
echo "<h3>Evaluación de Desempeño del Desarrollador</h3>";
$desarrollador->evaluarDesempenio(8);

// Agregar desarrollador a la empresa
$empresa->agregarEmpleados($desarrollador);

// Listar empleados de la empresa
echo "<h3>Lista de empleados en la empresa:</h3>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Nombre</th><th>ID</th><th>Salario</th></tr>";

foreach ($empresa->listarEmpleados() as $empleado) {
    echo "<tr>";
    echo "<td>" . $empleado->getNombre() . "</td>";
    echo "<td>" . $empleado->getIdEmpleado() . "</td>";
    echo "<td>$" . number_format($empleado->getSalarioBase(), 2) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Calcular la nómina total
echo "<h3>Nómina total de la empresa:</h3>";
$nominaTotal = 0;
foreach ($empresa->listarEmpleados() as $empleado) {
    $nominaTotal += $empleado->getSalarioBase();
}
echo "La nómina total es: $" . $nominaTotal . "<br>";
