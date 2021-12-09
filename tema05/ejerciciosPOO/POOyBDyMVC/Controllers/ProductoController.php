<?php
require_once '../Model/Producto.php';
require_once 'ConexionMysqli.php';

class ProductoController
{
    public function insertar($producto)
    {
        $conex = new Conexion();
        $conex->query("INSERT INTO producto (codigo,nombre,precio) VALUES ($producto->codigo,'$producto->nombre',$producto->precio)");

        $error = $conex->errno;
        $conex->close();
        return $error;
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
            return new Producto($registro->codigo, $registro->nombre, $registro->precio);
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
            $p = new Producto();
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
