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