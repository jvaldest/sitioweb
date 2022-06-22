<?php


if(!isset($_POST['id'])){
    header('Location: index.php?mensaje=error');
}


include_once('model/conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$rut = $_POST['rut'];
$email = $_POST['email'];

$sentencia = $bd->prepare('UPDATE chofer SET nombre = ?, apellido = ?,rut= ?,email=? where id = ?;"');
$resultado = $sentencia->execute([$nombre,$apellido,$rut,$email,$id]);

if($resultado == true){
   header('Location: index.php?mensaje=editar');
}else{
   header('Location: index.php?mensaje=error');
   exit(); //Sale del IF 
}
?>