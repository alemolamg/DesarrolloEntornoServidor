<?php
class Cliente
{
    private $dni;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $localidad;
    private $clave;
    private $tipo;
    private $bloqueado = false;
    private $intentos = 2;

    public function __construct($dni,$nombre,$apell,$direc,$loc,$tipo = 'cliente',$clave = "1234") {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apell;
        $this->direccion = $direc;
        $this->localidad = $loc;
        $this->tipo = $tipo;
        $this->clave = md5($clave);
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __clone() {
        return $this;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    
    
}
