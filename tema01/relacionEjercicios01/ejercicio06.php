<?php
    function sumaPara($num,$limite){
        $result = 0;
        for(;$num <= $limite; $num++){
            $result = $result + $num;
        }
        return $result;
    }
    
    function sumaRepetir($num,$limite){
        $result = 0;
        while ($num <= $limite){
            $result = $result + $num;
            $num++;
        }
        return $result;
    }
    
    function sumaMientras($num,$limite){
        $result = 0;
        do{
            $result = $result + $num;
            $num++;
        }while ($num <= $limite);
        return $result;
    }
    
    echo "La suma de los 100 primeros números: <br/>";
    echo "Utilizando suma en repetición: ". sumaRepetir(1, 100)."<br/>";
    echo "Utilizando suma constante (mientras): ". sumaMientras(1, 100)."<br/>";
    echo "Utilizando suma hasta parar: ". sumaPara(1, 100)."<br/>";

?>

