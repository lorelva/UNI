<?php include 'Static/connect/baseDatos.php'; ?>
<?php
        if(isset($_GET['ID']))
        {
            $ID = $_GET['ID'];
            $query ="SELECT *FROM Servicios where ID ='$ID';";
            $resul_serv = mysqli_query($conexion,$query);
            if(mysqli_num_rows($resul_serv)==1){
                 $row = mysqli_fetch_array($resul_serv);
                 $Nombre = $row['Nombre'];
                 $Precio = $row['Precio'];
            
            }
        }

        if(isset($_POST['update']))
        {
          $ID=$_GET['ID'];
          $Nombre=$_POST['Nombre'];
          $Precio=$_POST['Precio'];
          $query="UPDATE Servicios SET Nombre = '$Nombre', Precio='$Precio' where  ID=$ID;";
          mysqli_query($conexion,$query);
          header("Location: consultadeu.php");
        }
?>  



<?php include 'includes/header.php';?>
<form action="actualizar.php?ID=<?php echo $_GET['ID']; ?>" method="POST">

<div class="form_container">
     <label for="Nombre" class="formulario_label">
     Nombre del Servicio:</label>
     <input type="text" name="Nombre" ID="Nombre" class="formulario_input"
      value ="<?php  echo $Nombre  ?>" >
</div> 

<div class="form_container">
     <label for="Precio" class="formulario_label">
      Precio del Servicio:</label>
     <input type="text" name="Precio" ID="Precio" class="formulario_input"
     value ="<?php  echo $Precio; ?>" >
</div>  
<br>  <br>  <br>  
<BUTTON name="update"  class="formulario_btn">   
       ACTUALIZAR  
</BUTTON>   
</form>