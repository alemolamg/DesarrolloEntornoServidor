<?php

class Conexion extends PDO
{
    private $host = 'mysql:host=localhost; dbname=alquiler_juegos; charset=utf8mb4';
    private $usu = 'dwes';
    private $pass = 'abc123.';
    private $dataBase = 'alquiler_juegos';
    
    public function __construct()
    {
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
        parent::__construct($this->host, $this->usu, $this->pass, $options);
        
        $dwes = new PDO('mysql:host=localhost; dbname=alquiler_juegos; charset=utf8mb4', 'dwes', 'abc123.', $options);
        if ($dwes->errorCode() != 0) {
            print_r($dwes->errorInfo());
            die("ERROR");
        }
    }

}
