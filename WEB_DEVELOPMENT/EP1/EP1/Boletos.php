<?php include 'includes/header.php' ?>
<?php
$desc = $_POST['desc'];
$ticket = $_POST['ticket'];

switch ($desc) {
    case '1': 
        $SubTotal = (775 * 0.15) *$ticket;
        $PrecioXpagar = ((775 * 0.15)) * $ticket;

        
        echo "<h2>COMRPA:$ticket ticket </h2>";

        echo "<h2>TOTAL A PAGAR:  $PrecioXpagar</h2>";

        echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
        break;
    case '2':
        $PrecioXpagar = (775 * 0.82) * $ticket;

        echo "<h2>COMPRA: $ticket ticket </h2>";

        echo "<h2>TOTAL A PAGAR: $PrecioXpagar</h2>";

        echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
        break;
    case '3':
        $PrecioXpagar = (775 * 0.75) * $ticket;

        echo "<h2>COMPRA: $ticket ticket </h2>";

        echo "<h2>TOTAL A PAGAR:  $PrecioXpagar</h2>";

        echo "<h2>¡GRACIAS POR SU COMPRA!</h2>";
        break;
    default:
        echo "NO VALIDO SU SELECCIÓN";
        break;
}
?>

<?php include 'includes/footer.php' ?>