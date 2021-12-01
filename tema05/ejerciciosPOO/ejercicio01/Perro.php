<?php
require_once('./Mamifero.php');

class Perro extends Mamifero
{
    public $edad;
    public $nombre;
    public $colorPelo;

    function __construct($nombre, $edad, $colorPelo, $esp, $numPatas, $alimentacion, $imagen = mamifero::IMG)
    {
        parent::__construct($esp, $numPatas, $alimentacion, $imagen);
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->colorPelo = $colorPelo;
    }

    function __toString()
    {
        parent::__toString();
    }
}
