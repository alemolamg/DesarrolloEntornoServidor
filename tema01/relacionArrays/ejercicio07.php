<?php
    $personas = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso","Teresa");
    $num=count($personas);
    echo "El número total de personas es: $num <br/>";
    foreach ($personas as $nombre) {
        echo " $nombre,";
    }

?>
