<?php include 'includes/header.php'; ?>
<h2>INICIAR SESIÓN</h2>

<form method="POST" name="formulario" id="formulario" action="validacion.php">

    <div class="form_container">
        <label for="usuario" class="formulario_label">USER:
            <input type="text" name="usuario" id="usuario" class="formulario_input">
        </label>
    </div>

    <div class="form_container">
        <label for="contrasena" class="formulario_label">PASSWORD:
            <input type="password" name="contrasena" id="contrasena" class="formulario_input">
        </label>
    </div>

    <div class="form_container">
        <input type="button" class="formulario_btn" value="Enviar" onclick=validar();>
    </div>
</form>

<script src="Static/js/validar.js"></script> 