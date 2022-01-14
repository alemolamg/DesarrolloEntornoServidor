<?php
$divisaOrigen = $_GET['origen'];
$divisaDestino = $_GET['destino'];
$cantidad = $_GET['cant'];

$kk = array ('origen' => $divisaOrigen,'destino' => $divisaDestino,'cantidad' => $cantidad);

echo json_encode($kk);


?>