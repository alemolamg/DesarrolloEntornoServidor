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


    public function insertar()
    {
        $conex = new Conexion();
        $conex->query("INSERT INTO producto (codigo,nombre,precio) VALUES ($this->codigo,'$this->nombre',$this->precio)");

        $error = $conex->errno;
        $conex->close();
        return $error;
    }

    public function __toString()
    {
        return "Codigo: " . $this->codigo . ", Nombre: " . $this->nombre . ", Precio: " . $this->precio . " € <br>";
    }

    public static function buscarProducto($cod)
    {
        $sql = "SELECT * FROM producto WHERE codigo = '$cod'";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errno) {
            return $conex->errno;
        }
        if ($result->num_rows) {
            $registro = $result->fetch_object();
            return new self($registro->codigo, $registro->nombre, $registro->precio);
        } else {
            return FALSE;
        }
    }

    public static function recuperarTodos()
    {
        $sql = "SELECT * FROM producto ORDER BY codigo";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errno) {
            return $conex->errno;
        }

        if ($result->num_rows) {
            $p = new self();
            while ($fila = $result->fetch_object()) {
                $p->nuevoP($fila->codigo, $fila->nombre, $fila->precio);
                $productos[] = clone ($p);
            }
            return $productos;
        } else {
            return FALSE;
        }
    }
}
