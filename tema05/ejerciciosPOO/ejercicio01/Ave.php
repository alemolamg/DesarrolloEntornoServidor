<?php
require_once 'Animal.php';
class Ave extends Animal
{
    const IMG = './images/aguila.jpg';
    public $terrestre = false; //True si lo son, false si no.
    function __construct($esp, $alimentacion, $imagen = Ave::IMG)
    {
        $this->especie = $esp;
        $this->numPatas = 2;
        $this->alimentacion = $alimentacion;
        $this->terrestre = false;
        $this->imagen = $imagen;
    }

    function __toString()
    {
        return "Especie: " . $this->especie . " ,Alimentación: " . $this->alimentacion .
            " ,Nº Patas: $this->numPatas " . " ,Terrestre: " . $this->terrestre;
    }
}
