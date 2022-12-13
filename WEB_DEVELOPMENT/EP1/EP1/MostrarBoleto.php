<?php include 'includes/header.php' ?>

    <?php
    $desc = $_POST['desc'];
    $numTickets = $_POST['numTickets'];

    switch ($desc) {
        case '1':
            $SubTotal = 775 * $numTickets;
            $ConDescuento = $SubTotal * 0.15;
            $PrecioXpagar =  $SubTotal - $ConDescuento;

            echo "<h2>COMRPA:$numTickets numTickets </h2>";

            echo "<h2>TOTAL A PAGAR:  $PrecioXpagar</h2>";

            echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
            break;

        case '2':
            $SubTotal = 775 * $numTickets;
            $ConDescuento = $SubTotal * 0.18;
            $PrecioTotal =  $SubTotal - $ConDescuento;

            echo "<h2>COMPRA: $numTickets numTickets </h2>";

            echo "<h2>TOTAL A PAGAR: $PrecioTotal</h2>";

            echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
            break;

        case '3':
            $SubTotal = 775 * $numTickets;
            $ConDescuento = $SubTotal * 0.25;
            $PrecioTotal =  $SubTotal - $ConDescuento;

            echo "<h2>COMPRA: $numTickets numTickets </h2>";

            echo "<h2>TOTAL A PAGAR:  $PrecioTotal</h2>";

            echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
            break;

        default:
            echo " SU SELECCIÓN NO ES VALIDA";
            break;
    }
    ?>
