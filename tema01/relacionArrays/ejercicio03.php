<?php
    $peliculas  = array("enero" => 9,"febrero" => 12, "marzo" => 0, "abril" => 17);
    
    foreach ($peliculas as $mes => $pelis) {
        if($pelis > 0)
            echo "En $mes se han visto $pelis películas. <br/>";
    }
    
    echo "<br/> Fin del programa";

?>
