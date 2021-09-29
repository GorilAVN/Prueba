<?php
include_once '../modelo/Conexion.php';

class Empleado extends Conexion
{
    public function agregar_empleado($nombre, $email, $sexo, $area_id, $boletin, $desc, $roles)
    {
        if(empty($boletin)){
            $boletin = 0;
        }
        if(!empty($nombre) && !empty($email) && !empty($sexo) && !empty($area_id) && !empty($desc)){
            $dml = "INSERT INTO empleado (nombre,email,sexo,area_id,boletin,descripcion) VALUES ('$nombre','$email','$sexo','$area_id',$boletin,'$desc')";
            parent::ejecutarDML($dml);
        }
        $dml = "SELECT id as id_empleado FROM empleado ORDER BY id DESC";
        $id_empl = Conexion::consultarDML($dml);
        $empleado_id = $id_empl[0]['id_empleado'];
        if(count($roles) > 0){
            foreach ($roles as $rol_id){
                $dml = "INSERT INTO empleado_rol (empleado_id,rol_id) VALUES ($empleado_id,$rol_id)";
                parent::ejecutarDML($dml);
            }
        }
    }

    public function modificar_empleado($nombre, $email, $sexo, $area_id, $boletin, $desc, $roles, $id)
    {
        if(empty($boletin)){
            $boletin = 0;
        }
        if(!empty($id) && !empty($nombre) && !empty($email) && !empty($sexo) && !empty($area_id) && !empty($desc)){
            $dml = "UPDATE empleado SET nombre = '$nombre',email='$email',sexo='$sexo',area_id='$area_id',boletin=$boletin,descripcion='$desc' WHERE id = $id";
            parent::ejecutarDML($dml);
        }
        $id_empl = parent::consultarDML($dml);
        $empleado_id = $id;
        $dml = "DELETE FROM empleado_rol WHERE empleado_id = $id";
        parent::ejecutarDML($dml);
        if(count($roles) > 0){
            foreach ($roles as $rol_id){
                $dml = "INSERT INTO empleado_rol (empleado_id,rol_id) VALUES ($empleado_id,$rol_id)";
                parent::ejecutarDML($dml);
            }
        }
    }

    public function eliminar_empleado($id){
        if(!empty($id)){
            $dml = "DELETE FROM empleado_rol WHERE empleado_id = $id";
            parent::ejecutarDML($dml);
            $dml = "DELETE FROM empleado WHERE id = $id";
            parent::ejecutarDML($dml);
        }
    }

    public function listar_empleados(){
        $dml = "SELECT e.nombre as nombre, e.email as email, e.sexo as sexo, a.nombre as area, e.boletin FROM empleado as e INNER JOIN areas as a ON a.id = e.area_id";
        $lista_empleado = parent::consultarDML($dml);
        return $lista_empleado;
    }

    public function consultar_empleado($id){
        $dml = "SELECT * FROM empleado WHERE id=$id";
        $lista_empleado = parent::consultarDML($dml);
        $empleado = $lista_empleado[0];
        return $empleado;
    }
}
