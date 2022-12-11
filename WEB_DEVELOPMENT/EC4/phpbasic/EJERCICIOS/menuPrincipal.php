<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <title>MENÚ DE CONVERSIONES</title>
</head>

<body>
    <section class="questions container">
        <h2 class="subtitle">ELIGE LA OPCIÓN A CALCULAR:</h2>

        <section class="questions__container">
            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">DOLARES A PESOS
                    </h3>
                    <form method='post' action='dolares.php'>
                        DOLARES: <input type="text" name="txtdolares">
                        <br><br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">PESOS A DOLAR</h3>
                    <form method='post' action='peso.php'>
                        PESOS: <input type="text" name="txtpesos">
                        <br>
                        <br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">METROS A CENTIMETROS</h3>
                    <form method='post' action='metros.php'>
                        METROS: <input type="text" name="txtmetros">
                        <br>
                        <br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">CENTIMETROS A PULGADAS</h3>
                    <form method='post' action='centimetros.php'>
                        CENTIMETROS <input type="text" name="txtcentimetros">
                        <br>
                        <br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">METROS A YARDAS</h3>
                    <form method='post' action='metrosyar.php'>
                        METROS: <input type="text" name="txtmetros">
                        <br><br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">YARDAS A METROS</h3>
                    <form method='post' action='yardas.php'>
                        YARDAS: <input type="text" name="txtyardas">
                        <br>
                        <br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>
            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">LITROS A GALON</h3>
                    <form method='post' action='litros.php'>
                        LITROS <input type="text" name="txtlitros">
                        <br>
                        <br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">KILOMETROS A PIES, MILLAS, METROS, CENTIMETROS</h3>
                    <form method='post' action='kilometros.php'>
                        KILOMETROS <input type="text" name="txtkilometros">
                        <br>
                        <br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">año de nacimiento a edad</h3>
                    <form method='post' action='anio.php'>
                        Año de nacimiento: <input type="text" name="txtaño">
                        <br>
                        <br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>

            <article class="questions__padding">
                <div class="questions__answer">
                    <h3 class="questions__title">edad a año de nacimiento
                    </h3>
                    <form method='post' action='edad.php'>
                        edad: <input type="text" name="txtedad">
                        <br><br>
                        <input type="submit" value="Calcular">
                    </form>
                    <br>
                </div>
            </article>
        </section>
        <script src="./js/questions.js"></script>
</body>

</html>