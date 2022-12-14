<?php include 'includes/header.php' ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="./Static/css/styles.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

<form method="POST" action="MostrarBoleto.php">
    <fieldset class="form-group">
        <div class="form-group">
            <h1> BIENVENIDO(A) </h1>
            <legend class="col-form-label-lg">ENTRADA GENERAL: $775 PESOS</legend>
            <label> FAVOR DE SELECCIONAR LA CANTIDAD DE BOLETOS A COMPRAR</label>
            <input type="number" id="numTickets" name="numTickets" min="0" class="form-control" 
                placeholder="Coloque la cantidad de boletos a comprar">
        </div>
        <br>
        <div class="form-group">
            <h1> DESCUENTO POR MEMBRESÍA </h1>
            <label for="exampleFormControlSelect1">TIPO DE MEMBRESÍA</label>
            <select class="form-control" name="desc" id="desc">
                <option value="1">PLATA</option>
                <option value="2">DORADA</option>
                <option value="3">PLATINO</option>
            </select>

        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" value="Enviar">COMPRAR </button>
        </div>
    </fieldset>
</form>

