<?php require_once "metodos/funciones.php";
$conexion = conexionBD();


if (!isset($_POST['buscar'])) {

?>
    <br>
    <form action="index.php" method="post">
        <div class="mb-4">
            <label for="selectFecha" class="form-label">Elige Fecha de Viaje:</label>
            <select name="fecha" id="selectFecha" class="form-select">
                <?php calcFecha($conexion); ?>
                <option value=""></option>
            </select>
        </div>
        <div class="mb-4">
            <label for="selectOrigen" class="form-label"> Origen: </label>
            <select name="origen" id="selectOrigen" class="form-select">
                <?php calcOrigen($conexion); ?>
                <option value=""></option>
            </select>
        </div>

        <div class="mb-4">
            <label for="selectDestino" class="form-label"> Destino: </label>
            <select name="destino" id="selectDestino" class="form-select">
                <?php calcDestino($conexion); ?>
            </select>
        </div>
        <input type="hidden" name="conexion" value="">
        <button type="submit" id="buscar" name="buscar" class="btn-lg btn-primary">Buscar Viaje</button>
    </form>

    <?php
} else {
    if (calcViaje($conexion, $_POST['fecha'], $_POST['origen'], $_POST['destino'])) {   // Entramos a reservar el Viaje
        //echo "<h1 style='color: green;'>Funciona totalmente, pasaremos al próximo paso</h1> <br>";
        include("pagReserva.php");
    } else {    // Pedimos que arreglen el formulario
    ?>
        <h3 style="color: red;">No existe ese viaje para esa fecha</h3>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="selectFecha" class="form-label">Elige Fecha de Viaje:</label>
                <select name="fecha" id="selectFecha" class="form-select">
                    <?php calcFecha($conexion); ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="selectOrigen" class="form-label"> Origen: </label>
                <select name="origen" id="selectOrigen" class="form-select">
                    <?php calcOrigen($conexion); ?>
                </select>
            </div>

            <div class="mb-3 ">
                <label for="selectDestino" class="form-label"> Destino: </label>
                <select name="destino" id="selectDestino" class="form-select">
                    <?php calcDestino($conexion); ?>
                </select>
            </div>
            <button type="submit" id="buscar" name="buscar" class="btn-lg btn-primary">Buscar Viaje</button>
        </form>
<?php
    }
}

?>