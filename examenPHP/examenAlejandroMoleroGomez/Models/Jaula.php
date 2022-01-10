<?php

class Jaula {
    private $codigo;
    private $tipo;
    private $caracteristicas;
    private $ubicacion;
    
    /**
     * Creación de un objeto tipo Jaula
     * @param type $cod codigo jaula
     * @param type $tipo tipo de jaula
     * @param type $caract caractarísticas de la jaula
     * @param type $ubi Ubicación de la jaula
     */
    public function __construct($cod,$tipo,$caract,$ubi) {
        $this->codigo = $cod;
        $this->tipo = $tipo;
        $this->caracteristicas = $caract;
        $this->ubicacion = $ubi;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getCaracteristicas() {
        return $this->caracteristicas;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setCaracteristicas($caracteristicas): void {
        $this->caracteristicas = $caracteristicas;
    }

    public function setUbicacion($ubicacion): void {
        $this->ubicacion = $ubicacion;
    }


}
