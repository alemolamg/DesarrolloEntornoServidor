<?php
class Persona
{
    protected $nombre;
    protected $apell;
    protected $edad;
    protected static $numPerson = 0;

    public function __construct($n = "Francisco", $a = "Perez", $e = "20")
    {
        $this->nombre = $n;
        $this->apell = $a;
        $this->edad = $e;
        self::$numPerson++;
    }

    public static function getNumPerson()
    {
        return self::$numPerson;
    }
    
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __toString() {
        return "Nombre: ".$this->nombre . " " . $this->apell . " , Edad: " . $this->edad;
    }

            /*
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApell()
    {
        return $this->apell;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApell($apell): void
    {
        $this->apell = $apell;
    }

    public function setEdad($edad): void
    {
        $this->edad = $edad;
    }
    */
}
