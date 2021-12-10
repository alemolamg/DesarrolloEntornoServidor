<?php

class Alquiler
{
    private $dniCliente;
    private $codJuego;
    private $fechaAlquiler;
    private $fechaDevol;
    
    public function __construct($dniCliente, $codJuego) {
        $this->dniCliente = $dniCliente;
        $this->codJuego = $codJuego;
        $this->fechaAlquiler = Date('Y-m-d', time());
    }

}
