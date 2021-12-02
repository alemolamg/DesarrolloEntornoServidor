<?php
require_once('./Animal.php');

class Lagarto extends Animal
{
    const IMAGEN = 'https://static1.abc.es/media/201011/11/lagarto--478x270.jpg';
    private $edad;
    private $nombre;
    private $sonido;
    private $especie;
    private $numPatas;
    private $alimentacion;
    private $imagen;
    private $terrestre;

    function __construct($nombre, $edad, $esp, $numPatas, $alimentacion, $imagen = Lagarto::IMAGEN)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->especie = $esp;
        $this->numPatas = $numPatas;
        $this->alimentacion = $alimentacion;
        $this->imagen = $imagen;
        $this->terrestre = true;
    }

    function __toString()
    {
        return "Especie: " . $this->especie . " ,Alimentación: " . $this->alimentacion .
            " ,Nº Patas: $this->numPatas ";
    }

    function ladrar()
    {
        return $this->sonido;
    }
}
