<?php
function conexionBD()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);
    if ($dwes->errorCode() != 0) {
        print_r($dwes->errorInfo());
        die("ERROR");
    }

    /*If ($dwes->connect_errno) {     //Entra si hay hay errores
            //$mensaje = $dwes->connect_errno."-".$dwes->connect_error;
            $error = $dwes->connect_errno;
            die("ERROR AL CONECTAR CON EL SERVIDOR DE BD");
        }
        $error = $dwes->connect_errno;
        $mensaje = "No hay errores";
        //echo "<h3>ERROR $error : $mensaje </h3>";
    */
    return $dwes;
}

function muestraTexto($texto)
{
    echo "<h1> Texto: $texto </h1>";
}

function calcOrigen($conx)
{
    $sql = "SELECT DISTINCT `Origen` FROM `viajes` ORDER BY `Origen`;";
    //echo "Texto inicio";
    $result = $conx->query($sql);
    if ($conx->errorCode() != 0) {
        //print_r($conx->errorInfo());
        die("ERROR");
    }
    //echo 'Hago la query';
    while ($a = $result->fetch()) {
        /*if ($_POST['origen'] == $a->Origen) $coinc =  'selected';
        else*/
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
