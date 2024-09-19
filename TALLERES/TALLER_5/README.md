# Sistema de Gestión de Estudiantes

## Descripción del Proyecto

Este es un proyecto final para gestionar información de estudiantes utilizando programación orientada a objetos en PHP. El sistema permite agregar, buscar, filtrar, y generar reportes sobre estudiantes y sus calificaciones, así como gestionar su graduación.

## Características del Sistema

1. **Clase Estudiante**:
   - **Atributos**: 
     - `id`: Identificador único del estudiante.
     - `nombre`: Nombre completo del estudiante.
     - `edad`: Edad del estudiante.
     - `carrera`: Carrera a la que pertenece el estudiante.
     - `materias`: Arreglo que almacena las materias y sus calificaciones.
   - **Métodos**:
     - `agregarMateria($materia, $calificacion)`: Añade una materia con su respectiva calificación.
     - `obtenerPromedio()`: Calcula y retorna el promedio de calificaciones.
     - `obtenerDetalles()`: Retorna un arreglo asociativo con toda la información del estudiante.
     - `__toString()`: Facilita la impresión de los detalles del estudiante en forma de cadena.

2. **Clase SistemaGestionEstudiantes**:
   - **Atributos**: 
     - Arreglo que almacena todos los objetos `Estudiante`.
   - **Métodos**:
     - `agregarEstudiante($estudiante)`: Añade un nuevo estudiante al sistema.
     - `obtenerEstudiante($id)`: Obtiene los detalles de un estudiante por su ID.
     - `listarEstudiantes()`: Lista todos los estudiantes registrados.
     - `calcularPromedioGeneral()`: Calcula el promedio de todos los estudiantes.
     - `obtenerEstudiantesPorCarrera($carrera)`: Filtra los estudiantes por una carrera específica.
     - `obtenerMejorEstudiante()`: Retorna el estudiante con el promedio más alto.
     - `generarReporteRendimiento()`: Genera un reporte con el promedio, la nota más alta y la más baja por materia.
     - `graduarEstudiante($id)`: Gradúa a un estudiante, eliminándolo del sistema y guardándolo en un nuevo arreglo de graduados.
     - `generarRanking()`: Ordena a los estudiantes por su promedio y retorna el ranking.
     - `buscarEstudiantes($criterio)`: Permite realizar búsquedas por nombre o carrera de forma parcial e insensible a mayúsculas/minúsculas.
     - `generarEstadisticasPorCarrera()`: Genera estadísticas de cada carrera, incluyendo el promedio y el mejor estudiante.

## Requisitos Técnicos

- Uso de arreglos asociativos y multidimensionales.
- Implementación de funciones de orden superior como `array_map`, `array_reduce`, y `array_filter`.
- Manejo de posibles errores como la búsqueda de estudiantes que no existan.
- Type hinting en los métodos para mejorar la robustez del código.
- Persistencia opcional de datos usando JSON (reto adicional).

## Cómo Usar el Sistema

1. **Instalación**:
   - Descarga o clona el proyecto en tu entorno de desarrollo local.
   - Asegúrate de tener PHP instalado en tu sistema.

2. **Ejecución**:
   - Abre una terminal en el directorio del proyecto y ejecuta el archivo `proyecto_final.php` usando el comando:
     ```bash
     php proyecto_final.php
     ```

3. **Pruebas**:
   - El archivo de prueba en `proyecto_final.php` contiene ejemplos de cómo:
     - Añadir estudiantes.
     - Buscar estudiantes por ID.
     - Listar estudiantes.
     - Filtrar estudiantes por carrera.
     - Calcular el promedio general.
     - Generar un ranking.
     - Graduar estudiantes.
     - Generar reportes de rendimiento.
     - Buscar estudiantes por nombre o carrera.

## Funcionalidades Adicionales

- **Persistencia de Datos** (opcional): Se puede habilitar la funcionalidad de guardar y cargar estudiantes desde un archivo JSON para hacer que el sistema sea persistente entre ejecuciones.
- **Interfaz de Línea de Comandos** (opcional): Puede crearse una interfaz simple que permita interactuar con el sistema desde la terminal.
- **Validación de Datos** (opcional): Validación para asegurar que los datos ingresados, como calificaciones y edades, sean correctos.

## Estructura del Proyecto

- `proyecto_final.php`: Archivo principal que contiene la implementación de las clases y la sección de pruebas.
- `README.md`: Este archivo de documentación.

## Contribuciones

Si encuentras algún error o tienes sugerencias de mejora, por favor abre un *issue* o envía un *pull request*.

## Licencia

Este proyecto está bajo la licencia MIT.
