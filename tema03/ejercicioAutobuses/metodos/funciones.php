<?php
function conexionBD()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=autobuses; charset=utf8mb4', 'dwes', 'abc123.', $options);
    if ($dwes->errorCode() != 0) {
        print_r($dwes->errorInfo());
        die("ERROR");
    }
    return $dwes;
}

function muestraTexto($texto)
{
    echo "<h1> Texto: $texto </h1>";
}

function calcOrigen($conx)
{
    $sql = "SELECT DISTINCT `Origen` FROM `viajes` ORDER BY `Origen`;";
    echo "Texto inicio";
    $result = $conx->query($sql);
    if ($conx->errorCode() != 0) {
        print_r($conx->errorInfo());
        die("ERROR");
    }
    //echo 'Hago la query';
    while ($a = $result->fetch()) {
        if ($_POST['origen'] == $a) $coinc =  'selected';
        else
            $coinc = "";
        echo "<option value='$a->Origen' $coinc >$a->Origen</option><br>";
    }
}

function calcDestino($conx)
{
    $sql = "SELECT DISTINCT `Destino` FROM `viajes` ORDER BY `Destino`;";
    $result = $conx->query($sql);
    if ($conx->errno)
        die($conx->error);
    while ($a = $result->fetch()) {
        if ($_POST['destino'] == $a->Destino) $coinc =  'selected';
        else $coinc = "";
        echo "<option value='$a->Destino' $coinc >$a->Destino</option><br>";
    }
}

function calcFecha($conx)
{
    $sql = "SELECT DISTINCT `Fecha` FROM `viajes` ORDER BY `Fecha`;";
    //echo "Texto inicio";
    $result = $conx->query($sql);
    if ($conx->errorCode() != 0) {
        print_r($conx->errorInfo());
        die("ERROR");
    }
    while ($a = $result->fetch()) {
        if ($_POST['fecha'] == $a->Fecha) $coinc =  'selected';
        else
            $coinc = "";
        echo "<option value='$a->Fecha' $coinc >$a->Fecha</option><br>";
    }
}

function calcViaje($conx, $fecha, $origen, $destino)
{
    $sql = "SELECT * FROM viajes WHERE `Fecha` = '$fecha' AND `Origen` = '$origen' AND `Destino` = '$destino' LIMIT 1;";
    $result = $conx->query($sql);
    if ($conx->errorCode() != 0) {
        print_r($conx->errorInfo());
        return false;
        die("ERROR");
    }

    return $result->fetch();
}

function verifViaje($query)
{
    if ($query->fetch()) {
        return true;
    } else {
        return false;
    }
}
