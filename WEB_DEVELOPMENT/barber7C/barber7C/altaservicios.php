<?php include "Static/connect/db.php";?>
<?php include 'includes/header.php';?>
<?php
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$sql = "INSERT INTO servicios (nombre, precio) VALUES ('$nombre', $precio);";
$execute = mysqli_query($conexion,$sql);
echo"<h1>Datos insertados con exito!!!</h1>";
sleep(3);
header("Location: index.php");
?>

<?php include 'includes/footer.php';?>