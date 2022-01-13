<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h2>El tiempo Actual en las ciudades de España</h2>

    <form action="" method="post">
        <label for="ciudad">Nombre Ciudad: </label>
        <input type="text" name="ciudad" id="ciudad" value="<?php if (isset($_POST['ciudad'])) echo $_POST['ciudad']; ?>">
        <input type="submit" value="Buscar">
    </form>


    <?php
    if (isset($_POST['ciudad'])) {
        $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$_POST[ciudad],,es,\Spain&units=metric&appid=60ceb76aa521a61a93e3ade60f14479b");
        //$datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Lucena,,es,\Spain&units=metric&appid=60ceb76aa521a61a93e3ade60f14479b");
        if (http_response_code(404)) {

            //echo "<h3>Datos en bruto (en formato JSON): </h3>$datos<hr>";
            $tiempo = json_decode($datos);
            //echo "<h3>Datos en un objeto: </h3>";
            //print_r($tiempo);
            //print_r($tiempo->weather);
            echo "<hr>";
            echo "<h3>Datos de " . $_POST['ciudad'] . " </h3>";
            echo "Temperatura: " . $tiempo->main->temp . "ºC<br>"; //$tiempo->{"main"}->{"temp"}
            echo "Humedad: " . $tiempo->main->humidity . "%<br>";
            echo "Presión: " . $tiempo->main->pressure . "mb<br>";
            $icono = $tiempo->weather[0]->icon;
            echo "<img src='http://openweathermap.org/img/wn/$icono@2x.png' alt='alt'/>";
        } else {
            echo "<h2>ERROR, ciudad es incorrecta </h2>";
            unset($_POST['ciudad']);
        }
    }
    ?>
</body>

</html>