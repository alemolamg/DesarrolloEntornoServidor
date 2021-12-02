<?php
require_once 'Animal.php';
class Pinguino extends Ave
{
    const IMG = './images/aguila.jpg';
    public $terrestre = true; //True si lo son, false si no.
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

    function nadar()
    {
        return "El pingüino si sabe nadar, pero no vuela.";
    }

    function volar()
    {
        return 'Los pingüinos no vuelan lo siento, pero si nadan.';
    }
}
