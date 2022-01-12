<?php
class Cliente{
     private $_soapClient = null;
    //private $conexDB = null;

    public function __construct() {
        $this->_soapClient = new nusoap_client("http://localhost/DesarrolloEntornoServidor/tema06/serviciosSOAP/Tarea6/Server.php?wsdl");
        //$this->conexDB = new Conexion();
    }
}

?>
