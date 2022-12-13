<?php include 'includes/header.php' ?>

    <?php
    $desc = $_POST['desc'];
    $ticket = $_POST['ticket'];

    switch ($desc) {
        case '1':
            $SubTotal = (775 * $ticket);
            $ConDescuento = ($SubTotal * 0.15);
            $PrecioXpagar =  ($SubTotal - $ConDescuento);

            echo "<h2>COMRPA:$ticket ticket </h2>";

            echo "<h2>TOTAL A PAGAR:  $PrecioXpagar</h2>";

            echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
            break;

        case '2':
            $SubTotal = (775 * $ticket);
            $ConDescuento = ($SubTotal * 0.18);
            $PrecioTotal =  ($SubTotal - $ConDescuento);

            echo "<h2>COMPRA: $ticket ticket </h2>";

            echo "<h2>TOTAL A PAGAR: $PrecioXpagar</h2>";

            echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
            break;

        case '3':
            $SubTotal = (775 * $ticket);
            $ConDescuento = ($SubTotal * 0.25);
            $PrecioTotal =  ($SubTotal - $ConDescuento);

            echo "<h2>COMPRA: $ticket ticket </h2>";

            echo "<h2>TOTAL A PAGAR:  $PrecioXpagar</h2>";

            echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
            break;

        default:
            echo " SU SELECCIÓN NO ES VALIDA";
            break;
    }
    ?>
