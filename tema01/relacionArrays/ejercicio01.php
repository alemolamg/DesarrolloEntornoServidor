<?php
    $i = 0;
    $num = 2;
    $array = array();
    echo "Creamos el array <br/>";
    while ($i < 10){
       if($num%2 == 0){
           $array[] = $num;
           $i++;
           $num += 2;
       } else
           $num++;
    }
    
    echo "Array Terminado";
    foreach ($array as $key => $valor) {
        echo "<br/>Valor $key del array es: $array[$key]";
    }
    
    echo "<br/><br/> Programa terminado";
    
?>

