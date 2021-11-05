<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores: Búsqueda</title>
    <script src="buscarJug.js"></script>
</head>

<body>
    <h1>Buscar Jugadores</h1>
    <!-- no tocar estos
    <input type="button" value="Volver" onclick="location.href='./index.php'">
    <input type="button" value="Búsqueda Avanzada" onclick="location.href='./buscarAdvJug.php'"><br>
-->
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

    /*function calcEquipos($conx)
    {
        $sql = "SELECT `equipo` FROM `jugadores` GROUP BY `equipo` ORDER BY `equipo`;";
        $result = $conx->query($sql);
        if ($conx->errno)
            die($conx->error);
        while ($a = $result->fetch_object()) {
            if ($_POST['equipo'] == $a->equipo) $coinc =  'selected';
            else $coinc = "";
            echo "<option value='$a->equipo' $coinc >$a->equipo</option><br>";
        }
    }*/

    function buscarJug($dwes)
    {
        $sql = "SELECT * FROM `jugadores` WHERE `dni` LIKE '%$_POST[dni]%' AND `posicion` LIKE '$_POST[posicion]' AND `equipo` LIKE '$_POST[equipo]'";
        $result = $dwes->query($sql);
        if ($dwes->errno)
            die($dwes->error);

        while ($fila = $result->fetch_object()) {
            echo "DNI Jugador: " . prepVacio($fila->dni) . "<br>";
            echo "Nombre: " . prepVacio($fila->nombre) . "<br>";
            echo "Dorsal: " . $fila->dorsal . "<br>";
            echo "Posición: " . $fila->posicion . "<br>";
            echo "Equipo: " . $fila->equipo . "<br>";
            echo "Número Goles: " . prepVacio($fila->numGoles) . "<br>";
            echo "<br> ----------------------------- <br>";
        }
    }

    ?>

    <br>
    <div>
        <form action="" method="POST" onsubmit="return false">
            Elige opción de búsqueda:
            <select name="elector" id="elector">
                <option value="1">DNI</option>
                <option value="2">Equipo</option>
                <option value="3">Posición</option>
            </select>
            <button onclick="mostrarEle()">Elegir</button>
        </form>
    </div>

    <div id="formulario"></div>


</body>

</html>