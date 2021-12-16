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

    public function nuevoJuego($cod, $nombreJuego, $nombreCons, $anno, $precio, $alqu, $img,$descrip)
    {
        $this->codigo = $cod;
        $this->nombreJuego = $nombreJuego;
        $this->nombreConsola = $nombreCons;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alquilado = $alqu;
        $this->imagen = $img;
        $this->descrip = $descrip;
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

        /*foreach ($cadCons as $palabra) {
            $codGenerado .= substr($palabra, 0, 1);
        }*/

        $codGenerado .= $this->nombreConsola;

        $this->codigo = $codGenerado;
        return $codGenerado;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombreJuego()
    {
        return $this->nombreJuego;
    }

    public function getNombreConsola()
    {
        return $this->nombreConsola;
    }

    public function getAnno()
    {
        return $this->anno;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getAlquilado()
    {
        return $this->alquilado;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getDescrip()
    {
        return $this->descrip;
    }
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function setNombreJuego($nombreJuego): void
    {
        $this->nombreJuego = $nombreJuego;
    }

    public function setNombreConsola($nombreConsola): void
    {
        $this->nombreConsola = $nombreConsola;
    }

    public function setAnno($anno): void
    {
        $this->anno = $anno;
    }

    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    public function setAlquilado($alquilado): void
    {
        $this->alquilado = $alquilado;
    }

    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }

    public function setDescrip($descrip): void
    {
        $this->descrip = $descrip;
    }
}
