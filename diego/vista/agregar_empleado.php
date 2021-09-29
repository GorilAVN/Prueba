<?php
include '../modelo/Area.php';
include '../modelo/Roles.php';

$objA = new Area();

$lista_areas = $objA->listar_areas();

$objA = new Roles();

$lista_roles = $objA->listar_roles();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Prueba</title>
    <title>Agregar Empleado</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col_12">
                    <h1>Crear Empleado</h1>
                    <div class="p-2"></div>
                    <div class="alert alert-primary" role="alert">
                        Los campos con asterisco (*) son obligatorios
                    </div>
                    <form action="../controlador/agregar_empleado.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre Completo*</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico*</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <label>Sexo*</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M" required>
                                <label class="form-check-label" for="sexoM">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F" required>
                                <label class="form-check-label" for="sexoF">
                                    Femenino
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="area_id">Areas*</label>
                            <select class="form-control" id="area_id" name="area_id" required>
                                <option>--Seleccione--</option>
                                <?php
                                foreach ($lista_areas as $area) {
                                ?>
                                    <option value="<?= $area['id'] ?>"><?= $area['nombre'] ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="desc" rows="3" required></textarea>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="boletin" name="boletin" value="Si">
                            <label class="form-check-label" for="boletin">Deseo recibir boletín informativo</label>
                        </div>
                        
                        <div class="form-group form-check">
                            <label>Area*</label><br>
                            <?php
                            $i=1;
                            foreach ($lista_roles as $rol) {
                            ?>
                            <input type="checkbox" class="form-check-input" id="roles_<?=$i?>" name="roles[]" value="<?=$rol['id']?>">
                            <label class="form-check-label" for="roles_<?=$i?>"><?=$rol['nombre']?></label><br>
                            <?php
                            $i++;
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>