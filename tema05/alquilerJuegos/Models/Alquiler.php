<?php

class Alquiler
{
    private $id;
    private $dniCliente;
    private $codJuego;
    private $fechaAlquiler;
    private $fechaDevol;

    public function __construct($dniCliente, $codJuego)
    {
        $this->dniCliente = $dniCliente;
        $this->codJuego = $codJuego;
        $this->fechaAlquiler = Date('Y-m-d', time());
        $this->fechaDevol = null;
    }

    /**
     * Marca la fecha actual como devolución del juego
     */
    public function devolverJuego()
    {
        $this->fechaDevol = Date('Y-m-d', time());
    }

    public function nuevoAlquiler($id, $idCliente, $codJuego, $fechaAlq, $fechaDev)
    {
        $this->id = $id;
        $this->codJuego = $codJuego;
        $this->dniCliente = $idCliente;
        $this->fechaAlquiler = $fechaAlq;
        $this->fechaDevol = $fechaDev;
    }

    public function getDniCliente()
    {
        return $this->dniCliente;
    }

    public function getCodJuego()
    {
        return $this->codJuego;
    }

    public function getFechaAlquiler()
    {
        return $this->fechaAlquiler;
    }

    public function getFechaDevol()
    {
        return $this->fechaDevol;
    }

    public function setDniCliente($dniCliente): void
    {
        $this->dniCliente = $dniCliente;
    }

    public function setCodJuego($codJuego): void
    {
        $this->codJuego = $codJuego;
    }

    public function setFechaAlquiler($fechaAlquiler): void
    {
        $this->fechaAlquiler = $fechaAlquiler;
    }

    public function setFechaDevol($fechaDevol): void
    {
        $this->fechaDevol = $fechaDevol;
    }
}
