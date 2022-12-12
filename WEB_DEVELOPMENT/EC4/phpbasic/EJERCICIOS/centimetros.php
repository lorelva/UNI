<?php include 'includes/header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion de cm a Pulgadas</title>
</head>
<body>
    <?php 
        $cm = $_POST['cm'];
        $pulgadas = $cm*0.393701;
    ?>
    <form method='post' action='cm.php'>
        cm <input type="text" name="cm" value="<?php echo $cm; ?>" disabled>
        <br><br>
        Resultado: <input type="text" value="<?php echo $pulgadas; ?>" disabled>
        <br><br>
        <a href="interfaz3.php">Pulsa Aqui para volver a calcular</a>
    </form>
</body>
</html>
