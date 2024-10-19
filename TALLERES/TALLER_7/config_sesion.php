<?php
// Configurar opciones de sesión antes de iniciar la sesión
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);

// Configuración de seguridad para sesiones
session_start([
    'cookie_lifetime' => 86400, // 24 horas
    'cookie_secure' => true,    // Solo enviar cookies a través de HTTPS
    'cookie_httponly' => true,  // Evitar acceso a la cookie desde JavaScript
    'use_strict_mode' => true,  // Evitar ataques de fijación de sesión
    'use_only_cookies' => true, // Deshabilitar uso de ID de sesión en la URL
]);


// Regenerar el ID de sesión periódicamente
if (!isset($_SESSION['ultima_actividad']) || (time() - $_SESSION['ultima_actividad'] > 300)) {
    session_regenerate_id(true);
    $_SESSION['ultima_actividad'] = time();
}




?>