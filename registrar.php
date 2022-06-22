<?php
 if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["rut"]) || empty($_POST["email"])){
    header('Location: index.php?mensaje=falta');
    exit(); //Sale del IF
 }

 include_once('model/conexion.php');
 $nombre = $_POST['nombre'];
 $apellido = $_POST['apellido'];
 $rut = $_POST['rut'];
 $email = $_POST['email'];

 $sentencia = $bd->prepare('INSERT INTO chofer(nombre,apellido,rut,email) values (?,?,?,?)');
 $resultado = $sentencia->execute([$nombre,$apellido,$rut,$email]);

 if($resultado == true){
    header('Location: index.php?mensaje=registrado');
 }else{
    header('Location: index.php?mensaje=error');
    exit(); //Sale del IF 
 }
?>