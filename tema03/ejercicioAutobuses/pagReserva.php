<?php
echo "<h2> Pasado POST: " . $_POST['destino'] . "</h2>";
$viaje = calcViaje($conexion, $_POST['fecha'], $_POST['origen'], $_POST['destino']);

if (!isset($_POST['reservar'])) {

?>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de Viaje:</label>
            <input type="text" name="fecha" id="fecha" value="<?php echo $_POST['fecha'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="origen" class="form-label">Ciudad Origen</label>
            <input type="text" name="origen" id="origen" value="<?php echo $_POST['origen'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="destino" class="form-label">Ciudad Origen</label>
            <input type="text" name="destino" id="destino" value="<?php echo $_POST['destino'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="plazas" class="form-label">Plazas Libres</label>
            <input type="text" name="plazas" id="plazas" value="<?php echo $viaje->Plazas_libres ?>" readonly>
            <?php if ($viaje->Plazas_libres <= 0) echo '<p class="text-danger"> No quedan plazas para este viaje</p>'; ?>
        </div>
        <div class="mb-3">
            <label for="reservadas" class="form-label">Nº plazas a reservar</label>
            <input type="number" name="reservadas" id="reservadas" placeholder="Nº Plazas" <?php if ($viaje->Plazas_libres <= 0) echo 'disabled'; ?>>

        </div>
        <input type="hidden" name="buscar">
        <button type="submit" id="reservar" name="reservar" class="btn-lg btn-primary" <?php if ($viaje->Plazas_libres <= 0) echo 'disabled'; ?>>Reservar Viaje</button>
    </form>
    <form action="index.php">
        <button type="submit" name="inicio" class="btn-lg btn-primary">Volver Inicio</button>
    </form>

    <?php
} else {
    //echo "<h2> KK BORREME Has reservado $_POST[plazas] correctamente </h2>";
    if ($_POST['plazas'] > 0  && verifPlazas($conexion, $_POST['fecha'], $_POST['origen'], $_POST['destino'], $_POST["reservadas"])) {
        if (actPlazas($conexion, $_POST['fecha'], $_POST['origen'], $_POST['destino'], $_POST["reservadas"])) {
            echo "<h2> Has reservado $_POST[reservadas] correctamente </h2>";
    ?>
            <form action="index.php">
                <button type="submit" name="inicio" class="btn-lg btn-primary">Volver Inicio</button>
            </form>
        <?php
        }
    } else {

        ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de Viaje:</label>
                <input type="text" name="fecha" id="fecha" value="<?php echo $_POST['fecha'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="origen" class="form-label">Ciudad Origen</label>
                <input type="text" name="origen" id="origen" value="<?php echo $_POST['origen'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="destino" class="form-label">Ciudad Origen</label>
                <input type="text" name="destino" id="destino" value="<?php echo $_POST['destino'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="plazas" class="form-label">Plazas Libres</label>
                <input type="text" name="plazas" id="plazas" value="<?php echo $viaje->Plazas_libres ?>" readonly>
                <?php if ($viaje->Plazas_libres <= 0) echo '<p class="text-danger"> No quedan plazas para este viaje</p>'; ?>
            </div>
            <div class="mb-3">
                <label for="reservadas" class="form-label">Nº plazas a reservar</label>
                <input type="number" name="reservadas" id="reservadas" placeholder="Nº Plazas">
                <p class="text-danger"> Número de plazas incorrecto, intentalo de nuevo</p>
            </div>
            <input type="hidden" name="buscar">
            <button type="submit" id="reservar" name="reservar" class="btn-lg btn-primary">Reservar Viaje</button>
        </form>
        <form action="index.php">
            <button type="submit" name="inicio" class="btn-lg btn-primary">Volver Inicio</button>
        </form>
<?php
    }
}
?>