<?php include('template/header.php');
// La sentencia include() incluye y evalúa el archivo especificado.
?>
<?php

include_once('model/conexion.php');
$sentencia = $bd->query('select * from chofer');
$choferes = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($choferes);

/*
include_once()
La sentencia include_once() incluye y evalúa el fichero especificado durante la ejecución
 del script. Es un comportamiento similar al de la sentencia include(), siendo la única 
 diferencia que si el código del fichero ya ha sido incluido, no se volverá a incluir. 
 Como su nombre lo indica, será incluido sólo una vez. include_once() puede ser usado en casos 
 donde el mismo fichero podría ser incluido y evaluado más de una vez durante una ejecución 
 particular de un script, así que en este caso, puede ayudar a evitar problemas como la redefinición 
 de funciones, reasignación de valores de variables, etc.
*/
?>

<div class="container mt-4">

    <div class="row">

        <div class="col-md-7">
            <!-- Inicio Alerta Falta campo-->
            <?php
            if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'falta') {


            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Debes llenar todos los campos
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>



            <!-- Fin Alerta -->

            <!-- Inicio Alerta Ingresado-->
            <?php
            if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'registrado') {


            ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Exito!</strong> Chofer Agregado con éxito!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>



            <!-- Fin Alerta Ingresado-->

            <!-- Inicio Alerta Error Ingresado-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   


            <!-- Fin Alerta Error Ingresado-->

              <!-- Inicio Alerta Actualizar -->
              <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editar'){
            ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Éxito</strong> Chofer Actualizado.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   


            <!-- Fin Alerta Error Actualizar -->

                <!-- Inicio Alerta Eliminar -->
                <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Éxito</strong> Chofer Eliminado.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   


            <!-- Fin Alerta Error Eliminar -->
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Lista de Choferes
                </div>
                <div class="p-4">
                    <table class="table aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">R.U.T</th>
                                <th scope="col">E-mail</th>
                                <th class="text-center" scope="col" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($choferes as $chofer) {


                            ?>
                                <tr>
                                    <td scope="row"><?php echo $chofer->id; ?></td>
                                    <td><?php echo $chofer->nombre; ?></td>
                                    <td><?php echo $chofer->apellido; ?></td>
                                    <td><?php echo $chofer->rut; ?></td>
                                    <td><?php echo $chofer->email; ?></td>
                                    <td class="text-center"><a class="text-success" href="editar.php?id=<?php echo $chofer->id; ?>"><i class="bi bi-pencil-square"></a></i></td>
                                    <td class="text-center"><a onclick="return confirm('Estas seguro de eliminar?');"  class="text-danger" href="eliminar.php?id=<?php echo $chofer->id; ?>"><i class="bi bi-trash3-fill"></a></i></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Ingresar Datos
                </div>

                <form action="registrar.php" class="p-4" method="post">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="Nombre" class="form-label">R.U.T:</label>
                        <input type="text" id="rut" name="rut" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="Nombre" class="form-label">E-mail:</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="d-grid">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<?php include('template/footer.php'); ?>