     <?php include '../connect/db.php';?>   
     
     <?php
           header('Content-Type:application/xls');
           header('Content-Disposition: attachment;filename=test.xls');
    ?>
         <h1>CONSULTAR ServicioS Y PrecioS</h1>
     <DIV>
      <TABLE>
       <THEAD>
           <TR>
             <TH>ID</TH>
             <TH>ServicioS</TH>
             <TH>PrecioS</TH>
           </TR>
       </THEAD> 
        <?php 
             $query="SELECT *FROM Servicios;";
             $resul_services=mysqli_query($conexion,$query);
               while($row=mysqli_fetch_array($resul_services))
                { ?>
                    <tr>
                       <TD> <?php echo $row['ID']; ?> </TD>
                       <TD> <?php echo $row['Nombre']; ?></TD>
                       <TD><?php echo $row['Precio']; ?></TD>
                    </tr>
            <?php  }   ?>
       </TABLE>        
   </DIV>
