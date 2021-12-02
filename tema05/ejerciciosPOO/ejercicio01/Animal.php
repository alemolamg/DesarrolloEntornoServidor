<?php

abstract class Animal
{
    private $especie;
    private $imagen;
    private $numPatas;
    private $alimentacion;

    abstract function __toString();

    public function __get($name)
    {
        return $this->$name;
    }
}
