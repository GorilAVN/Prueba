<?php
include '../modelo/Empleado.php';

$objE = new Empleado();

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
if(count($_POST['roles']) > 0){
    $roles = $_POST['roles'];
}

if(!empty($nombre) && !empty($email) && !empty($sexo) && !empty($area_id) && !empty($desc)){
    $objE->agregar_empleado($nombre,$email,$sexo,$area_id,$boletin,$desc,$roles);
    echo '<meta http-equiv="refresh" content="0; url=../vista/">';
}
else{
    echo '<meta http-equiv="refresh" content="0; url=../vista/agregar_empleado.php">';
}

