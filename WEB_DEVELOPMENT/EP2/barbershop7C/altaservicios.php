<?php include 'Static/connect/baseDatos.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
    $Servicio = $_POST['Nombre'];
    $Precio = $_POST['Precio'];
    $sql = "INSERT INTO Servicios(Nombre, Precio)values('$Servicio',$Precio);";
    $query = mysqli_query($conexion, $sql);
    sleep(2);
    header("Location: menuPrincipal.php");
?>