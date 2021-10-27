<?php
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
$stmt = $dwes->stmt_init();
$stmt->prepare('INSERT INTO tienda (cod,nombre,tlf) VALUES (?,?,?)');
if (!$stmt->errno) {
    $cod = 4;
    $nom = "SUCURSAL3";
    $tlf = "620588411";

    $stmt->bind_param('iss', $cod, $nom, $tlf);
    $stmt->execute();
    if (!$stmt->errno) {
        echo "INSERCIÓN REALIZADA <br>";
    } else {
        echo $stmt->error;
    }
} else {
    echo 'ERROR: ' . $stmt->error;
}
$stmt->close();


// CONSULTAS PREPARADAS
//$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
$consulta = $dwes->stmt_init();
$cod = 2;
if ($consulta->prepare("SELECT * FROM tienda WHERE cod = ?")) {
    $consulta->bind_param('i', $cod);
    $consulta->execute();
    $resultado = $consulta->get_result();

    while ($fila = $resultado->fetch_object()) {
        echo '<br>Código: ' . $fila->cod;
        echo '<br>Nombre: ' . $fila->nombre;
        echo '<br>Teléfono: ' . $fila->tlf;
    }
}
