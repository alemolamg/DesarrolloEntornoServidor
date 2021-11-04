<h1>Búsqueda Avanzada Jugadores</h1>

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

function calcEquipos($conx)
{

    $sql = "SELECT `equipo` FROM `jugadores` GROUP BY `equipo` ORDER BY `equipo`;";
    $result = $conx->query($sql);
    if ($conx->errno)
        die($conx->error);
    while ($a = $result->fetch_object()) {
        echo "<option value='$a->equipo'>$a->equipo</option><br>";
    }
}

function prepVacio($valor)
{
    if ($valor != '' || $valor != '%') {
        return $valor;
    } else return '%';
}

?>

<div class="formulario">
    <form action="" method="post">
        DNI:<input type="text" name="dni"><br>
        Nombre: <input type="text" name="nombre"><br>
        Dorsal: <select name="dorsal">
            <?php
            for ($i = 0; $i <= 11; $i++) {
                if ($i != 0) {
                    echo "<option value='$i'>$i</option><br>";
                } else
                    echo "<option value='%'>Cualquiera</option><br>";
            }
            ?>
        </select><br>
        Posición: <select name="posicion">
            <option value="%">Cualquiera</option>
            <option value="Portero">Portero</option><br>
            <option value="Defensa">Defensa</option><br>
            <option value="Centrocampista">Centrocampista</option><br>
            <option value="Delantero">Delantero</option><br>
        </select><br>
        Equipo: <select name="equipo">
            <option value="%">Cualquiera</option>
            <?php calcEquipos($dwes) ?>
        </select> <br>
        Num. Goles:<input type="text" name="numgoles"><br>
        <br><br>
        <input type="button" value="Volver" onclick="location.href='./index.php'">
        <input type="submit" value="Buscar" name="buscar">
    </form>
</div>

<?php
if (isset($_POST['buscar'])) {
    //$sql = "SELECT * FROM `jugadores` WHERE `dni` LIKE '$_POST[dni]' AND `nombre` LIKE '$_POST[nombre]' AND `dorsal` LIKE '$_POST[dorsal]' AND `posicion` LIKE '$_POST[posicion]' AND `equipo` LIKE '$_POST[equipo]' AND `numGoles` LIKE '$_POST[numgoles]'";
    $sql = "SELECT * FROM `jugadores` WHERE `equipo` LIKE '$_POST[equipo]'  ORDER BY `dni`;";
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