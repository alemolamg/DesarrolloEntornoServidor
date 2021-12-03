<?php

class Conexion extends mysqli
{
    // --- Parámetros
    private $host = 'localhost';
    private $usu = 'dwes';
    private $pass = 'abc123.';
    private $dataBase = 'bd_objetos';

    public function __construct()
    {
        parent::__construct($this->host, $this->usu, $this->pass, $this->dataBase);
        if (mysqli_connect_errno()) {
        }
    }


    public function getHost()
    {
        return $this->host;
    }

    public function getUsu()
    {
        return $this->usu;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getDataBase()
    {
        return $this->dataBase;
    }
}
