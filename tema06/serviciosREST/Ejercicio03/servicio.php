<?php
// Defino las variables con el valor de cada moneda
define('EURO', 'euro');
define('DOLAR', 'dolar');
define('LIBRA', 'libra');
define('EUROtoDOLAR', 1.14);
define('EUROtoLIBRA', 0.83);
define('DOLARtoLIBRA', 0.73);
define('DOLARtoEURO', 0.88);
define('LIBRAtoEURO', 1.20);
define('LIBRAtoDOLAR', 1.37);

$divisaOrigen = $_GET['orig'];  //divisa de origen
$divisaDestino = $_GET['dest']; //divisa de destino
$cantidad = $_GET['cant'];      //cantidad a cambiar

$cambio = cambiarMoneda($divisaOrigen, $divisaDestino, $cantidad);

//var_dump($cambio);
//echo '<br>';
echo json_encode($cambio);
/*if ($cambio != 'error') {
    echo json_encode($cambio);
} else
    echo json_encode("$cambio");
 * */
 


//echo json_encode($kk);

function cambiarMoneda($divisaOrig, $divisaDest, $cant)
{
    $newCant = 0;

    if ($divisaOrig == EURO) {
        if ($divisaDest == DOLAR) {
            $newCant = $cant * EUROtoDOLAR;
        } elseif ($divisaDest == LIBRA) {
            $newCant = $cant * EUROtoLIBRA;
        }
    } elseif ($divisaOrig == DOLAR) {
        if ($divisaDest == EURO) {
            $newCant = $cant * DOLARtoEURO;
        } elseif ($divisaDest == LIBRA) {
            $newCant = $cant * DOLARtoLIBRA;
        }
    } elseif ($divisaOrig == LIBRA) {
        if ($divisaDest == EURO) {
            $newCant = $cant * LIBRAtoEURO;
        } elseif ($divisaDest == DOLAR) {
            $newCant = $cant * LIBRAtoDOLAR;
        }
    } else {
        return 'error';
    }
    $arrayDivisas = ['orig' => $divisaOrig, 'dest' => $divisaDest, 'cant' => $newCant];
    return $arrayDivisas;
}
