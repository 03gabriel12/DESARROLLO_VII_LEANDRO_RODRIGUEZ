<?php 

class Estudiante {
    private $id;
    private $nombre;
    private $edad;
    private $carrera;
    private $materias = [];

    public function __construct(int $id, string $nombre, int $edad, string $carrera) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carrera = $carrera;
    }

    public function agregarMateria(string $materia, float $calificacion) {
        $this->materias[$materia] = $calificacion;
    }

    public function obtenerPromedio(): float {
        if (empty($this->materias)) return 0;
        return array_sum($this->materias) / count($this->materias);
    }

    public function obtenerDetalles(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'carrera' => $this->carrera,
            'materias' => $this->materias,
            'promedio' => $this->obtenerPromedio()
        ];
    }

    public function __toString() {
        return "Estudiante {$this->nombre} (ID: {$this->id}), Carrera: {$this->carrera}, Promedio: {$this->obtenerPromedio()}";
    }
}

class SistemaGestionEstudiantes {
    private $estudiantes = [];
    private $graduados = [];

    public function agregarEstudiante(Estudiante $estudiante) {
        $this->estudiantes[$estudiante->obtenerDetalles()['id']] = $estudiante;
    }

    public function obtenerEstudiante(int $id): ?Estudiante {
        return $this->estudiantes[$id] ?? null;
    }

    public function listarEstudiantes(): array {
        return $this->estudiantes;
    }

    public function calcularPromedioGeneral(): float {
        $total = array_reduce($this->estudiantes, function($carry, $estudiante) {
            return $carry + $estudiante->obtenerPromedio();
        }, 0);
        return $total / count($this->estudiantes);
    }

    public function obtenerEstudiantesPorCarrera(string $carrera): array {
        return array_filter($this->estudiantes, function($estudiante) use ($carrera) {
            return $estudiante->obtenerDetalles()['carrera'] === $carrera;
        });
    }

    public function obtenerMejorEstudiante(): ?Estudiante {
        return array_reduce($this->estudiantes, function($mejor, $estudiante) {
            return ($mejor === null || $estudiante->obtenerPromedio() > $mejor->obtenerPromedio()) ? $estudiante : $mejor;
        });
    }

    public function graduarEstudiante(int $id): bool {
        if (isset($this->estudiantes[$id])) {
            $this->graduados[] = $this->estudiantes[$id];
            unset($this->estudiantes[$id]);
            return true;
        }
        return false;
    }

    public function generarRanking(): array {
        uasort($this->estudiantes, function($a, $b) {
            return $b->obtenerPromedio() <=> $a->obtenerPromedio();
        });
        return $this->estudiantes;
    }
    
    public function generarReporteRendimiento(): array {
        $materiaStats = [];
        foreach ($this->estudiantes as $estudiante) {
            foreach ($estudiante->obtenerDetalles()['materias'] as $materia => $calificacion) {
                if (!isset($materiaStats[$materia])) {
                    $materiaStats[$materia] = ['total' => 0, 'max' => 0, 'min' => 100, 'count' => 0];
                }
                $materiaStats[$materia]['total'] += $calificacion;
                $materiaStats[$materia]['count']++;
                $materiaStats[$materia]['max'] = max($materiaStats[$materia]['max'], $calificacion);
                $materiaStats[$materia]['min'] = min($materiaStats[$materia]['min'], $calificacion);
            }
        }
        // Calcular promedios
        foreach ($materiaStats as &$stats) {
            $stats['promedio'] = $stats['total'] / $stats['count'];
        }
        return $materiaStats;
    }
}
$sistema = new SistemaGestionEstudiantes();

$est1 = new Estudiante(1, "Juan Pérez", 20, "Ingeniería");
$est1->agregarMateria("Matemáticas", 90);
$est1->agregarMateria("Física", 85);

$est2 = new Estudiante(2, "Ana Gómez", 22, "Medicina");
$est2->agregarMateria("Biología", 95);
$est2->agregarMateria("Química", 80);

$sistema->agregarEstudiante($est1);
$sistema->agregarEstudiante($est2);

// Mostrar el promedio general del sistema
echo "Promedio general del sistema: " . $sistema->calcularPromedioGeneral() . "\n";

// Listar estudiantes
echo "Estudiantes:\n";
print_r($sistema->listarEstudiantes());

// Generar reporte de rendimiento
echo "Reporte de rendimiento:\n";
print_r($sistema->generarReporteRendimiento());

?>