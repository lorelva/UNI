<?php include 'includes/header.php'?>
Estructuras de control selectivo o bifurcativo
<?php
    
    echo"<hr>";
    $lenguaje = "HTML5";
    switch($lenguaje)
    {
        case 'PHP':
            echo"Se trata de un lenguaje de programacion de Backend";
        break;

        case 'JAVASCRIPT':
            echo"Se trata de un lenguaje de programacion de Frontend y Backend";
        break;

        case 'CSS':
            echo"Se trata de un lenguaje de apariencia para una pagina Web y funciona en Frontend";
        break;
            
        case 'HTML':
            echo "Se trata de un lenguaje de etiquetado.Se encarga de estructura y contenido en Frontend";
        break;

        default;
            echo"¡Opcion incorrecta. Intente de nuevo!";
        break;
    }

?>
