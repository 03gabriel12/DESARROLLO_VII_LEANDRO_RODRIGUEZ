<?php
function contar_palabras($texto)
{
    return count(explode(" ", $texto));
}

function contar_vocales($texto)
{
    return preg_match_all('/[aeiou]/', $texto);
}
function invertir_palabras($texto)
{
    return implode(' ', array_reverse(explode(' ', $texto)));
}
