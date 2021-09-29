<?php
include_once '../modelo/Conexion.php';

class Roles extends Conexion
{

    public function listar_roles(){
        $dml = "SELECT id, nombre FROM roles";
        $lista = parent::consultarDML($dml);
        return $lista;
    }
}
