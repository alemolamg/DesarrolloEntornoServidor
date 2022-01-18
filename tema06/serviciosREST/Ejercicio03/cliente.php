<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 03 Cambio Monedas</title>
    </head>

    <body>
        <div id="principal">
            <h1>Calcula tu Cambio de Divisas</h1>
            <form action="./cliente.php" method="post">
                <label for="cantidad">Moneda Principal: </label>
                <input type="number" name="cantidad" id="cantidad" <?php if (isset($_POST['cantidad'])) echo "value='$_POST[cantidad]'"; ?>>
                <select name="tipoPrincipal" id="tipoPrincipal">
                    <option value="libra">Libras</option>
                    <option value="euro" selected>Euros</option>
                    <option value="dolar">Dolares</option>
                </select>
                <br>
                <label for="nuevaMoneda">Cambiar moneda a:</label>
                <select name="nuevaMoneda" id="nuevaMoneda">
                    <option value="libra">Libras</option>
                    <option value="euro">Euros</option>
                    <option value="dolar" selected>Dolares</option>
                </select>
                <input type="submit" value="Enviar" name="enviar" id="enviar">
            </form>

        </div>
        <br>
        <hr>

        <?php
        if (isset($_POST['enviar'])) {
            //echo $http_response_header;
            echo "<h2>Cálculo del cambio:</h2>";
            $datos = file_get_contents("http://localhost/DesarrolloEntornoServidor/tema06/serviciosREST/Ejercicio03/servicio.php?orig=$_POST[tipoPrincipal]&dest=$_POST[nuevaMoneda]&cant=$_POST[cantidad]");
            //$datos = fopen("https://192.168.0.57/DesarrolloEntornoServidor/tema06/serviciosREST/Ejercicio03/servicio.php?orig=$_POST[tipoPrincipal]&dest=$_POST[nuevaMoneda]&cant=$_POST[cantidad]", false);
            //var_dump($datos);
            //echo "<br>";
            //$datos = explode("=", $datos, PHP_INT_MAX); // Divido el string en dos partes
            //$datos = $datos[1];     // Me quedo con la parte codificada en JSON
            $cambioDatos = json_decode($datos);
            //var_dump($cambioDatos);
            //print_r($cambioDatos);
            echo "<br>";
            echo mostrarCambio2($cambioDatos, $_POST['cantidad']);
        }

        function mostrarCambio($array, $cantIni) {
            //echo $cantIni ." " . $array["orig"]. "son al cambio " . $array["cant"] ." de " . $array["dest"];
            //var_dump($array);
            $texto = $cantIni . " " . $array["orig"] . " son al cambio " ;
            return $texto;
        }

        function mostrarCambio2($array, $cantIni) {
            $orig = 0;
            $dest = 0;
            $newCant = 0;
            foreach ($array as $key => $value) {
                if ($key == "orig") {
                    $orig = $value;
                } elseif ($key == "dest") {
                    $dest = $value;
                } elseif ($key == "cant") {
                    $newCant = $value;
                }
                //echo 'Key = ' . $key . ", valor = " . $value . "<br>";
            }

            //echo $cantIni ." " . $array["orig"]. "son al cambio " . $array["cant"] ." de " . $array["dest"];
            $texto = $cantIni ." " . $orig. "s son al cambio " . $newCant ." de " . $dest ."s <br>";
            return $texto;
        }
        ?>
    </body>

</html>