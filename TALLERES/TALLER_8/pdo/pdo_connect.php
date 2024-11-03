// pdo_connect.php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=biblioteca", "usuario", "contraseña");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
