<?php include 'Static/connect/baseDatos.php';?>
<?php include 'includes/header.php';?>
<?php

iniciarSesion();

$user= $_POST['usuario'];

$password= $_POST['contrasena'];

$sql = "SELECT *FROM USUARIOS WHERE usuario = '$user' and contrasena='$password';";

$exec=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($exec);

if(($row['usuario']==$user) && ($row['contrasena']==$password))
{
    $_SESSION['usuario']=$user;
    header("Location: index.php");
}else
{
    header("Location: login.php");
}
?>