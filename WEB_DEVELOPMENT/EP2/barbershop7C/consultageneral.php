<?php include 'Static/connect/db.php';?>
<?php include 'includes/header.php';?>
<table class="table table-dark">
  <thead>
          <tr>
              <td>Num.</td> 
              <td>SERVICIO</td> 
              <td>INVERSIÓN</td>
        </tr>
  </thead>
  <?php 
          $consulta="SELECT *FROM servicios;";
          $result=mysqli_query($conexion,$consulta);
          while($row = mysqli_fetch_array($result))
          { ?>
            <tr>
              <td> <?php echo $row['id'];?> </td> 
              <td> <?php  echo $row['nombre'];  ?> </td>
              <td> <?php  echo $row['precio'];  ?> </td>
            </tr>
  <?php }  ?>  
</table> 
