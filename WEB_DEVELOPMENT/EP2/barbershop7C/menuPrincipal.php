<?php include 'includes/header.php'; ?>
<H5>Agregar Servicios</H5>
<form method="POST" name="frm1" ID="frm1" action="altaServicios.php">
    <div class="form_container">
        <label for="Nombre" class="formulario_label">
            Nombre del Servicio:</label>
        <input type="text" name="Nombre" ID="Nombre" class="formulario_input">
    </div>
    <div class="form_container">
        <label for="Precio" class="formulario_label">
            Precio del Servicio:</label>
        <input type="text" name="Precio" ID="Precio" class="formulario_input" onkeypress="if((event.keyCode < 48) || (event.keyCode >57)){
         event.returnValue=false;
          } " maxlength="4">
    </div>
    <BR>
    <div class="form_container">
        <input type="button" value="Enviar Datos" class="formulario_btn" onclick="validarDatos()">
        <script src='Static/js/appvlIDacion.js'></script>
</form>
<hr>

<a href="consultaGeneral.php"><img src="./Static/img/query.png"></a>
<a href="consultaUusario.php"><img src="./Static/img/update.png"></a>
<a href="Static/convertirpdf/excel.php"><img src="./Static/img/excelicon.png"></a>
<a href="Static/convertirpdf/reporte.php"><img src="./Static/img/pdficon.png"></a>
<?php include 'includes/footer.php'; ?>