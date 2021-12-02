<?php
require_once('./Animal.php');

class Lagarto extends Animal
{
    const IMAGEN = 'https://static1.abc.es/media/201011/11/lagarto--478x270.jpg';
    const IMG = './images/lagarto.jpg';
    protected $edad;
    protected $nombre;
    protected $sonido;
    protected $especie;
    protected $numPatas;
    protected $alimentacion;
    protected $imagen;
    protected $terrestre;

    function __construct($nombre, $edad, $esp, $numPatas, $alimentacion, $imagen = self::IMG)
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

    function getImagen()
    {
        return $this->imagen;
    }

    function ladrar()
    {
        return $this->sonido;
    }
}
