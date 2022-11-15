<?php
    $conexion = mysqli_connect(
        'localhost',
        'root',
        '',
        'BARBER7'
    );
?>

<?php
    if(isset($conexion)){
        echo"ESTOY CONECTADO"
    }
?>