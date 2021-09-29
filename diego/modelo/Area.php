<?php
include_once '../modelo/Conexion.php';

class Area extends Conexion
{

    public function listar_areas(){
        $dml = "SELECT id, nombre FROM areas";
        $lista = parent::consultarDML($dml);
        return $lista;
    }
}
