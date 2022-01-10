<?php

require_once '../Controllers/AnimalController.php';

/**
 * Clase referencia a un animal
 */
class Animal
{
    private $codigo;
    private $tipo;
    private $especie;
    private $sexo;
    private $fechaNac;
    private $paisOrigen;
    private $continente;
    private $dniResp;
    private $imagen;

    /**
     * Constructor clase Animal
     * @param int $cod Codigo animal
     * @param String $tipo Categoría de animal
     * @param String $especie Especie del animal
     * @param String $sexo Sexo del animal (macho - hembra)
     * @param Date $fecha Fecha de nacimiento del animal
     * @param String $pais Pais de nacimiento del animal
     * @param String $continente Continente a donde pertenece
     * @param String $dniResp   DNI del encargardo de cuidar al animal
     * @param String $imagen    Imagen del animal
     */
    public function __construct($cod, $tipo, $especie, $sexo, $fecha, $pais, $continente, $dniResp, $imagen)
    {
        $this->codigo = $cod;
        $this->tipo = $tipo;
        $this->especie = $especie;
        $this->sexo = $sexo;
        $this->fechaNac = $fecha;
        $this->continente = $continente;
        $this->paisOrigen = $pais;
        $this->dniResp = $dniResp;
        $this->imagen = $imagen;
    }

    /**
     * Crea un nuevo animal a partir de los datos proporcionados
     * @param type $tipo
     * @param type $especie
     * @param type $sexo
     * @param type $fecha
     * @param type $pais
     * @param type $continente
     * @param type $dniResp
     * @param type $imagen
     */
    public function nuevoAnimal($tipo, $especie, $sexo, $fecha, $pais, $continente, $dniResp, $imagen = "imagenes/1639224961-tigre.jpg")
    {
        $this->codigo = (AnimalController::getUltimoCodigo() + 1);
        $this->tipo = $tipo;
        $this->especie = $especie;
        $this->sexo = $sexo;
        $this->fechaNac = $fecha;
        $this->continente = $continente;
        $this->paisOrigen = $pais;
        $this->dniResp = $dniResp;
        $this->imagen = $imagen;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getEspecie()
    {
        return $this->especie;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    public function getContinente()
    {
        return $this->continente;
    }

    public function getDniResp()
    {
        return $this->dniResp;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    public function setEspecie($especie): void
    {
        $this->especie = $especie;
    }

    public function setSexo($sexo): void
    {
        $this->sexo = $sexo;
    }

    public function setFechaNac($fechaNac): void
    {
        $this->fechaNac = $fechaNac;
    }

    public function setPaisOrigen($paisOrigen): void
    {
        $this->paisOrigen = $paisOrigen;
    }

    public function setContinente($continente): void
    {
        $this->continente = $continente;
    }

    public function setDniResp($dniResp): void
    {
        $this->dniResp = $dniResp;
    }

    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }
}
