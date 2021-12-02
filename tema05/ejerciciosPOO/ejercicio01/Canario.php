<?php
require_once('./Ave.php');

class Canario extends Ave
{
    const IMG = 'https://curiosfera-animales.com/wp-content/uploads/2018/05/canario.jpg';
    const IMAGEN = "./images/canario.jpg";
    public $nombre;
    public $colorPlumas;
    private $cantar;


    function __construct($nombre, $edad, $colorPlumas, $numPatas, $alimentacion, $imagen = self::IMG)
    {
        parent::__construct('Canario', $numPatas, $alimentacion, $imagen);
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->colorPlumas = $colorPlumas;
        $this->especie = "Canario";
    }

    function __toString()
    {
        parent::__toString();
    }

    function piar()
    {
        return $this->cantar;
    }
}
