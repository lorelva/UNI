<?php include "Static/connect/db.php";?>
<?php
    if(isset($_GET['id'])){
        $ID = $_GET['id'];
        $query = "SELECT *FROM servicios WHERE id = $ID;";
        $result_services = mysqli_query($conexion,$query);
     
        if (mysqli_num_rows($resl_services)==1) {
           $row = mysqli_fectch_array($resul_services);
           $nombre = $row['nombre'];
           $precio = $row['precio'];
           //echo $nombre . "|" . $precio;
        }
    }

    if (isset($_POST['update'])) {
        $ID = $GET['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];

        $query = "UPDATE servicios SET nombre='$nombre', precio= $precio where id=$ID;";
        mysqli_query($conexion, $query1);
        header("Location: internal");
    }
?>

<?php include 'inlcudes/header.php'?>
<form action="actualizar.php?id=<?php echo $_GET['id'] ?>" method="POST">
    <div class="form_container">
     <label for="nombre" class="formulario_label">
     Nombre del servicio:</label>
     <input type="text" name="nombre" id="nombre" class="formulario_input">
     value="<?php echo $nombre;?>">
    </div> 

    <div class="form_container">
     <label for="precio" class="formulario_label">
      Precio del servicio:</label>
     <input type="text" name="precio" id="precio" class="formulario_input" maxlength="4">
    </div>   

    <HR>
    <BUTTON name="update" class="">


</form>