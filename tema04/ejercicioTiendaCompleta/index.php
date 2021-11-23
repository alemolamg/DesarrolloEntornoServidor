<?php
/* Preguntar a Antonio*/
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
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
                esto es una columna de productos
                <?php
                mostrarProductos($_SESSION["conx"]);

                ?>
            </div>
            <div id="cesta" class="col-4">
                <h3><img src="img/cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                <hr />
                <?php


                ?>
                <form action="" method="POST">
                    <input type="submit" name="vaciar" value="Vaciar Cesta">
                </form>
                <form action="cesta.php" method="POST">
                    <input type="submit" name="comprar" value="Comprar">
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