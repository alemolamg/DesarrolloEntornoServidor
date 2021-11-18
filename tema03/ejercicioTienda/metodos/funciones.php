<?php

function conexionBD()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);
    if ($dwes->errorCode() != 0) {
        throw new Exception('Fallo en búsqueda sql: ' . $dwes->errorInfo());
        //print_r($dwes->errorInfo());
        //die("ERROR");
    }
    return $dwes;
}

function selectorCodigo($conexion, $codigo)
{
    //echo "entro selector Artúculos aquí!";
    $productos = $conexion->query("select * from producto WHERE cod = '$codigo' LIMIT 1");
    if ($conexion->errorCode() != 0) {
        print_r($conexion->errorInfo());
        die("ERROR");
    }
    $a = $productos->fetch();
    return $a;
}


function mostrarProductosFamilia($conexion, $familia)
{
    $sql = "SELECT * FROM producto WHERE familia = '$familia' ORDER BY nombre_corto;";
    try {
        $listaPro = $conexion->query($sql);
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

function selectorFamilia($conexion, $familia)
{
    //echo "entro selector Artúculos aquí!";
    $productos = $conexion->query('select DISTINCT familia from producto ORDER BY familia');
    if ($conexion->errorCode() != 0) {
        throw new Exception('Fallo en búsqueda sql: ' . $conexion->errorInfo());
        //print_r($conexion->errorInfo());
        //die("ERROR");
    }
    while ($a = $productos->fetch()) {
        //if (isset($_POST['familia'])) {
        if ($familia == $a->familia)
            $coinc =  'selected';
        else
            $coinc = "";
        echo "<option value='$a->familia' $coinc >$a->familia</option><br>";
    }
}

function updateProducto($conexion, $codPro, $nombre, $nombreCorto, $descrip, $PVP, $familia)
{
    $sql = "UPDATE producto SET nombre = '$nombre', nombre_corto = '$nombreCorto', descripcion = '$descrip', PVP = '$PVP', familia = '$familia' WHERE cod = '$codPro' ";
    if ($conexion->exec($sql) === false) {
        print_r($conexion->errorInfo());
        echo "0 FILAS AFECTADAS";
        return false;
    }
    return true;
}

?>