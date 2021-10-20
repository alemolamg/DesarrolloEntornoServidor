<?php
    /* Conexión por clases  */
//    $dwes = new mysqli('localhost','dwes','abc123.','dwes');
//    echo $dwes->server_info;
    
    /* Conexión por métodos procedimentales */
    $dwes = mysqli_connect('localhost','dwes','abc123.','dwes');
    echo mysqli_get_server_info($dwes);

?>

