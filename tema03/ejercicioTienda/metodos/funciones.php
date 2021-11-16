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

function selectorNomCorto($conexion)
{
    //echo "entro selector Artúculos aquí!";
    $productos = $conexion->query('select * from producto ORDER BY nombre_corto');
    if ($conexion->errorCode() != 0) {
        print_r($conexion->errorInfo());
        die("ERROR");
    }
    while ($a = $productos->fetch()) {
        if (isset($_POST['nomCorto'])) {
            if ($_POST['nomCorto'] == $a)
                $coinc =  'selected';
        } else
            $coinc = "";
        echo "<option value='$a->cod' $coinc >$a->nombre_corto</option><br>";
    }
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
        <form action="modificar.php" method="POST">
            <?php
            $mensPro = "Producto: $prod->nombre_corto , cod: $prod->cod -- PVP: $prod->PVP €";
            echo $mensPro . "&nbsp";
            ?>

            <input type="hidden" name='codPro' value='<?php echo $prod->cod; ?>'>
            <input type="button" value="Editar" name="editar">
        </form>
<?php
        echo "<br>";
    }
}

function selectorFamilia($conexion)
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
        if ($_POST['familia'] == $a->familia)
            $coinc =  'selected';
        else
            $coinc = "";
        echo "<option value='$a->familia' $coinc >$a->familia</option><br>";
    }
}

?>