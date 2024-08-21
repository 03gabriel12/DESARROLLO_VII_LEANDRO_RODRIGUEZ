<?php
$nombre_completo = "Leandro Rodríguez ";
$edad = 21;
$correo = "leandro.rodriguez @utp.ac.pa";
$telefono = 66645295;

define("OCUPACION", "Desarrollador de software");


$mensaje = OCUPACION . " " . $nombre_completo;

printf("En resumen: %s, %d años, %s, %s<br>", $nombre_completo, $edad, $correo, $telefono);

echo "<br>Información de debugging:<br>";
var_dump("Nombre Completo : " . $nombre_completo);
echo "<br>";
var_dump("edad: " . $edad . " años");
echo "<br>";
var_dump("numero de telefono :  " . $telefono);
echo "<br>";
var_dump("contante");

var_dump(OCUPACION);

echo "<br>";
