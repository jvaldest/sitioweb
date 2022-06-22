<?php include('template/header.php'); ?>

<?php

if(!isset($_GET['id'])){
    header('Location: index.php?mensaje=error');
    exit();
}

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("select * from  chofer where id = ?;");
    $sentencia->execute([$id]);
    $chofer = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<div class="container mt-4">

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    Editar Datos
                </div>

                <form action="editarProceso.php" class="p-4" method="post">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required 
                        value="<?php echo $chofer->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Apellido" class="form-label">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" required 
                        value="<?php echo $chofer->apellido; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="R.U.T" class="form-label">R.U.T:</label>
                        <input type="text" id="rut" name="rut" class="form-control" required 
                        value="<?php echo $chofer->rut; ?>">
                    </div>


                    <div class="mb-3">
                        <label for="e-mail" class="form-label">E-mail:</label>
                        <input type="email" id="email" name="email" class="form-control" required 
                        value="<?php echo $chofer->email; ?>">
                    </div>

                    <div class="d-grid">
                    <input type="hidden" name="id" value="<?php echo $chofer->id; ?>">

                        <input type="submit" value="Actualizar" class="btn btn-primary">
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<?php include('template/footer.php'); ?>