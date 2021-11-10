<h1>Modificar jugador</h1>


<form action="" method="POST">
    Buscar por DNI:<input type="text" name="dniBus"><br>
    <input type="submit" value="buscar" name="buscar">
</form>

<?php
include("funcionesBusq.php");
if (!isset($_POST["buscar"])) {
?>
    <div class="formulario">
        <form action="" method="post">
            DNI:<input type="text" name="dni" disabled><br>
            Nombre: <input type="text" name="nombre" disabled><br>
            Dorsal: <select name="dorsal" disabled>
                <?php
                for ($i = 1; $i <= 11; $i++) {
                    echo "<option value'=$i'>$i</option><br>";
                }
                ?>
            </select><br>
            Posición: <select name="posicion" multiple="true" disabled>
                <!--multiple="false"-->
                <option value="Portero">Portero</option><br>
                <option value="Defensa">Defensa</option><br>
                <option value="Centrocampista">Centrocampista</option><br>
                <option value="Delantero">Delantero</option><br>
            </select><br>
            Equipo: <select name="equipo" disabled>
                <option value="%">Cualquiera</option>
                <?php //calcEquipos($dwes); 
                ?>
            </select> <br>
            Num. Goles:<input type="number" name="numgoles" disabled><br>
            <br><br>
            <input type="button" value="Volver" onclick="location.href='./index.php'" disabled>
            <input type="submit" value="Guardar" name="guardar" disabled>
        </form>
    </div>

<?php
} else {
    $conex = conexionBD(); //Hago la conexión con la BD
    // Buscamos que exista el usuario con el dni indicado:
    $jugMod = jugadorPorDNI($conex, $_POST["dniBus"]);



?>
    <div class="formulario">
        <form action="" method="post">
            DNI:<input type="text" name="dni"><br>
            Nombre: <input type="text" name="nombre"><br>
            Dorsal: <select name="dorsal">
                <?php
                for ($i = 1; $i <= 11; $i++) {
                    echo "<option value'=$i'>$i</option><br>";
                }
                ?>
            </select><br>
            Posición: <select name="posicion" multiple="true">
                <!--multiple="false"-->
                <option value="Portero">Portero</option><br>
                <option value="Defensa">Defensa</option><br>
                <option value="Centrocampista">Centrocampista</option><br>
                <option value="Delantero">Delantero</option><br>
            </select><br>
            Equipo: <select name="equipo">
                <option value="%">Cualquiera</option>
                <?php calcEquipos($conex) ?>
            </select> <br>
            Num. Goles:<input type="number" name="numgoles"><br>
            <br><br>
            <input type="button" value="Volver" onclick="location.href='./index.php'">
            <input type="submit" value="Guardar" name="guardar">
        </form>
    </div>

<?php
}
?>

<?php
if (isset($_POST['guardar'])) {
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
    if ($dwes->connect_errno) {     //Entra si hay hay errores
        //$mensaje = $dwes->connect_errno."-".$dwes->connect_error;
        $error = $dwes->connect_errno;
        die("ERROR AL CONECTAR CON EL SERVIDOR DE BD");
    }
    $error = $dwes->connect_errno;
    $mensaje = "No hay errores";

    $dwes->query("INSERT INTO jugadores (dni,nombre,dorsal,posicion,equipo,numGoles) 
        VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[dorsal]','$_POST[posicion]','$_POST[equipo]','$_POST[numgoles]')");
    if ($dwes->errno)
        echo $dwes->error . "<br>";
    if ($dwes->affected_rows > 0)
        echo "Registro Insertado correctamente" . "<br>";
    else
        echo "¡¡¡ERROR!!! REGISTRO NO INSERTADO <br>";
}


?>