<?php
require_once __DIR__ . '/vendor/autoload.php';
class
Server
{
    private $_soapServer = null; //luego asignamos la documentación
    
    public function __construct()
    {
        require_once('Funciones.php');
        $this->_soapServer = new nusoap_server(); //creamos el objeto
        $miURL = 'http://localhost/DesarrolloEntornoServidor/tema06/serviciosSOAP/Tarea6/Server.php';
        $this->_soapServer->configureWSDL("Example WSDL", $miURL);
        $this->_soapServer->wsdl->schemaTargetNamespace = $miURL;
        
        /* Registrar puntos de entrada a nuestro Webservice: Para dar acceso al cliente, debemos utilizar el método
        register dentro del constructor que hemos creado anteriormente. */
        $this->_soapServer->register(
            'Funciones.getPVP', // method name
            array('codProducto'=>'xsd:string'), // input parameters
            array('return' => 'xsd:Array'), // output parameters
            false, // namespace
            false, // soapaction
            'rpc', // style
            'encoded', // use
            'Servicio que envia el precio de un producto dado su código' // documentation
        );
        $this->_soapServer->register(
            'Funciones.getStock',
            array('a' => 'xsd:string', 'b' => 'xsd:string'),
            array('return' => 'xsd:int'),
            false,
            false,
            "rpc",
            "encoded",
            "Servicio que suma dos números"
        );
        $this->_soapServer->register(
            "Service.getName",
            array('name' => "xsd:string"),
            array("return" => "xsd:string"),
            false,
            false,
            "rpc",
            "encoded",
            "Servicio que retorna un string"
        );
        //procesamos el webservice
        $this->_soapServer->service(file_get_contents("php://input"));
    }
}
$server = new Server();
