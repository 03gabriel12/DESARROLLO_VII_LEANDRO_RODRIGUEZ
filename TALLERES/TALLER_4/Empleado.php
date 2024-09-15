<?php
class Empleado
{
    private $nombre, $id_empleado, $salario_base;
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setIdEmpleado($id_empleado)
    {
        $this->id_empleado = $id_empleado;
    }
    public function setSalarioBase($salario_base)
    {
        $this->salario_base = $salario_base;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getIdEmpleado()
    {
        return $this->id_empleado;
    }
    public function getSalarioBase()
    {
        return $this->salario_base;
    }
}
