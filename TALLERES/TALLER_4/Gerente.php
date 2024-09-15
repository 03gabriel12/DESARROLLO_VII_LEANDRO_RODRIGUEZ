<?php
include_once "Evaluable.php";
class Gerente  extends Empleado implements Evaluable
{
    function evaluarDesempenio($rango_desempeño)
    {
        /* rango de desempeño 
        1-6 :  malo
        5-10 : Bueno
        11-15 : Excelente
        */
        if ($rango_desempeño >= 1 and $rango_desempeño <= 5) {
            echo "El desempeño del empleado es malo";
        } else if ($rango_desempeño >= 6 and $rango_desempeño <= 10) {
            echo "El desempeño del empleado es Bueno";
        } else if ($rango_desempeño >= 11 and $rango_desempeño <= 15) {
            echo "El desempeño del empleado es Excelente";
        }
    }
    function asignarBonos($salario_base, $dias_laborados)
    {
        // salario base mensual, multiplicado por los días laborados, dividido entre 365
        return ($salario_base * $dias_laborados) / 365;
    }
    function aumentoSalario($desenpeño_empleado, $salario_empleado)
    {
        if ($desenpeño_empleado >= 8 and $desenpeño_empleado <= 15) {
            $salario_base = $salario_empleado;
            $aumento = $salario_empleado * 0.05;
            $salario_empleado += $aumento;
            echo "Se aumenta el salario del empleado un 5%
            <br>
            Salario base $salario_base  
            <br>
            Aumento $aumento
            <br> 
            Salario Actual $salario_empleado
            ";
        } else {
            echo "el desenpeño del empleado no se puede aumentar el salario";
        }
    }
}
