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

    public function __construct()
    {;
    }
}
