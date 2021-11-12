<?php
echo "<h2> Pasado POST: " . $_POST['destino'] . "</h2>";
$viaje = calcViaje($conexion, $_POST['fecha'], $_POST['origen'], $_POST['destino']);
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
    </div>
    <div class="mb-3">
        <label for="reservadas" class="form-label">Nº plazas a reservar</label>
        <input type="number" name="reservadas" id="reservadas" placeholder="Nº Plazas">
    </div>
    <input type="hidden" name="buscar">
    <button type="submit" id="reservar" name="reservar" class="btn-lg btn-primary">Reservar Viaje</button>
</form>