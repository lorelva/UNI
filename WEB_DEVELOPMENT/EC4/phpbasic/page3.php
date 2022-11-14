<?php include 'includes/header.php'?>
Concatenación entre cadenas y variables

<?php
    $Nombre = "Lorena";

    $ApePaterno = "Valle";

    $ApelMaterno = "Gonzalez";

    $Edad = 20;

    echo"<hr>";

    echo $Nombre . " " . $ApePaterno . " " . $ApeMaterno;

    echo"<hr>";

    echo "<h2>Mi nombre es: " . $Nombre . " y mi edad Es: " . $Edad."</h2>";

    echo"<hr>";

    echo"<h1>{$Nombre} {$ApePaterno}</h1>";    
?>
<?php include 'includes/footer.php'?>