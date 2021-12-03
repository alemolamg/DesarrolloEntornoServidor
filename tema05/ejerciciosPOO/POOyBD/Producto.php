<?php
require_once 'ConexionMysqli.php';
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

    public function insertar()
    {
        $conex = new Conexion();
        $conex->query("INSERT INTO producto (codigo,nombre,precio) VALUES ($this->codigo,'$this->nombre',$this->precio)");

        $error = $conex->errno;
        $conex->close();
        return $error;
    }
}
