<?php
    $persona = array(
        "ptorres" => array("nombre" => "Pedro Torres", "direccion" => "C/ Mayor, 37", "telefono" => "123456789"),
        "sojea" => array("nombre" => "Sabrina Ojea", "direccion" => "C/ Argentina, 10", "telefono" => "123456987"),
        "dparejo" => array("nombre" => "Daniel Parejo", "direccion" => "C/ Fruta, 8", "telefono" => "321456789"),
        "htorres" => array("nombre" => "Hugo Torres", "direccion" => "C/ Mayor, 37", "telefono" => "123654789")
    );
    
    foreach ($persona as $ncorto => $array) {
        echo "<br/><b>Nombre corto:</b> $ncorto";
        foreach ($array as $key => $info) {
            echo "<br/> $key: $info";
        }
        echo "<br/>";
    }

?>

