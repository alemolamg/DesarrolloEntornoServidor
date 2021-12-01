<?php

abstract class Animal
{
    public $especie;
    public $imagen;
    public $numPatas;
    public $alimentacion;

    abstract function __toString();
    
    public function __get($name) {
        return $this->$name;
    }
}
