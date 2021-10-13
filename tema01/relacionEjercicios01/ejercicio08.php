<?php

function sumapares($num,$limite){
        $result = 0;
        for(;$num <= $limite; $num++){
            if($num%2 == 0)
                $result = $result + $num;
        }
        return $result;
    }
    
    echo "La suma de los 100 primeros números pares es: ". sumapares(1, 100);

?>


<!<!-- 8. Calcule la suma de los 100 primeros números enteros pares. -->