<?php
require_once '../Controllers/ProductoController.php';

if (isset($_POST['insertar'])) {
    $p = new Producto($_POST['cod'], $_POST['nom'], $_POST['pre']);
    ProductoController::insertar($p);
}
if (isset($_POST['mostrar'])) {
    $ListaPro = ProductoController::recuperarTodos();
    foreach ($ListaPro as $value) {
        echo $value;
    }
    echo "<br>";
}
?>

<form action="" method="POST">
    Codigo: <input type="text" name="cod"><br>
    Nombre: <input type="text" name="nom"> <br>
    Precio: <input type="text" name="pre"> <br>
    <input type="submit" value="Insertar" name="insertar">
    <input type="submit" value="Mostrar" name="mostrar">
    <input type="submit" value="Limpiar" name="limpiar">
</form>