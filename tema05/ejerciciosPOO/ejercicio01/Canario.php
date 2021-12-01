<?php
require_once('./Ave.php');

class Canario extends Ave
{
    const IMG = 'https://curiosfera-animales.com/wp-content/uploads/2018/05/canario.jpg';
    public $nombre;
    public $colorPlumas;


    function __construct($nombre, $edad, $colorPlumas, $esp, $numPatas, $alimentacion, $imagen = Canario::IMG)
    {
        parent::__construct($esp, $numPatas, $alimentacion, $imagen);
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->colorPlumas = $colorPlumas;
    }

    function __toString()
    {
        parent::__toString();
    }
}
