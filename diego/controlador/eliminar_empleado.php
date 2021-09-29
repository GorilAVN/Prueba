<?php
include '../modelo/Empleado.php';

$objE = new Empleado();

if(!empty($_POST['empleado_id'])){
    $empleado_id = $_POST['empleado_id'];
}

if(!empty($empleado_id)){
    $objE->eliminar_empleado($empleado_id);
}