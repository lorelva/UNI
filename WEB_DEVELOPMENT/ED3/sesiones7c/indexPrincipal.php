<?php include 'includes/header.php'; ?>
<?php
    session_start();
    $user = $_SESSION['usuario'];

    if (isset($_SESSION['usuario'])) 
    {
        echo "<h1>MENU PRINICIPAL</h1> <br> BIENVENIDO(A): $user";
        
?>
    <h2>OPCIONES A REALIZAR ......</h2>
    <br>
    <a href="logout.php">CERRAR SESIÓN</a>

<?php
    } else 
    {
        header("Location: login.php");
    }
?>