# Sistema de Gestión de Biblioteca

## Instrucciones de configuración
1. Importar el script SQL en tu base de datos MySQL.
2. Configurar las credenciales en `config.php` de las carpetas `mysqli` y `pdo`.
3. Acceder a `index.php` desde el navegador.

## Estructura del proyecto
- `mysqli`: Versión del sistema utilizando MySQLi.
- `pdo`: Versión del sistema utilizando PDO.
- `README.md`: Archivo de instrucciones y descripción del proyecto.

## Consideraciones especiales
- Asegúrate de que la base de datos esté configurada correctamente.
- Utiliza consultas preparadas para evitar inyecciones SQL.

## Comparación entre MySQLi y PDO
Ambas extensiones ofrecen una forma segura de interactuar con la base de datos, pero PDO es más flexible y fácil de usar. MySQLi es más rápido y ligero, pero puede ser más complicado de utilizar.