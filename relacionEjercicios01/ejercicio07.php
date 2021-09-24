<?php

    function sumaCuadrados($num,$limite){
        $result = 0;
        for(;$num <= $limite; $num++){
            $result = $result + pow($num, 2);
        }
        return $result;
    }
    
    echo "La suma de los 100 primeros cuadrados es: ". sumaCuadrados(1, 100);

?>

<!-- 7. Calcular la suma de los cuadrados de los 100 primeros números enteros. -->

