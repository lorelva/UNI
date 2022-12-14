<?php include 'includes/header.php'; ?>
<?php
    session_start();
    $user = $_SESSION['usuario'];

    if (isset($_SESSION['usuario'])) 
    {
        echo "INICIO DE SESIÓN";
        echo "BIENVENIDO(A): $user";
    ?>
    <p>OPCIONES A REALIZAR COMO INICIO DE SESIÓN</p>
    <a href="logout.php">CERRAR</a>
    <?php
    } else 
    {
        header("Location: login.php");
    }
?>