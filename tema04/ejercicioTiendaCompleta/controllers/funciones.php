<?php
function crearConexion()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);
    return $dwes;
}

function mostrarProductos($conx)
{
    $sql = "SELECT * FROM productos ORDER BY nombre_corto";
    try {
        $listaPro = $conx->query($sql);
    } catch (\Throwable $th) {
        //throw $th;
    }
    while ($prod = $listaPro->fetch()) {
?>
        <form action="./modificar.php" method="POST">
            <?php
            $mensPro = "Producto: $prod->nombre_corto , cod: $prod->cod -- PVP: $prod->PVP €";
            echo $mensPro . "&nbsp";
            ?>
            <input type="hidden" name='codPro' value='<?php echo $prod->cod; ?>'>
            <input type="submit" value="Editar" name="editar">
        </form>
<?php
        echo "<br>";
    }
}
