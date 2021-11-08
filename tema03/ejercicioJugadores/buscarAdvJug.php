<h2>Búsqueda Avanzada Jugadores</h2>

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


if (!isset($_POST['buscar'])) {

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
            Num. Goles:<input type="number" name="numgoles"><br>
            <br><br>
            <input type="button" value="Volver" onclick="location.href='./index.php'">
            <input type="submit" value="Buscar" name="buscar">
        </form>
    </div>

<?php
} else if (isset($_POST['buscar'])) {
?>
    <div class="formulario">
        <form action="" method="post">
            DNI:<input type="text" name="dni" value='<?php if (isset($_POST["dni"])) echo $_POST["dni"];  ?>'><br>
            Nombre: <input type="text" name="nombre" value='<?php if (isset($_POST['nombre'])) echo $_POST["nombre"]; ?>'><br>
            Dorsal: <select name="dorsal">
                <?php
                for ($i = 0; $i <= 11; $i++) {
                    if ($i != 0) {
                        if ($_POST['dorsal'] == $i) $coinc =  'selected';
                        else $coinc = "";
                        echo "<option value='$i'" . $coinc . ">$i</option><br>";
                    } else
                        echo "<option value='%' selected >Cualquiera</option><br>";
                }
                ?>
            </select><br>
            Posición: <select name="posicion">

                <option value="%" selected>Cualquiera</option>
                <option value="Portero" <?php if ($_POST['posicion'] == "Portero") echo 'selected'; ?>>Portero</option><br>
                <option value="Defensa" <?php if ($_POST['posicion'] == "Defensa") echo 'selected'; ?>>Defensa</option><br>
                <option value="Centrocampista" <?php if ($_POST['posicion'] == "Centrocampista") echo 'selected'; ?>>Centrocampista</option><br>
                <option value="Delantero" <?php if ($_POST['posicion'] == "Delantero") echo 'selected'; ?>>Delantero</option><br>
            </select><br>
            Equipo: <select name="equipo">
                <option value="%" selected>Cualquiera</option>
                <?php calcEquipos($dwes) ?>
            </select> <br>
            Num. Goles:<input type="number" name="numgoles" value="<?php if (isset($_POST['numgoles'])) echo $_POST['numgoles']; ?>"><br>
            <br><br>
            <input type="button" value="Volver" onclick="location.href='./index.php'">
            <input type="submit" value="Buscar" name="buscar">
            <input type="submit" value="limpiar" name="limpiar">
        </form>
    </div>



<?php
    $sql = "SELECT * FROM `jugadores` WHERE `dni` LIKE '%$_POST[dni]%' AND `nombre` LIKE '%$_POST[nombre]%' AND `dorsal` LIKE '$_POST[dorsal]' AND `posicion` LIKE '$_POST[posicion]' AND
     `equipo` LIKE '$_POST[equipo]' AND `numGoles` LIKE '%$_POST[numgoles]%'";
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