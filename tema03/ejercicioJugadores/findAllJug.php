<h1>Lista de los Jugadores</h1>
<input type="button" value="Volver al menú" onclick="location.href='./index.php'">
<br> ----------------------------- <br>
<?php
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
if ($dwes->connect_errno) {     //Entra si hay hay errores
    $error = $dwes->connect_errno;
    die("ERROR AL CONECTAR CON EL SERVIDOR DE BD");
}
$error = $dwes->connect_errno;
$mensaje = "No hay errores";

// REalizamos la búsqueda de todos los jugadores
$sql = "SELECT * FROM `jugadores` WHERE 1 ORDER BY `dni`;";
$result = $dwes->query($sql);
if ($dwes->errno)
    die($dwes->error);

while ($fila = $result->fetch_object()) {
    echo "DNI Jugador: " . $fila->dni . "<br>";
    echo "Nombre: " . $fila->nombre . "<br>";
    echo "Dorsal: " . $fila->dorsal . "<br>";
    echo "Posición: " . $fila->posicion . "<br>";
    echo "Equipo: " . $fila->equipo . "<br>";
    echo "Número Goles: " . $fila->numGoles . "<br>";
    echo "<br> ----------------------------- <br>";
}
?>

<input type="button" value="Volver al menú" onclick="location.href='./index.php'">