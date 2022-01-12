<?php

require_once './Conexion.php';
/*
 * simplemente contiene los métodos que hemos registrado en nuestro webservice.
 */

class Funciones {
    
    /**
     * Dado el código de un producto, devolvemos su precio
     * @param string $codProducto codigo del producto
     * @return float precio del producto
     */
    public function getPVP($codProducto) {
        $sql = "SELECT PVP FROM producto WHERE cod = '$codProducto';";
        $conex = new Conexion();    //Creamos la conexión
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            $fila = $result->fetch();
            return $fila->PVP;
        }
    }

    /**
     * Dado un producto y una tienda, 
     * @param type $codProducto Código del producto
     * @param type $codTienda Código de la tienda
     * @return int número unidades disponibles en la tienda
     */
    public function getStock($codProducto,$codTienda) {
        $sql = "SELECT unidades FROM stock WHERE producto = '$codProducto' AND tienda = '$codTienda';";
        $conex = new Conexion();    //Creamos la conexión
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            $fila = $result->fetch();
            return $fila->unidades;
        } else {
            return 0;
        }
    }

    public function getFamilias() {
        $familias;
        $sql = "SELECT * FROM familia;";
        $conex = new Conexion();    //Creamos la conexión
        $result = $conex->query($sql);
        
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            while ($fila = $result->fetch()){
            
             $fila->unidades;
            }
        }
        
    }

    public function getProductosFamilias() {
        
    }

}
