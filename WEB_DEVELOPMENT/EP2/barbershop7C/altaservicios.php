<?php 
include 'Static/connect/db.php'; 

include 'includes/header.php';
 
    $servicio=$_POST['nombre'];
    $precio=$_POST['precio'];
    $sql ="INSERT INTO servicios(nombre, precio)values('$servicio',$precio);";
        $query = mysqli_query($conexion,$sql);
        sleep(2);
        header("Location: index.php");
?>