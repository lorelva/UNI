<?php include " Static/connect/db2.php";?>
<?php include 'includes/header.php';?>

<?php 
      $nombre= $_POST['nombre'];
      $precio= $_POST['precio'];
      $sql ="INSERT INTO servicios (nombre, precio) VALUES ('$nombre´, $precio);";
      $execute = mysqli_query(%sql);
      echo"<h1>DATOS INSERTADOS CON EXITO!</h1>";
?>  

<?php  include 'includes/footer.php';?>