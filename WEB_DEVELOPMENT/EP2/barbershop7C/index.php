<?php include 'includes/header.php';?>
<h5>AGREGAR SERVICIOS</h5>

<form method="POST" name="frm1" id="frm1" action="altaservicios.php">
    <div class="form_container">
        <label for="nombre" class="formulario_label">NOMBRE DEL SERVICIO:</label>
        <input type="text" name="nombre" id="nombre" class="formulario_input">
    </div> 
    <div class="form_container">
        <label for="precio" class="formulario_label">PRECIO DEL SERVICIO:</label>
        <input type="text" name="precio" id="precio" class="formulario_input"        
            onkeypress="if((event.keyCode < 48) || (event.keyCode >57))
            {
            event.returnValue=false;
            } "  maxlength="4">
    </div>                  
<br>
    <div class="form_container">                    
    <input type="button" value="Enviar Datos"  class="formulario_btn" onclick="validar()">                    
    <script src='Static/js/validacion.js'></script>         
</form>  

<br>
<br>
<br>
    <a href="consultageneral.php"><img src="./Static/img/question.png" width="20" height="20"></a> 
    <a href="consultadeu.php"><img src="./Static/img/actualizar.png" width="20" height="20"></a>          
    <a href="Static/convertirpdf/excel.php"><img src="./Static/img/excel.png" width="20" height="20"></a> 
    <a href="Static/convertirpdf/reporte.php"><img src="./Static/img/pdficono.png" width="20" height="20"></a> 

<?php include 'includes/footer.php';?>