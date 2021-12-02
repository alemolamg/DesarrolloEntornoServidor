<?php

abstract class Animal
{
    protected $especie;
    protected $imagen;
    protected $numPatas;
    protected $alimentacion;

    abstract function __toString();

    function getImagen()
    {
        return $this->imagen;
    }

    //abstract function darFunciones();

    public function __get($name)
    {
        return $this->$name;
    }
}
