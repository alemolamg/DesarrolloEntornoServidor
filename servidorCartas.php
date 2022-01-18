<?php
//define('OROS', 0);
//define('COPAS', 1);
//define('ESPADAS', 2);
//define('BASTOS', 3);

$palo = $_GET['palo'];
$numCarta = $_GET['carta'];

$miCarta = new Carta($numCarta, $palo);
echo json_encode($miCarta->__toArray());

class Carta {

    const OROS = 0;
    const COPAS = 1;
    const ESPADAS = 2;
    const BASTOS = 3;

    private $palo;
    private $numero;
    private $idCarta;

    public function __construct($numCarta, $numPalo) {
        if ($this->calculaID_Carta($numPalo, $numCarta)) {
            $this->idCarta = $this->calculaID_Carta($numPalo, $numCarta);
            $this->palo = $numPalo;
            $this->numero = $numCarta;
        }
    }

    private function calculaID_Carta($numPalo, $numCarta) {
        if ($numPalo == self::OROS || $numPalo == self::BASTOS || $numPalo == self::ESPADAS || $numPalo == self::COPAS) {
            $id = 13 * $numPalo + $numCarta;
            return $id;
        } else
            return false;
    }

    public function __toArray() {
        $cartaArray = [$this->idCarta, $this->palo, $this->numero];
        return $cartaArray;
    }

}
