<?php include 'includes/header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion de Metros a cm</title>
</head>
<body>
    <?php 
        $metros = $_POST['metros'];
        $cm = $metros*100;
    ?>
    <form method='post' action='metros.php'>
        Metros <input type="text" name="metros" value="<?php echo $metros; ?>" disabled>
        <br><br>
        Resultado: <input type="text" value="<?php echo $cm; ?>" disabled>
        <br><br>
        <a href="interfaz3.php">Pulsa Aqui para volver a calcular</a>
    </form>
</body>
</html>
