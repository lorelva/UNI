<?php include 'Static/connect/baseDatos.php'; ?>
<?php include 'includes/header.php';?>
<?php
        if(isset($_GET['ID'])){
         $ID = $_GET['ID'];
         $delete = "DELETE FROM Servicios where ID = $ID;";
         $exec = mysqli_query($conexion,$delete);
         sleep(2);
         header("Location: consultaUsuario.php");
        }
?>  


























