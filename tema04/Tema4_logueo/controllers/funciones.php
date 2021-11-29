<?php
function crearConexion()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);
    return $dwes;
}

function nuevoUser($conx, $user, $pass, $nombre, $apel, $loc, $direc, $colorText, $colorFondo, $tipoText, $tamText)
{
    //$sql = "UPDATE empleados SET user = '$user', pass = '$pass', nombre = '$nombre', apellidos = '$apel',
    //colorFondo='$colorFondo', colorLetra='$colorText',tamTexto='$tamText', tipoTexto='$tipoText'";
    $sql = "INSERT INTO empleados (user,pass,nombre,apellidos,colorFondo,colorLetra,tamTexto,tipoTexto,direccion,localidad) 
        VALUES $user,$pass,$nombre,$apel,$colorFondo,$colorText,$tamText.$tipoText,$direc,$loc";

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


function rellenarTamLetra()
{
    for ($i = 9; $i < 30; $i++) {
        echo "<option value='$i'>$i</option>";
    }
}
