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
    
    $reverso = array_reverse($array);  //Damos la vuelta al array
    echo "Array Terminado";
    foreach ($reverso as $key => $valor) {
        echo "<br/>Valor $key del array es: $reverso[$key]";
    }
    
    

?>

