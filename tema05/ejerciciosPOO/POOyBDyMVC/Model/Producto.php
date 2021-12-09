<?php
class Producto
{
    private $codigo;
    private $nombre;
    private $precio;

    public function __construct($cod = 0, $nombre = "Vacio", $precio = 0)
    {
        $this->codigo = $cod;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function nuevoP($cod, $nom, $pre)
    {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $pre;
    }
    
    public function __toString()
    {
        return "Codigo: " . $this->codigo . ", Nombre: " . $this->nombre . ", Precio: " . $this->precio . " € <br>";
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

}
