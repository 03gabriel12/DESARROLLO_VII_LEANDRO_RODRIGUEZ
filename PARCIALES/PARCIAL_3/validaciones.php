<?php
function validarNombre($nombre)
{
    return !empty($nombre) && strlen($nombre) <= 50;
}

function validarPassword($pass)
{
    !empty($pass) && strlen($pass) >= 5;
}

function validarRol($rol)
{
    $rolsValidos = ['profesor', 'estudiantes'];
    return in_array($rol, $rolsValidos);
}
