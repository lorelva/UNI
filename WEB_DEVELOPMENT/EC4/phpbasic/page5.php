<?php include 'includes/header.php'?>
OPERACIONES ARITMETICAS CON PHP

<?php
    echo"<hr>";
    echo"10+20:".(10+20);
?>
<?php
    $num1 = 10;
    $num2 = 20;
    $num3 = 30;
    $num4 = 40;
    //operaciones aritmeticas: suma,resta, multiplicacion, division.
    echo $num1 + $num2;
    echo"<hr>";

    echo $num4 - $num3;
    echo"<hr>";
 
    echo $num1 * $num2;
    echo"<hr>";

    echo $num4 / $num1;
    echo"<hr>";

    echo ($num1 + $num2) * ($num1 * .16);
    echo"<hr>";
    //incrementar y decrementar
    echo"<hr>";
    $num1++;
    echo$num1;

    echo"<hr>";
    $num1--;
    echo$num1;

    //residuo
    echo"<hr>";
    echo 20%3;
?>
