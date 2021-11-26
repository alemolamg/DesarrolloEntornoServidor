<?php

session_start();
//echo session_status();
require_once("controllers/funciones.php");
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    //echo 'Si existe $_session[user]';
}
$dwes = crearConexion();

if (isset($_POST['aniadir'])) {
    //echo "Codigo Producto: " . $_POST['PVP'];
    aniadirElementoCesta($_POST['codPro'], $_POST['nombreCorto'], $_POST['PVP'], $_POST['descripcion']);
    unset($_POST["aniadir"]);
}

if (isset($_POST['vaciar'])) {
    vaciarCesta();
    unset($_POST["vaciar"]);
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. productos.php -->
<html>

<head>
    <?php require_once("method/referencias.php"); ?>
</head>

<body class="pagproductos">
    <div id="contenedor" class="container-fluid">
        <div id="encabezado" class="row">
            <h1 class="bg-success p-3 text-white">Listado de productos</h1>
        </div>
        <div class="row">

            <div id="productos" class="col">
                <?php
                mostrarProductos($dwes);

                ?>
            </div>
            <div id="cesta" class="col-4">
                <h3><img src="img/cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                <hr />
                <?php
                mostrarCesta();

                ?>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success my-1" name="vaciar" value="Vaciar Cesta">
                </form>
                <form action="comprar.php" method="POST">
                    <input type="submit" class="btn btn-success my-1" name="comprar" value="Comprar">
                </form>

            </div>
            <br class="divisor" />
            <footer id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir ">
                </form>

                <p class='error'> </p>

            </footer>

        </div>

    </div>


</body>

</html>

<?php
//}
?>