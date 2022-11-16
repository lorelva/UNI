<?php include "Static/connect/db.php";?>
<?php include 'includes/header.php';?>
<h1>CONSULTA ACTUALIZAR y ELIMINAR</h1>
<table class='table table-dark'>
<thead >
<tr>
<td>ID</td> <td>SERVICIO</td> <td>INVERSIÓN</td>
</tr>
</thead>
<?php
     $consulta = "SELECT *FROM servicios;";
     $resul = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($resul)){ ?>
       <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['nombre'];     ?></td>           
          <td><?php echo $row['precio'];     ?></td>
          <td>
          <A href="eliminar.php?id=<?php echo $row['id'];?>">     
          <img src="./Static/img/delete.png">
        </a>
          <A href="actualizar.php?id=<?php echo $row['id'];?>">
          <img src="./Static/img/actualizar.png">
         </a>
          </td>
       </tr>
<?php } ?>
</table>
