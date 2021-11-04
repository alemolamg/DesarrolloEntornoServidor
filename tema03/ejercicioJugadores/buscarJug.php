<h1>Buscar Jugadores</h1>
<h1>NO TOCAR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1</h1>
<input type="button" value="Búsqueda Avanzada" onclick="location.href='./buscarAdvJug.php'">
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
                    echo "<option value='*'>Cualquiera</option><br>";
            }
            ?>
        </select><br>
        Posición: <select name="posicion">
            <option value="*">Cualquiera</option>
            <option value="Portero">Portero</option><br>
            <option value="Defensa">Defensa</option><br>
            <option value="Centrocampista">Centrocampista</option><br>
            <option value="Delantero">Delantero</option><br>
        </select><br>
        Equipo:<input type="text" name="equipo"><br>
        Num. Goles:<input type="text" name="numgoles"><br>
        <br><br>
        <input type="button" value="Volver" onclick="location.href='./index.php'">
        <input type="submit" value="Buscar" name="buscar">
    </form>
</div>

<?php


?>