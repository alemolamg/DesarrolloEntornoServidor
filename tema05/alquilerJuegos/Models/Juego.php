<?php

class Juego
{
    private $codigo;
    private $nombreJuego;
    private $nombreConsola;
    private $anno;
    private $precio;
    private $alquilado;
    private $imagen;
    private $descrip;

    public function __construct($nomJuego, $nomCons, $precio, $imagen, $anio = 2020)
    {
        $this->nombreJuego = $nomJuego;
        $this->nombreConsola = $nomCons;
        $this->precio = $precio;
        $this->anno = $anio;
        $this->alquilado = false;
        $this->imagen = $imagen;    //Cambiar por el generador de imágenes
        $this->codigo = $this->generarCod();
    }

    /**
     * @author AlemolAMG
     * @param
     */
    public function generarCod()
    {
        $codGenerado = "";
        $cadJuego = explode(" ", $this->nombreJuego);
        $cadCons = explode(" ", $this->nombreConsola);

        foreach ($cadJuego as $palabra) {
            $codGenerado .= substr($palabra, 0, 1);
        }

        $codGenerado .= " - ";

        foreach ($cadCons as $palabra) {
            $codGenerado .= substr($palabra, 0, 1);
        }

        $this->codigo = $codGenerado;
        return $codGenerado;
    }
}
