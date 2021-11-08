<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores: Búsqueda</title>
</head>

<body>
    <h2>Buscar Jugadores</h2>
    <!-- no tocar estos -->
    <input type="button" value="Volver" onclick="location.href='./index.php'">
    <input type="button" value="Búsqueda Avanzada" onclick="location.href='./buscarAdvJug.php'"><br>
    <?php
    //Comienzo haciendo la conexión
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
    if ($dwes->connect_errno) {     //Entra si hay hay errores
        //$mensaje = $dwes->connect_errno."-".$dwes->connect_error;
        $error = $dwes->connect_errno;
        die("ERROR AL CONECTAR CON EL SERVIDOR DE BD");
    }
    $error = $dwes->connect_errno;
    $mensaje = "No hay errores";

    // Sustituye las funciones en este fichero por un fichero global de funciones.
    include('funcionesBusq.php');

    /*
        function calcEquipos($conx)    {
            $sql = "SELECT `equipo` FROM `jugadores` GROUP BY `equipo` ORDER BY `equipo`;";
            $result = $conx->query($sql);
            if ($conx->errno)
                die($conx->error);
            while ($a = $result->fetch_object()) {
                if ($_POST['equipo'] == $a->equipo) $coinc =  'selected';
                else $coinc = "";
                echo "<option value='$a->equipo' $coinc >$a->equipo</option><br>";
            }
        }

        function prepVacio($valor)
        {
            if ($valor != '' || $valor != '%') {
                return $valor;
            } else return '%';
        }

        function buscarJug($dwes)
        {
            if (isset($_POST['dni'])) {
                $dni = $_POST['dni'];
            } else {
                $dni = "";
            }

            if (isset($_POST['equipo'])) {
                $equipo = $_POST['equipo'];
            } else {
                $equipo = "";
            }

            if (isset($_POST['posicion'])) {
                $posicion = $_POST['posicion'];
            } else {
                $posicion = "";
            }

            $sql = "SELECT * FROM `jugadores` WHERE `dni` LIKE '%$dni%' AND `posicion` LIKE '%$posicion%' AND `equipo` LIKE '%$equipo%'";
            $result = $dwes->query($sql);
            if ($dwes->errno)
                die($dwes->error);

            while ($fila = $result->fetch_object()) {
                echo "<br>";
                echo "DNI Jugador: " . prepVacio($fila->dni) . "<br>";
                echo "Nombre: " . prepVacio($fila->nombre) . "<br>";
                echo "Dorsal: " . $fila->dorsal . "<br>";
                echo "Posición: " . $fila->posicion . "<br>";
                echo "Equipo: " . $fila->equipo . "<br>";
                echo "Número Goles: " . prepVacio($fila->numGoles) . "<br>";
                echo "<br> ----------------------------- <br>";
            }
        }
    */

    ?>

    <br>
    <div>
        <form action="" method="POST">
            Elige opción de búsqueda:
            <select name="elector" id="elector">
                <option value="1">DNI</option>
                <option value="2">Equipo</option>
                <option value="3">Posición</option>
            </select>
            <!-- <button onclick="mostrarEle()" name="elegir">Elegir</button> -->
            <input type="submit" value="Elegir" name="elegir">
        </form>
    </div>

    <div id="formulario"></div>

    <script src="buscarJug.js"></script>

    <br>
    <?php
    if (isset($_POST['elegir']) || isset($_POST['equipo']) || isset($_POST['dni']) || isset($_POST['posicion'])) {
        if ($_POST['elector'] == 1) {
    ?>
            <form action="" method="POST">
                DNI:<input type="text" name="dni"><br>
                <input type="hidden" name="elector" value="<?php echo $_POST['elector'];  ?>">
                <!-- <button onclick="buscarJug($dwes)">Buscar por DNI</button> -->
                <input type="submit" value="buscar" name="buscar" onclick="buscarJug($dwes)">
            </form>
        <?php
        }

        if ($_POST['elector'] == 2) {
        ?>
            <div>
                <form action="" method="POST">
                    Equipo: <select name="equipo">
                        <option value="%" selected>Cualquiera</option>
                        <?php calcEquipos($dwes) ?>
                    </select> <br>
                    <input type="hidden" name="elector" value="<?php echo $_POST['elector'];  ?>">
                    <input type="submit" value="buscar" name="buscar" onclick="buscarJug($dwes)">
                    <!--<button type="submit" onclick="buscarJug($dwes)">Buscar por Equipo</button> -->
                </form>
            </div>

            <!-- Buscar por DNI -->

        <?php
        }

        if ($_POST['elector'] == 3) {
        ?>
            <form action="" method="POST">
                Posición: <select name="posicion">
                    <option value="*" selected>Cualquiera</option>
                    <option value="Portero">Portero</option><br>
                    <option value="Defensa">Defensa</option><br>
                    <option value="Centrocampista">Centrocampista</option><br>
                    <option value="Delantero">Delantero</option><br>
                </select><br>
                <input type="hidden" name="elector" value="<?php echo $_POST['elector'];  ?>">
                <input type="submit" value="buscar" name="buscar" onclick="buscarJug($dwes)">
            </form>

    <?php
        }
    }

    if (isset($_POST['buscar'])) {
        buscarJug($dwes);
    }
    ?>
</body>

</html>