<?php
include_once "Evaluable.php";
class Desarrollador extends Empleado implements Evaluable
{
    private $lenguaje_programacion, $nivel_experiencia;
    function setLenguajeProgramacion($lenguaje_programacion)
    {
        $this->lenguaje_programacion = $lenguaje_programacion;
    }
    function setNivelExperencia($nivel_experiencia)
    {
        $this->nivel_experiencia = $nivel_experiencia;
    }
    function getLenguajeProgramacion()
    {
        $this->lenguaje_programacion;
    }
    function getNivelExperencia()
    {
        $this->nivel_experiencia;
    }
    function evaluarDesempenio($rango_desempeño) {}
}
