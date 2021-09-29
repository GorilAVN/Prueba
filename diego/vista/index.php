<?php
include '../modelo/Empleado.php';

$objE = new Empleado();

$lista_empleado = $objE->listar_empleados();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Prueba</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col_12">
                    <h1>Lista Empleado</h1>
                    <div class="text-right"><a class="btn-info p-2"  href="agregar_empleado.php">Crear</a></div>
                    <div class="p-2"></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Area</th>
                                <th scope="col">Boletin</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($lista_empleado as $empleado){
                                $boletin = 'No';
                                if($empleado['boletin'] == 1){
                                    $boletin = 'Si';
                                }
                            ?>
                            <tr>
                                <td><?=$empleado['nombre']?></td>
                                <td><?=$empleado['email']?></td>
                                <td><?=$empleado['sexo']?></td>
                                <td><?=$empleado['area']?></td>
                                <td><?=$boletin?></td>
                                <td>M</td>
                                <td>E</td>
                            </tr>
                            <?php   
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>