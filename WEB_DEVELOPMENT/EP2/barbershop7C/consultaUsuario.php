<?php include 'Static/connect/baseDatos.php'; ?>
<?php include 'includes/header.php';?>
<table class="table table-dark">
<thead>        
        <tr>
            <td>No.</td>  <td>Servicio</td>  <td>Inversión</td> <td>D U</td>
       </tr>
</thead>
<?php 
         $consulta="SELECT *FROM Servicios;";
         $result=mysqli_query($conexion,$consulta);
        while($row = mysqli_fetch_array($result)){ ?>
          <tr>
            <td> <?php echo $row['ID'];      ?> </td> <td> 
            <?php  echo $row['Nombre'];  ?> </td>
            <td> <?php  echo $row['Precio'];  ?> </td>
            <td> 
            <a href="eliminar.php?ID=<?php echo $row['ID'];?>">
            <img src="./Static/img/d.png">          
           </a>  
            <a href="actualizar.php?ID=<?php echo $row['ID'];?>">
            <img src="./Static/img/EA.png">         
          </a> 
           </td>            
          </tr>
  <?php }  ?>  
</table> 