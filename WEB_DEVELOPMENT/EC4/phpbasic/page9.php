<?php include 'includes/header.php'?>

Funciones para probar  Arreglos
<?php
    echo"<hr>";
    $tecnologias = ['HTML', 'CSS', 'JAVASCRIPT', 'PHP', 'MYSQL'];
?>

<PRE>
    <?php
        print_r($tecnologias);
    ?>
</PRE>
    <?php
    $ide = array('VISUAL CODE', 'ATOM', 'SUBLIME', 'NOTEPAD++', 'BRACKETS');
    ?>
<PRE>
    <?php
        var_dump($ide);
    ?>
</PRE>
