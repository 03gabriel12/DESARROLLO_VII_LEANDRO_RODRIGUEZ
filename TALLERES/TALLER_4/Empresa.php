<?php

class Empresa
{
    /*ejemplo del arreglo 
    array=[
        [
            id_empleado:44343435,
            info_empleado:[
                nombre:alex Navega,
                salario:1000.00,
                desempeño:,
                bono:,
                
            ],
        ],    
    ];

    */
    private $empleados = [];
    public function agregarEmpleados($add_empleados)
    {
        array_push($this->empleados, $add_empleados);
    }
    public function listarEmpleados()
    {
        return $this->empleados;
    }
    public function nominaEmpleado($id_empleado, $sueldo_empleado)
    {
        //se calcula la nomina dividiendo el sueldo mensual entre 30
        $nomina_empelado = $sueldo_empleado / 30;
        return $nomina_empelado;
    }
}
