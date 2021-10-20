<?php
    /* Conexión por métodos procedimentales */
//    $dwes = mysqli_connect('localhost','dwes','abc123.','dwes');
//    echo mysqli_get_server_info($dwes);

/* Conexión por clases  */
    $dwes = new mysqli('localhost','dwe','abc123.','dwes'); //Está mal a propósito
    if (!$dwes->connect_errno){     //Entra si no hay errores
            echo $dwes->server_info;
            echo '<br>';
    } else {
        echo $dwes->connect_errno."-".$dwes->connect_error;
    }    

?>

