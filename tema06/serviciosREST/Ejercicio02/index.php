<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Lotería de navidad, Lotería del Niño</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="m-4">
        <h1>Búsqueda de Lotería</h1>
        <p>Escribe el número de tu sorteo y te diremos si es ganador.</p>
        <form action="" method="post" class="form-control">
            <label for="numero">Número: </label>
            <input type="number" name="numero" id="numero" placeholder="Ej: 20418">
            <input type="submit" value="Buscar">
        </form>
        <?php
        function calcularDecimo($numUsu, $datosJSON)
        {
            $miDecimo =  json_decode($datosJSON);
            echo ('<br>');

            if ($miDecimo->error == 0) {
                //echo "no hay errores";
                $premio = "No Premiado";
                if ($miDecimo->premio != 0) {
                    $premio = $miDecimo->premio;
                    echo "Su décimo $numUsu tiene un prémio de $premio €.";
                } else {
                    print_r("Su décimo $numUsu no es premiado.");
                }
            } else {
                echo "<h3 style='color: red'> ERROR EN EL NÚMERO</h3>";
            }
        }


        if (isset($_POST['numero'])) {
        ?>
            <hr>
            <h2>Lotería de Navidad:</h2>
            <?php

            $datos = file_get_contents("https://api.elpais.com/ws/LoteriaNavidadPremiados?n=$_POST[numero]");
            $datos = explode("=", $datos, PHP_INT_MAX); // Divido el string en dos partes
            $datos = $datos[1];     // Me quedo con la parte codificada en JSON
            calcularDecimo($_POST['numero'], $datos);

            ?>
            <hr>
            <h2>Lotería del Niño:</h2>
        <?php
            $datos = file_get_contents("http://api.elpais.com/ws/LoteriaNinoPremiados?n=$_POST[numero]");
            $datos = explode("=", $datos, PHP_INT_MAX); // Divido el string en dos partes
            $datos = $datos[1];     // Me quedo con la parte codificada en JSON
            //echo "<h3>Datos en bruto (en formato JSON): </h3>$datos<hr>";

            calcularDecimo($_POST['numero'], $datos);
        }
        ?>


    </div>
</body>

</html>