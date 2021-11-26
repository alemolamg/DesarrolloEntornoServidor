<?php
session_start();
//echo session_status();
require_once("controllers/funciones.php");
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    //echo 'Si existe $_session[user]';
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("method/referencias.php"); ?>
</head>

<body>
    <div id="contenedor" class="container-fluid">
        <div id="encabezado" class="row">
            <h1 class="bg-success p-3 text-white">Confirmación Compra</h1>
        </div>
        <div id="listaProd">
            <?php
            foreach ($_SESSION['cesta'] as $producto) {
            ?> <div class="row">
                    <?php mostrarTodoProducto($producto); ?>
                </div>
            <?php
            }
            ?>
        </div>
        <footer class="row bg-success text-white p-3 fixed-bottom">
            <div class="col">
                <h3>Finalizar compra</h3>

            </div>
            <div class="col">
                <h3>Precio Total: <?php echo precioTotal(); ?> € </h3>
            </div>
            <div class="col text-success">
                <form action="">
                    <input type="submit" value="Pagar productos" class="btn btn-light">
                </form>
            </div>
        </footer>
    </div>

</body>

</html>