<?php
require_once('./Mamifero.php');

class Perro extends Mamifero
{
    public $edad;
    public $nombre;
    public $colorPelo;
    private $sonido;
    const IMG = 'https://upload.shinycatz.es/img_global/4-animal-perro/_light-80620-toby.jpg';

    function __construct($nombre, $edad, $colorPelo, $esp, $numPatas, $alimentacion, $imagen = self::IMG)
    {
        parent::__construct($esp, $numPatas, $alimentacion, $imagen);
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->colorPelo = $colorPelo;
        //$this->imagen = $imagen;
    }

    function __toString()
    {
        parent::__toString();
    }

    function ladrar()
    {
        return $this->sonido;
    }
}
