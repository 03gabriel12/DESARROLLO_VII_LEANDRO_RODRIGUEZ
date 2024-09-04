<?php
$nombre_completo = "Leandro Rodríguez ";
$edad = 21;
$correo = "leandro.rodriguez @utp.ac.pa";
$telefono = 66645295;

define("OCUPACION", "Desarrollador de software");


$mensaje = OCUPACION . " " . $nombre_completo;
print ("Hola ");
echo "<br>";
printf("En resumen: %s, %d años, %s, %s<br>", $nombre_completo, $edad, $correo, $telefono);

echo "<br>Información de debugging:<br>";
var_dump("Nombre Completo : " . $nombre_completo . "tengo " . $edad . " años , mi numero de telefono es : " . $telefono . " Mi ocupacion es " . OCUPACION);
echo "<br>";

echo "-----------------------";

echo "<br>";
var_dump("Tipos de las variables");
echo "<br>";
echo " variable nombre completo ";
var_dump($nombre_completo);
echo "<br>";
echo " variable edad ";
var_dump($edad);
echo "<br>";
echo " variable correo ";
var_dump($correo);
echo "<br>";
echo " variable telefono ";
var_dump($telefono);
echo "<br>";
echo " constante ";
var_dump(OCUPACION);
