<?php
function calcEquipos($conx)
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
}

function conexionBD()
{
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
    if ($dwes->connect_errno) {     //Entra si hay hay errores
        //$mensaje = $dwes->connect_errno."-".$dwes->connect_error;
        $error = $dwes->connect_errno;
        die("ERROR AL CONECTAR CON EL SERVIDOR DE BD");
    }
    $error = $dwes->connect_errno;
    $mensaje = "No hay errores";
    //echo "<h3>ERROR $error : $mensaje </h3>";
    return $dwes;
}

function jugadorPorDNI($conx, $dni)
{
    $sql = "SELECT * FROM `jugadores` WHERE `dni` = '$dni' LIMIT 1;";
    $result = $conx->query($sql);
    if ($conx->errno)
        die($conx->error);
    return $result->fetch_object();
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
