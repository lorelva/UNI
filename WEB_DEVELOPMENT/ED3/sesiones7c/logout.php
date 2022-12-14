<?php include 'includes/header.php';?>
<?php
    iniciarSesion();
    salirSesion();
    header("Location: login.php");   
?>