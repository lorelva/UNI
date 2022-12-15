<?php

include 'Static/connect/db.php';
include 'includes/header.php';
 
    session_start();

    $user= $_POST['usuario'];

    $password= $_POST['contrasena'];

    $sql = "SELECT *FROM USUARIOS WHERE usuario = '$user' AND contrasena='$password';";

    $exec=mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($exec);

    if(($row['usuario']==$user) && ($row['contrasena']==$password))
    {
        $_SESSION['usuario']=$user;
        header("Location: indexPrincipal.php");
    }else
    {
        header("Location: login.php");
    }
?>