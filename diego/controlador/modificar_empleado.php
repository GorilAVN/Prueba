<?php
include '../modelo/Empleado.php';

$objE = new Empleado;

if(!empty($_POST['empleado_id'])){
    $empleado_id = $_POST['empleado_id'];
}
if(!empty($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}
if(!empty($_POST['email'])){
    $email = $_POST['email'];
}
if(!empty($_POST['sexo'])){
    $nombre = $_POST['sexo'];
}
if(!empty($_POST['area_id'])){
    $area_id = $_POST['area_id'];
}
if(!empty($_POST['boletin'])){
    $boletin = $_POST['boletin'];
}
if(!empty($_POST['desc'])){
    $desc = $_POST['desc'];
}
if(!empty($_POST['roles'])){
    $roles = $_POST['roles'];
}

if(!empty($empleado_id) && !empty($nombre) && !empty($email) && !empty($sexo) && !empty($area_id) && !empty($desc)){
    $objE->modificar_empleado($nombre,$email,$sexo,$area_id,$boletin,$desc,$roles,$empleado_id);
}