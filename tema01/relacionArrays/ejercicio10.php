<?php
    echo "Números desordenados: <br/>";
    $numeros = array("tres" => 3,"dos"=>2,"ocho" =>8,"ciento veintitres"=>123,"cinco"=>5,"uno" =>1);
    foreach ($numeros as $letra => $value) {
        echo "Letra: $letra, número: $value ;";
    }
    
    echo "<br/>números ordenados: <br/>";
    asort($numeros);
    foreach ($numeros as $letra => $value) {
        echo " Letra: $letra, número: $value ;";
    }

?>

