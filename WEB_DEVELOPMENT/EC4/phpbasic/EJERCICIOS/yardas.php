<?php include 'includes/header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion de Yardas a Metros</title>
</head>
<body>
    <?php 
        $yardas = $_POST['yardas'];
        $metros = $yardas/1.09361;
    ?>
    <form method='post' action='yardas.php'>
        Yardas <input type="text" name="yardas" value="<?php echo $yardas; ?>" disabled>
        <br><br>
        Resultado: <input type="text" value="<?php echo $metros; ?>" disabled>
        <br><br>
        <a href="interfaz3.php">Pulsa Aqui para volver a calcular</a>
    </form>
</body>
</html>
