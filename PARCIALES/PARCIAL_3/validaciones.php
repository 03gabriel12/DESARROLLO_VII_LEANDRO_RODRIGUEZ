<?php
function validarNombre($nombre)
{
    return !empty($nombre) && strlen($nombre) <= 50;
}

function validarPassword($pass)
{
return true;
}

function validarRol($rol)
{
    $rolsValidos = ['profesor', 'estudiantes'];
    return in_array($rol, $rolsValidos);
}
