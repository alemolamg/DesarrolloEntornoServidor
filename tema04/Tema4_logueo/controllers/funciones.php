<?php
function crearConexion()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);
    return $dwes;
}

function nuevoUser($conx, $user, $pass, $nombre, $apel, $loc, $direc, $colorText, $colorFondo, $tipoText, $tamText)
{
    $sql = "UPDATE empleados SET user = '$user', pass = '$pass', nombre = '$nombre', apellidos = '$apel',
    colorFondo='$colorFondo', colorLetra='$colorText',tamTexto='$tamText', tipoTexto='$tipoText'";

    if ($conx->exec($sql) == 0) {
        $ok = false;
    }

    if ($ok) {
        $conx->commit();
    } else {
        echo $conx->errorInfo();
        $conx->rollBack();
    }
}


/** Funciones antiguas **/

/* function mostrarProductos($conx)
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
        <form action="" method="POST">
            <?php
            $mensPro = "Producto: $prod->nombre_corto , cod: $prod->cod -- PVP: $prod->PVP €";
            echo $mensPro . "&nbsp";
            ?>
            <input type="hidden" name='codPro' value='<?php echo $prod->cod; ?>'>
            <input type="hidden" name="PVP" value='<?php echo  $prod->PVP;  ?>'>
            <input type="hidden" name="nombreCorto" value='<?php echo  $prod->nombre_corto;  ?>'>
            <input type="hidden" name="descripcion" value='<?php echo  $prod->descripcion;  ?>'>
            <input type="submit" value="Añadir" name="aniadir" class="btn btn-success">
        </form>
<?php
        echo "<br>";
    }
}  */

/* function aniadirElementoCesta($codigo, $nombreCorto, $PVP, $descrip)
{
    //$sql = "SELECT * FROM producto WHERE cod = $codigo LIMIT 1";
    if (isset($_SESSION['cesta'][$codigo])) {
        $_SESSION['cesta'][$codigo]['cant']++; //cambiar si no aumenta por +=1
    } else {
        $array = array('cant' => 1, 'nombreCorto' => $nombreCorto, 'PVP' => $PVP, 'descripcion' => $descrip);
        $_SESSION['cesta'][$codigo] = $array;
    }
} */

/* function mostrarCesta()
{
    if (isset($_SESSION['cesta'])) {
        $mensPro = "";
        foreach ($_SESSION['cesta'] as $prod) {
            //echo "ENTRO EN MOSTRAR CESTA Y TIENE: " . $prod['nombreCorto'] . '------<br>';
            $mensPro = "Cantidad: " . $prod['cant'] . " Producto: " . $prod['nombreCorto'] .
                " -- PVP: " . $prod["PVP"] . " €";
            echo $mensPro . "<br>";
        }
    } else {
        echo "--- CESTA VACÍA ---";
    }
} */

/* function vaciarCesta()
{
    unset($_SESSION['cesta']);
} */

/* function mostrarTodoProducto($prod)
{
    $mensPro =  "<h4> Producto: " . $prod['nombreCorto'] . "</h4> <br> Cantidad: " . $prod['cant'] .
        " -- PVP: " . $prod["PVP"] . " € -- <br> Descripcion: " . $prod['descripcion'] . "<br>";
    echo $mensPro;
} */

/* function precioTotal()
{
    $total = 0;
    foreach ($_SESSION['cesta'] as $producto) {
        $total += $producto['PVP'] * $producto['cant'];
    }
    return $total;
} */
