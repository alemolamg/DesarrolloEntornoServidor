<?php
function crearConexion()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);
    return $dwes;
}

function mostrarProductos($conx)
{
    //echo "Entro en la funcion";
    $sql = "SELECT * FROM producto ORDER BY nombre_corto";
    try {
        $listaPro = $conx->query($sql);
    } catch (\Throwable $th) {
        throw $th;
    }
    while ($prod = $listaPro->fetch()) {
?>
        <form action="." method="POST">
            <?php
            $mensPro = "Producto: $prod->nombre_corto , cod: $prod->cod -- PVP: $prod->PVP €";
            echo $mensPro . "&nbsp";
            ?>
            <input type="hidden" name='codPro' value='<?php echo $prod->cod; ?>'>
            <input type="submit" value="Añadir" name="aniadir" class="btn btn-success">
        </form>
<?php
        echo "<br>";
    }
}

function aniadirElementoCesta($conx, $codigo)
{
    if (isset($_SESSION['cesta'])) {
        $sql = "SELECT * FROM producto WHERE cod = $codigo LIMIT 1";
        $productos = $conx->query();
        if ($prod = $productos->rowCount()) {
            if (isset($_SESSION['cesta'][$codigo])) {
                $_SESSION['cesta'][$codigo]['cant']++; //cambiar si no aumenta por +=1
            } else {
                $array = array('cant' => 1, 'nombre_corto' => $prod->nombre_corto, 'PVP' => $prod->PVP);
                $_SESSION['cesta'][$codigo] = $array;
            }
        }
    } else {
        $_SESSION['cesta'];
        aniadirElementoCesta($conx, $codigo);
    }
}

function mostrarCesta()
{
    $mensPro = "";
    foreach ($_SESSION['cesta'] as $prod) {
        //for ($i = 0; $i < count($prod); $i++) {
        $mensPro = "Cantidad: " . $prod['cant'] . " Producto: " . $prod['nombre_corto'] . " -- PVP: " . $prod["PVP"] . " €";

        echo $mensPro . "&nbsp";
        //}
    }
}
