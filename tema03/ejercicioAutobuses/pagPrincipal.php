<?php require_once "metodos/funciones.php";
$conexion = conexionBD();

muestraTexto("Texto grande");
?>

<h2>Autobuses Molero</h2>
<form action="index.php" method="post">
    <!-- Fecha: <input type="date" name="fecha" id=""><br> -->
    <!-- Fecha:
    <select name="" id=""></select> <br> -->
    Origen:
    <select name="origen" id="">
        <?php calcOrigen($conexion); ?>
        <option value=""></option>
    </select> <br>
    Destino:
    <select name="destino" id="">
        <?php calcDestino($conexion); ?>
    </select>

</form>